<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\DetailTransaksi;
use DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $pelanggan = Pelanggan::all();
        $detail_transaksi = Pelanggan::all();
        return view('admin.transaksi.index', compact('transaksi', 'pelanggan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $detail_transaksi = DetailTransaksi::all();
        return view('admin.transaksi.create', compact('pelanggan', 'detail_transaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_transaksi' => 'required|date',
            'pelanggan_id' => 'required|integer|exists:pelanggan,id',
        ]);
        $detail_transaksi = DetailTransaksi::findOrFail($request->input('id'));
        $diskon = 0;
        $harga_total = $detail_transaksi->harga_total;
        if($pelanggan->kartu && $pelanggan->kartu->kode == 'GOLD'){
            $diskon = 5000;
        }elseif ($pelanggan->kartu->kode == 'PLAT'){
            $diskon = 3000;
        }elseif ($pelanggan->kartu->kode == 'DIAMOND'){
            $diskon = 7000;
        }elseif ($pelanggan->kartu->kode == 'STD'){
            $diskon = 0;
        }
        $harga_diskon = $harga_total - $diskon;
        
        DB::table('transaksi')->insert([
            'tgl_transaksi' => $request->input('tgl_transaksi'),
            'harga_total' => $harga_total,
            'pelanggan_id' => $request->input('pelanggan_id'),
            'harga_diskon' => $harga_diskon,
            'produk'
        ]);
        return redirect('admin/transaksi/index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function delete($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect("admin/transaksi/index");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $produk = Produk::all();
        return view('admin.transaksi.edit', compact('transaksi', 'pelanggan', 'produk'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'tgl_transaksi' => 'required|date',
        'qty' => 'required|integer',
        'pelanggan_id' => 'required|integer|exists:pelanggan,id',
        'produk_id' => 'required|integer|exists:produk,id',
    ]);

    
    $pelanggan = Pelanggan::with('kartu')->findOrFail($request->input('pelanggan_id'));
    $produk = Produk::findOrFail($request->input('produk_id'));
    $harga = $produk->harga_produk;
    $diskon = 0;
    if($pelanggan->kartu && $pelanggan->kartu->kode == 'GOLD'){
        $diskon = 5000;
    }elseif ($pelanggan->kartu->kode == 'PLAT'){
        $diskon = 3000;
    }elseif ($pelanggan->kartu->kode == 'DIAMOND'){
        $diskon = 7000;
    }elseif ($pelanggan->kartu->kode == 'STD'){
        $diskon = 0;
    }
    
    // Hitung harga_total
    $harga_total = $harga * $request->input('qty');
    $harga_diskon = $harga * $request->input('qty') - $diskon;

    DB::table('transaksi')->where('id', $id)->update([
        'tgl_transaksi' => $request->input('tgl_transaksi'),
        'qty' => $request->input('qty'),
        'harga' => $harga,
        'harga_total' => $harga_total,
        'harga_diskon' => $harga_diskon,
        'pelanggan_id' => $request->input('pelanggan_id'),
        'produk_id' => $request->input('produk_id'),
    ]);

    return redirect('admin/transaksi/index')->with('success', 'Data Berhasil Diubah');
}

}

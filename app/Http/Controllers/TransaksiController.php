<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Pelanggan;

use DB;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::get()->all();
        $detail_transaksi = DetailTransaksi::get()->all();
        $pelanggan = Pelanggan::get()->all();
        return view('admin.transaksi.index', compact('transaksi','detail_transaksi', 'pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $transaksi = Transaksi::get()->all();
        $detail_transaksi = DetailTransaksi::get()->all();
        $pelanggan = Pelanggan::get()->all();
        return view('admin.transaksi.create', compact('transaksi','detail_transaksi', 'pelanggan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_transaksi' => 'required|date',
            'pelanggan_id' => 'required|integer|exists:pelanggan,id',
        ]);
        $pelanggan = Pelanggan::with('kartu')->findOrFail($request->input('pelanggan_id'));
        $diskon = 0;
        if($pelanggan->kartu && $pelanggan->kartu->kode == 'GOLD'){
            $diskon = 5000;
        }elseif ($pelanggan->kartu->kode == 'PLAT'){
            $diskon = 3000;
        }elseif ($pelanggan->kartu->kode == 'DMN'){
            $diskon = 7000;
        }elseif ($pelanggan->kartu->kode == 'STD'){
            $diskon = 0;
        }
        
        
        DB::table('transaksi')->insert([
            'tgl_transaksi' => $request->input('tgl_transaksi'),
            'harga' => $request->input('harga'),
            'harga_total' => $request->input('harga') - $diskon,
            'pelanggan_id' => $request->input('pelanggan_id'),
        ]);
        return redirect('admin/transaksi/index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $detail_transaksi = DetailTransaksi::get()->all();
        $pelanggan = Pelanggan::get()->all();
        return view('admin.transaksi.edit', compact('transaksi','detail_transaksi', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'tgl_transaksi' => 'required|date',
            'pelanggan_id' => 'required|integer|exists:pelanggan,id',
        ]);
        $pelanggan = Pelanggan::findOrFail($request->input('pelanggan_id'));
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
        
        
        DB::table('transaksi')->where('id',$id)->update([
            'tgl_transaksi' => $request->input('tgl_transaksi'),
            'harga' => $request->input('harga'),
            'harga_total' => $request->input('harga') - $diskon,
            'pelanggan_id' => $request->input('pelanggan_id'),
        ]);
        return redirect('admin/transaksi/index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
{
    // Cari transaksi berdasarkan ID
    $transaksi = Transaksi::find($id);

    if ($transaksi) {
        // Hapus semua detail transaksi yang terkait
        DetailTransaksi::where('transaksi_id', $transaksi->id)->delete();
        
        // Hapus transaksi
        $transaksi->delete();
        
        return redirect('admin/transaksi/index');
}

}
}
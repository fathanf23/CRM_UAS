<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Produk;

use DB;
class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $detail_transaksi = DetailTransaksi::all();
        $transaksi = Transaksi::get()->all();
        $produk = Produk::get()->all();
        return view('admin.detail_transaksi.index', compact('detail_transaksi', 'transaksi', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $detail_transaksi = DetailTransaksi::all();
        $transaksi = Transaksi::all();
        $produk = produk::all();
        return view('admin.detail_transaksi.create', compact('detail_transaksi', 'transaksi', 'produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $produk = Produk::findOrFail($request->input('produk_id'));
        $harga_produk = $produk->harga_produk;

        $harga_total = $harga_produk * $request->input('qty');

        DB::table('detail_transaksi')->insert([
            'qty' => $request->input('qty'),
            'harga_total' => $harga_total,
            'transaksi_id' => $request->input('transaksi_id'),
            'produk_id' => $request->input('produk_id'),
        ]);

        return redirect('admin/detail_transaksi/index')->with('success', 'Berhasil Menambahkan Data');
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
    public function edit($id)
{
    $detail_transaksi = DetailTransaksi::findOrFail($id);
    $transaksi = Transaksi::all();
    $produk = Produk::all();

    return view('admin.detail_transaksi.edit', compact('detail_transaksi', 'transaksi', 'produk'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'qty' => 'required|integer',
        'harga_total' => 'required|numeric',
        'transaksi_id' => 'required|exists:transaksi,id',
        'produk_id' => 'required|exists:produk,id',
    ]);

    $detail_transaksi = DetailTransaksi::findOrFail($id);
    $produk = Produk::findOrFail($request->produk_id);
    $harga_total = $produk->harga_produk * $request->qty;

    $detail_transaksi = DetailTransaksi::findOrFail($id);
    $detail_transaksi->qty = $request->qty;
    $detail_transaksi->harga_total = $harga_total;
    $detail_transaksi->transaksi_id = $request->transaksi_id;
    $detail_transaksi->produk_id = $request->produk_id;
    $detail_transaksi->save();

    return redirect('admin/detail_transaksi/index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $detail_transaksi = DetailTransaksi::where('id', $id)->first();
        $detail_transaksi->delete();
        return redirect("admin/detail_transaksi/index");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

use DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produk = Produk::get()->all();
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::get()->all();
        return view('admin.produk.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    DB::table('produk')->insert([
        'kd_produk' => $request->input('kd_produk'),
        'nm_produk' => $request->input('nm_produk'),
        'harga_produk' => $request->input('harga_produk'),
        'foto' => $request->input('foto'),
    ]);
    return redirect('admin/produk/index')->with('success', 'Berhasil Menambahkan Data');
}

    public function delete($id)
    {
        $produk = Produk::where('id', $id)->first();
        $produk->delete();
        return redirect("admin/produk/index");
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
        $produk = Produk::all()->where('id', $id);
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('produk')->where('id', $id)->update([
        'kd_produk' => $request->input('kd_produk'),
        'nm_produk' => $request->input('nm_produk'),
        'harga_produk' => $request->input('harga_produk'),
        'foto' => $request->input('foto'),
        
        ]);
        return redirect('admin/produk/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    
}

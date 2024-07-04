<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kartu;
use RealRashid\SweetAlert\Facades\Alert;

use DB;

class KartuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kartu = Kartu::get()->all();
        return view('admin.kartu.index', compact ('kartu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kartu = Kartu::get()->all();
        return view('admin.kartu.create', compact('kartu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    DB::table('kartu')->insert([
        'kode' => $request->input('kode'),
        'nama' => $request->input('nama'),
        'diskon' => $request->input('diskon'),
    ]);
    return redirect('admin/kartu/index')->with('success', 'Berhasil Menambahkan Data');
}
    public function delete($id)
    {
        $kartu = Kartu::where('id', $id)->first();
        $kartu->delete();
        return redirect("admin/kartu/index");
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
        $kartu = Kartu::all()->where('id', $id);
        return view('admin.kartu.edit', compact('kartu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('kartu')->where('id', $id)->update([
        'kode' => $request->input('kode'),
        'nama' => $request->input('nama'),
        'diskon' => $request->input('diskon'),
        
        ]);
        return redirect('admin/kartu/index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kartu = DB::table('kartu')->where('id', $id)->delete();
        return redirect('admin/kartu/index');
    }

}

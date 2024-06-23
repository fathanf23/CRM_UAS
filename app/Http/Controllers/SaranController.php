<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saran = Saran::get()->all();
        return view('vendor.saran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $saran = Saran::get()->all();
        return view('vendor.saran', compact('saran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'saran' => 'required|min:10',
            'bintang' => 'required'
        ],[
            'nama.required' => "Nama harus diisi",
            'saran.required' => "Saran harus diisi",
            'saran.min' => "Minimal 10 karakter",
            'bintang.required' => "Bintang harus dipilih"
        ]);

        Saran::create([
            'nama' => $request->nama,
            'saran' => $request->saran,
            'bintang' => $request->bintang
        ]);

        return redirect('/');
    }
    /**
     * Display the specified resource.
     */
    public function show(Saran $saran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saran $saran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saran $saran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saran $saran)
    {
        //
    }
}

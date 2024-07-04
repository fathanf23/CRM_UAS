<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Kartu;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Exports\CustomersExport;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PelangganController extends Controller
{
    //
    public function index(){
        $pelanggan = Pelanggan::with(['kartu',])->get();
        $user = User::get()->all();
        return view('admin.pelanggan.index', compact('pelanggan', 'user'));
    }
    public function create()
    {
        //
        $user = DB::table('user')->get();
        $kartu = DB::table('kartu')->get();
        return view('admin.pelanggan.create', compact('user','kartu'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required |max:45',            
            'alamat' => 'required |max:45',            
            'no_hp' => 'required |numeric', 
            
        ],
        [
            'nama.required' => 'Nama Customer Wajib Di Isi!',
            'nama.max' => 'Nama Maksimal 45 Karekter',
            'alamat.required' => 'Alamat Harus Di Isi!',
            'no_hp.required' => 'Nomor Telepon Harus Di Isi!',
            'no_hp.numeric' => 'Harus Angka Diawali dengan 08.......!',
            
        ]
    );
        //tambah data menggunakan query builder
        DB::table('pelanggan')->insert([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
            'user_id'=>$request->user_id,
            'kartu_id'=> $request->kartu_id
        ]);
        return redirect('admin/pelanggan/index')->with('success', 'Berhasil Menambahkan Data');
    }
    // App\Http\Controllers\PelangganController.php

public function delete($id)
{
    // Find the pelanggan by id
    $pelanggan = Pelanggan::findOrFail($id);

    // Retrieve the associated user_id
    $user_id = $pelanggan->user_id;

    // Delete the pelanggan
    $pelanggan->delete();

    // Delete the associated user
    User::findOrFail($user_id)->delete();

    return redirect('admin/pelanggan/index')->with('success', 'Berhasil Menghapus Data Pelanggan dan User Terkait');
}

    public function edit(string $id)
    {
        //
        $pelanggan = Pelanggan::all()->where('id', $id);
        $user = User::get()->all();
        $kartu = Kartu::get()->all();
        return view('admin.pelanggan.edit', compact('pelanggan','user','kartu'));
    }

    public function update(Request $request, string $id)
    {
        DB::table('pelanggan')->where('id', $request->id)->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
            'user_id'=>$request->user_id,
            'kartu_id'=>$request->kartu_id
            
        ]);
        return redirect('admin/pelanggan/index')->with('success', 'Data Berhasil Diubah');
    }

}

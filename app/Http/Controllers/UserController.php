<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::get()->all();
        return view('admin.user.index', compact ('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = DB::table('user')->get();
        return view('admin.user.create', compact('user',));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required |max:45',            
            'password' => 'required |max:45',            
            
        ],
        [
            'username.required' => 'Username Wajib Di Isi!',
            'username.max' => 'Username Maksimal 45 Karekter',
            'password.required' => 'Password Harus Di Isi!',
        ]
    );
    $hashedPassword = bcrypt($request->password);
        //tambah data menggunakan query builder
        DB::table('user')->insert([
            'username'=>$request->username,
            'password'=>$hashedPassword,
            'role'=> 'pelanggan',
        ]);
        return redirect('admin/user/index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('admin/user/index');
    }
    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::all()->where('id', $id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hashedPassword = bcrypt($request->password);
        DB::table('user')->where('id', $request->id)->update([
            'username'=>$request->username,
            'password'=>$hashedPassword,
            'role'=> $request->role,
        ]);
        return redirect('admin/user/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    
}

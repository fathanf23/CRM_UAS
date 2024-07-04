<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin');
            } elseif ($user->role == 'pelanggan') {
                return redirect()->route('home');
            } else {
                return redirect('/'); 
            }
        } else {
            return redirect()->route('login')->with('failed', 'Username atau Password Salah!');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect('login')->with('success', 'Kamu berhasil Logout');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $input = [
            "username" => $request->username,
            "password" => Hash::make($request->password),
        ];
        $user = User::create($input);
        return response()->json([
            "status" => "success",
            "message" => "register sukses"
        ]);
    }
    public function login(Request $request){
        $input = [
            "email" => $request->email,
            "password" => $request->password
        ];
        $user = User::where("email", $input["email"])->first();
        if(Auth::attempt($input)){
            $token = $user->createToken("Token")->plainTextToken;
            return response()->json([
                "code" => 200,
                "status" => "success",
                "message" => "Login sukses",
                "token" => $token
            ]);
        } else {
            return response()->json([
                "code" => 401,
                "status" => "error",
                "message" => "Login Failed"
            ]);
        }
    }
}

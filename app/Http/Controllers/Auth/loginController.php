<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $cek= $request->only('email', 'password');
        if (Auth::attempt($cek)) {
            $auth= Auth::user();
            return response()->json([
                'response_code' => 200,
                'message' => 'Login Berhasil',
                'conntent' => $auth
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Username atau Password Tidak Ditemukan!'
            ]);
        }

    }
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'response_code' => 200,
            'message' => 'Logout Berhasil',
        ]);
    }
}

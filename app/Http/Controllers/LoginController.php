<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view("login/v_tampil");
    }

    public function actionLogin(Request $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            // Jika berhasil login, arahkan sesuai peran pengguna
            return redirect('/sampah');
        }

        // Jika login gagal, kembalikan ke halaman login
        return redirect('/login');
    }

    // Logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
}

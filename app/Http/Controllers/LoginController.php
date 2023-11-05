<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view("login/v_tampil");
    }

    public function actionLogin(Request $request) {
        $user = Auth::attempt($request->only("email","password"));
        if($user) {
            return redirect('/dashboard');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}

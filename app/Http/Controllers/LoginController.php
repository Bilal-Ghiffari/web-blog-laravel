<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            "title" => "login",
            // "active" => "login"
        ]);
    }

    public function authenticate(Request $request){
        $loginData = $request->validate([
            'email' => 'required|email:dns',
            'password' =>   'required'
        ]);

        // jika otentikasi berhasil
        if(Auth::attempt($loginData)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Login failed!');
    }

    public function Logout(Request $request) {
        Auth::logout();

        //invalidate session supaya tidak bisa dipakai kembali session nya
        $request->session()->invalidate();

        //membuat ulang token csrf menghindari hacking route
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

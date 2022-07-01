<?php

namespace App\Http\Controllers;

use App\Models\User;
use Clockwork\Request\UserData;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('registration.index', [
            "title" => "register",
            // "active" => "resiter"
        ]);
    }

    // email:dns -> mencocokan dengan domain email

    public function store(Request $request){
        $userData = $request->validate([
            'name' => 'required|min:4|max:255',
            'username' => 'required|min:4|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);
        
        // hash to password
        $userData['password'] = bcrypt($userData['password']);


        User::create($userData);
        
        return redirect('/login')->with('success', 'Registrasion successfull! Please login');
    }
}

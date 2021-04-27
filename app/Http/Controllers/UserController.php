<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){


        return view('authentication.register');
    }
    public function store(Request $r){


        $this->validate($r,[
            "name" => 'required|min:3',
            "email" => 'required|email',
            "password" => 'required|confirmed',
        ]);

        User::create([
            'name'=> $r->name,
            'email'=> $r->email,
            'password'=> Hash::make($r->password),
        ]);

        Auth::attempt(['email' => $r->email, 'password' => $r->password]);
        return redirect()->route('dashboard');
    }

    public function login(){
        return view('authentication.login');
    }

    public function loginUser(Request $r){
        $this->validate($r,[
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if( !Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            return back()->with('status', 'Geçersiz Email veya Şifre');
        }else{
            return redirect()->route('dashboard');
        }


    }

    public function cikisyap(){

        Auth::logout();
        return redirect()->route('dashboard');

    }
}

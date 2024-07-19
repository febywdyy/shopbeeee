<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $data=[
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($data)){
            return redirect('/welcome');
        }else{
            return redirect()->route('login')->with('failed','Email atau Password Salah');
        }
    }

    public function logout(){
    Auth::logout();
    return redirect()->route('login')->with('success','Berhasil keluar');
    }
}
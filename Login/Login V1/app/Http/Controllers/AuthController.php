<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginLayout(){
        return view("auth.login");
    }
    public function registerLayout(){
        return view("auth.register");
    }
    public function register(Request $request){
        $request->validate([
            "email"=> "required|unique:users|email",
            "password"=> "required|min:3",
        ]);

        User::create([
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
        ]);
        return redirect()->route("loginLayout")->with("success","Berhasil Register!");
    }
    public function login(Request $request){
        $request->validate([
            "email"=> "required|email",
            "password"=> "required|min:3",
        ]);

        $credentials = $request->only("email","password");
        if (Auth::attempt($credentials)) {
            return redirect()->route("dashboard")->with("success","Berhasil Login!");
        }else{
            return redirect()->route("loginLayout")->with("error","Email atau Password salah!");
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route("loginLayout")->with("success","Berhasil Logout!");
    }
}

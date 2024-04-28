<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            "username"=> "required|min:3",
            "email"=> "required|unique:users|email",
            "password"=> "required|min:3",
            "password_confirmation" => "required|same:password|min:3",
        ]);

        User::create([
            "username"=> $request->username,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
        ]);
        return redirect()->route("loginLayout")->with("success","Berhasil Register!");
    }
    public function login(Request $request){
        $request->validate([
            "tipeLogin"=> "required",
            "password"=> "required|min:3",
        ]);

        $tipeLogin = filter_var($request->input('tipeLogin'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $tipeLogin => $request->input('tipeLogin'),
            'password' => $request->input('password')
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route("dashboard")->with("success","Berhasil Login!");
        }else{
            Session::flashInput($request->input());
            return redirect()->route("loginLayout")->with("error","Email, User atau Password salah!");
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route("loginLayout")->with("success","Berhasil Logout!");
    }
}

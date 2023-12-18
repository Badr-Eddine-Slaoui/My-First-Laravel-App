<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view("Auth.index");
    }
    public static function login(Request $request){
        $credentials = [
            "email"=> $request->email,
            "password"=> $request->password,
            "deleted_at" => null,
        ];
        if(Auth::guard("user")->attempt($credentials, $request->has("remember"))){
            request()->session()->regenerate();
            return redirect()->route("profiles.index")->with("success","Welcome ". auth()->user()->username);
        }else{
            return back()->withErrors(["login"=> "Email or password incorrect"])->onlyInput("email");
        }
    }
    public static function logout(){
        Session::flush();
        Auth::guard("user")->logout();
        return redirect()->route("profiles.index")->with("success","See you later ");
    }
}

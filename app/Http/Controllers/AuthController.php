<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register( Request $request){
        User::create([
            "name"=> $request->username,
            "email"=> $request->email,
            "password"=> Hash::make($request->password)
        ]);
        return redirect()->back();
    }

    public function login(Request $request){
      $check = $request->validate([
        "email"=> "required",
        "password"=> "required"
      ]);
       if(Auth::attempt(["email" => $request->email, "password"=> $request->password])){
        return redirect('/');
       }else{
        return redirect()->back();
       }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}

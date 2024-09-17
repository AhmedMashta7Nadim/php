<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|max:25|min:3',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|min:8|confirmed',
        ]);
          $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
          ]);
        Auth::login($user);
        return redirect('/off');
    }

    public function login(Request $request){
             $request->validate([
                'email'=>'required|string|email',
                'password'=>'required|min:8',

             ]);
             if(Auth::attempt($request->only('email','password'))){
                     return redirect('/off');
             }
             return back()->withErrors([
                'wrongCredntials'=>'الايمل خطأ'
             ]);
    }
}

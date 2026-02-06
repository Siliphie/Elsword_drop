<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:6|confirmed',
            'erp'=> 'nullable|integer|min:0|max:1500',
        ]);
    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=> Hash::make($request->password),
        'erp'=>$request->erp ?? 0,
    ]);
    return redirect()->route('login')->with('success', 'You have been registered, you can now login!');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (auth()->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Welcome back');
        }
            return back()->withErrors([
            'email' => 'uncorrect mail or password.',
            ])->onlyInput('email');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function render()
    {
        return view('auth.login',['main'=>'login']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember_me');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }
}

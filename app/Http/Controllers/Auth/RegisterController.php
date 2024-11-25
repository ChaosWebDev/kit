<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function render()
    {
        return view('auth.register', ['main' => 'register']);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password'])
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}

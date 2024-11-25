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
            'username' => ['required', 'unique:users,username', 'max:255'],
            'password' => ['required', 'min:5', 'confirmed'],
            'name' => ['nullable', 'string'],
            'email' => ['required', 'email', 'unique:users,email']
        ]);

        $user = User::create($validatedData);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}

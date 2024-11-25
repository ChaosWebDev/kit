<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', ['main' => 'dashboard']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login (kalau ada)
        $user = Auth::user();

        // Kirim ke view landing.blade.php
        return view('landing', compact('user'));
    }
}

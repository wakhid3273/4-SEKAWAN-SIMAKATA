<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register'); // Blade UI untuk form register
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email', function ($attribute, $value, $fail) {
                if (!str_ends_with($value, '@mhs.unsoed.ac.id')) {
                    $fail('Email harus menggunakan domain @mhs.unsoed.ac.id');
                }
            }],
            'password' => 'required|min:6|confirmed',
        ]);

        // Extract NIM from email (before @)
        $nim = strtoupper(explode('@', $request->email)[0]);

        User::create([
            'nim' => $nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // default role untuk yang register
        ]);

        // Redirect ke login setelah berhasil
        return redirect()->route('login.form')->with('success', 'Registrasi berhasil, silakan login.');
    }
}

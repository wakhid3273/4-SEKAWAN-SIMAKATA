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
        return view('auth.register'); // nanti frontend timmu buat Blade UI
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|unique:users,nim',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan ke database
        User::create([
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke login setelah berhasil
        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Blade UI di frontend
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'user') {
                return redirect('/user/home');
            } else {
                return redirect('/guest/welcome');
            }
        }

        return back()->withErrors([
            'nim' => 'NIM atau password salah.',
        ])->onlyInput('nim');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
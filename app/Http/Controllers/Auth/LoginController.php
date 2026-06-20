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
        $request->validate([
            'email' => ['required', 'email', function ($attribute, $value, $fail) {
                if (!str_ends_with($value, '@mhs.unsoed.ac.id')) {
                    $fail('Gunakan email @mhs.unsoed.ac.id untuk login.');
                }
            }],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Update last_login_at
            $user->update(['last_login_at' => now()]);

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->route('dashboard'); // fallback
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login
        return redirect()->route('login.form');
    }
}

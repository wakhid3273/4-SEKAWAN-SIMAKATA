<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', function ($attribute, $value, $fail) {
                if (!str_ends_with($value, '@mhs.unsoed.ac.id')) {
                    $fail('Gunakan email @mhs.unsoed.ac.id.');
                }
            }],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan di sistem.'])->onlyInput('email');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login.form')->with('success', 'Password berhasil direset. Silakan login dengan password baru.');
    }
}

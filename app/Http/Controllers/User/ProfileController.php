<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\FinalProject;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Data Tugas Akhir (from FinalProject table)
        $totalTugasAkhir = FinalProject::where('user_id', $user->id)->count();
        
        // Data KP/Magang (from MahasiswaMagang table if exists, otherwise 0)
        $totalKpMagang = \App\Models\MahasiswaMagang::where('user_id', $user->id)->count();
        
        // Total Pengajuan = Tugas Akhir + KP/Magang
        $totalPengajuan = $totalTugasAkhir + $totalKpMagang;
        
        // Pending & Approved dari kedua tabel
        $pengajuanPending = FinalProject::where('user_id', $user->id)->where('status', 'pending')->count() 
                          + \App\Models\MahasiswaMagang::where('user_id', $user->id)->where('status', 'pending')->count();
        
        $pengajuanDisetujui = FinalProject::where('user_id', $user->id)->where('status', 'approved')->count()
                            + \App\Models\MahasiswaMagang::where('user_id', $user->id)->where('status', 'approved')->count();

        return view('user.profile', compact(
            'user',
            'totalTugasAkhir',
            'pengajuanPending',
            'pengajuanDisetujui',
            'totalKpMagang'
        ));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nim' => 'required|string|max:50|unique:users,nim,' . $user->id,
            'angkatan' => 'nullable|string|max:10',
            'program_studi' => 'nullable|string|max:100',
            'nomor_telepon' => 'nullable|string|max:20',
            'password' => 'nullable|min:6',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $request->validate($rules);

        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->nim = $request->nim;
        $user->angkatan = $request->angkatan;
        $user->program_studi = $request->program_studi;
        $user->nomor_telepon = $request->nomor_telepon;

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.profil')->with('success', 'Profil berhasil diperbarui.');
    }
}

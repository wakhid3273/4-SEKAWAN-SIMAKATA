<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaMagang;
use App\Models\Perusahaan;
use App\Events\MahasiswaMagangCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KpMagangController extends Controller
{
    public function create()
    {
        $perusahaan = Perusahaan::orderBy('nama')->get();
        $user = Auth::user();
        
        return view('user.kp-magang.create', compact('perusahaan', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kegiatan' => 'required|in:Kerja Praktik,Magang',
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'nim' => 'required|string',
            'nama' => 'required|string',
            'angkatan' => 'required|string',
            'periode' => 'required|string',
            'cv_file' => 'required|file|mimes:pdf|max:2048',
            'transkrip_file' => 'required|file|mimes:pdf|max:2048',
            'portofolio_file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Upload files
        $cvPath = $request->file('cv_file')->store('cv', 'public');
        $transkripPath = $request->file('transkrip_file')->store('transkrip', 'public');
        $portofolioPath = $request->hasFile('portofolio_file') 
            ? $request->file('portofolio_file')->store('portofolio', 'public') 
            : null;

        // Create pengajuan
        $pengajuan = MahasiswaMagang::create([
            'user_id' => Auth::id(),
            'perusahaan_id' => $validated['perusahaan_id'],
            'kegiatan' => $validated['kegiatan'],
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'angkatan' => $validated['angkatan'],
            'periode' => $validated['periode'],
            'cv_file' => $cvPath,
            'transkrip_file' => $transkripPath,
            'portofolio_file' => $portofolioPath,
            'status' => 'Pending Review',
        ]);

        // Broadcast event (graceful failure jika Reverb tidak running)
        try {
            broadcast(new MahasiswaMagangCreated($pengajuan));
        } catch (\Exception $e) {
            \Log::warning('Broadcasting failed: ' . $e->getMessage());
        }

        return redirect()->route('user.dashboard')
            ->with('success', 'Pengajuan KP/Magang berhasil disubmit!');
    }
}

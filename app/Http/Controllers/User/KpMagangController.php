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
            'status' => 'pending', // Standardized to lowercase
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

    // Show edit form (hanya jika approved atau rejected)
    public function edit($id)
    {
        $pengajuan = MahasiswaMagang::where('user_id', Auth::id())->findOrFail($id);
        
        // Hanya bisa edit jika status approved atau rejected
        if ($pengajuan->status === 'pending') {
            return redirect()->route('user.dashboard')
                ->with('error', 'Pengajuan masih dalam review, tidak dapat diubah.');
        }
        
        $perusahaan = Perusahaan::orderBy('nama')->get();
        $user = Auth::user();
        
        return view('user.kp-magang.edit', compact('pengajuan', 'perusahaan', 'user'));
    }

    // Update pengajuan yang sudah approved/rejected
    public function update(Request $request, $id)
    {
        $pengajuan = MahasiswaMagang::where('user_id', Auth::id())->findOrFail($id);
        
        // Hanya bisa edit jika status approved atau rejected
        if ($pengajuan->status === 'pending') {
            return redirect()->route('user.dashboard')
                ->with('error', 'Pengajuan masih dalam review, tidak dapat diubah.');
        }
        
        $validated = $request->validate([
            'kegiatan' => 'required|in:Kerja Praktik,Magang',
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'nim' => 'required|string',
            'nama' => 'required|string',
            'angkatan' => 'required|string',
            'periode' => 'required|string',
            'cv_file' => 'nullable|file|mimes:pdf|max:2048',
            'transkrip_file' => 'nullable|file|mimes:pdf|max:2048',
            'portofolio_file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Update basic fields
        $pengajuan->kegiatan = $validated['kegiatan'];
        $pengajuan->perusahaan_id = $validated['perusahaan_id'];
        $pengajuan->nim = $validated['nim'];
        $pengajuan->nama = $validated['nama'];
        $pengajuan->angkatan = $validated['angkatan'];
        $pengajuan->periode = $validated['periode'];

        // Update files if uploaded
        if ($request->hasFile('cv_file')) {
            // Delete old file
            if ($pengajuan->cv_file && Storage::disk('public')->exists($pengajuan->cv_file)) {
                Storage::disk('public')->delete($pengajuan->cv_file);
            }
            $pengajuan->cv_file = $request->file('cv_file')->store('cv', 'public');
        }

        if ($request->hasFile('transkrip_file')) {
            if ($pengajuan->transkrip_file && Storage::disk('public')->exists($pengajuan->transkrip_file)) {
                Storage::disk('public')->delete($pengajuan->transkrip_file);
            }
            $pengajuan->transkrip_file = $request->file('transkrip_file')->store('transkrip', 'public');
        }

        if ($request->hasFile('portofolio_file')) {
            if ($pengajuan->portofolio_file && Storage::disk('public')->exists($pengajuan->portofolio_file)) {
                Storage::disk('public')->delete($pengajuan->portofolio_file);
            }
            $pengajuan->portofolio_file = $request->file('portofolio_file')->store('portofolio', 'public');
        }

        // Reset status to pending after update (submit ulang untuk review)
        $pengajuan->status = 'pending';
        $pengajuan->alasan_penolakan = null;
        $pengajuan->save();

        // Broadcast event
        try {
            broadcast(new \App\Events\MahasiswaMagangUpdated($pengajuan));
        } catch (\Exception $e) {
            \Log::warning('Broadcasting failed: ' . $e->getMessage());
        }

        return redirect()->route('user.dashboard')
            ->with('success', 'Pengajuan berhasil diupdate dan akan direview kembali!');
    }
}

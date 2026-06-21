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
            'perusahaan_id' => 'nullable|exists:perusahaan,id',
            'perusahaan_nama_manual' => 'nullable|string|max:255',
            'perusahaan_lokasi_manual' => 'nullable|string|max:255',
            'nim' => 'required|string',
            'nama' => 'required|string',
            'angkatan' => 'required|string',
            'periode' => 'required|string',
        ]);

        // Logic: User bisa pilih existing perusahaan ATAU ketik manual
        $perusahaanId = null;

        if ($request->filled('perusahaan_id')) {
            // User pilih dari dropdown
            $perusahaanId = $validated['perusahaan_id'];
        } elseif ($request->filled('perusahaan_nama_manual')) {
            // User ketik manual - cek dulu apakah sudah ada (case-insensitive)
            $namaPerusahaan = trim($request->perusahaan_nama_manual);
            
            $existingPerusahaan = Perusahaan::whereRaw('LOWER(nama) = ?', [strtolower($namaPerusahaan)])->first();
            
            if ($existingPerusahaan) {
                // Perusahaan sudah ada, pakai yang existing
                $perusahaanId = $existingPerusahaan->id;
            } else {
                // Perusahaan belum ada, buat baru
                $newPerusahaan = Perusahaan::create([
                    'nama' => $namaPerusahaan,
                    'lokasi' => $request->perusahaan_lokasi_manual ?? 'Tidak Diketahui',
                    'jenis_kegiatan' => $validated['kegiatan'], // 'Kerja Praktik' atau 'Magang'
                    'tentang' => 'Data perusahaan akan dilengkapi oleh admin.',
                    'jumlah_mahasiswa' => 1, // Default 1 karena ini mahasiswa pertama
                ]);
                
                $perusahaanId = $newPerusahaan->id;
                
                \Log::info('New company created by user', [
                    'company_name' => $namaPerusahaan,
                    'company_id' => $perusahaanId,
                    'user_id' => Auth::id()
                ]);
            }
        } else {
            // Tidak ada perusahaan yang dipilih atau diketik
            return back()->withErrors(['perusahaan' => 'Pilih perusahaan dari daftar atau ketik nama perusahaan baru.'])->withInput();
        }

        // File uploads removed by user request

        // Create pengajuan
        $pengajuan = MahasiswaMagang::create([
            'user_id' => Auth::id(),
            'perusahaan_id' => $perusahaanId,
            'kegiatan' => $validated['kegiatan'],
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'angkatan' => $validated['angkatan'],
            'periode' => $validated['periode'],
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
            'perusahaan_id' => 'nullable|exists:perusahaan,id',
            'perusahaan_nama_manual' => 'nullable|string|max:255',
            'perusahaan_lokasi_manual' => 'nullable|string|max:255',
            'nim' => 'required|string',
            'nama' => 'required|string',
            'angkatan' => 'required|string',
            'periode' => 'required|string',
        ]);

        // Handle perusahaan (sama seperti store)
        $perusahaanId = null;

        if ($request->filled('perusahaan_id')) {
            $perusahaanId = $validated['perusahaan_id'];
        } elseif ($request->filled('perusahaan_nama_manual')) {
            $namaPerusahaan = trim($request->perusahaan_nama_manual);
            
            $existingPerusahaan = Perusahaan::whereRaw('LOWER(nama) = ?', [strtolower($namaPerusahaan)])->first();
            
            if ($existingPerusahaan) {
                $perusahaanId = $existingPerusahaan->id;
            } else {
                $newPerusahaan = Perusahaan::create([
                    'nama' => $namaPerusahaan,
                    'lokasi' => $request->perusahaan_lokasi_manual ?? 'Tidak Diketahui',
                    'jenis_kegiatan' => $validated['kegiatan'],
                    'tentang' => 'Data perusahaan akan dilengkapi oleh admin.',
                    'jumlah_mahasiswa' => 1,
                ]);
                
                $perusahaanId = $newPerusahaan->id;
            }
        } else {
            return back()->withErrors(['perusahaan' => 'Pilih perusahaan dari daftar atau ketik nama perusahaan baru.'])->withInput();
        }

        // Update basic fields
        $pengajuan->kegiatan = $validated['kegiatan'];
        $pengajuan->perusahaan_id = $perusahaanId;
        $pengajuan->nim = $validated['nim'];
        $pengajuan->nama = $validated['nama'];
        $pengajuan->angkatan = $validated['angkatan'];
        $pengajuan->periode = $validated['periode'];

        // Update files logic removed by user request

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

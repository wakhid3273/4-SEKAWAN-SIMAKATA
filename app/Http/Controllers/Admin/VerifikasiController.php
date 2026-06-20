<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MahasiswaMagang;
use App\Models\FinalProject;
use App\Events\MahasiswaMagangUpdated;

class VerifikasiController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'kp_magang');
        $search = $request->get('search');
        $status = $request->get('status');

        if ($tab === 'ta') {
            // Tugas Akhir
            $query = FinalProject::with('student');

            if ($search) {
                $query->whereHas('student', function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%{$search}%")
                      ->orWhere('nim', 'like', "%{$search}%");
                });
            }

            if ($status && $status !== 'Semua Status') {
                $mapStatus = [
                    'Pending Review' => 'pending',
                    'Disetujui' => 'approved',
                    'Ditolak' => 'rejected'
                ];
                if (isset($mapStatus[$status])) {
                    $query->where('status', $mapStatus[$status]);
                }
            }

            $pengajuan = $query->paginate(10)->withQueryString();

            $totalPengajuan = FinalProject::count();
            $pendingReview = FinalProject::where('status', 'pending')->count();
            $disetujui = FinalProject::where('status', 'approved')->count();
            $ditolak = FinalProject::where('status', 'rejected')->count();

        } else {
            // KP/Magang
            $query = MahasiswaMagang::with('perusahaan');

            if ($search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('nim', 'like', "%{$search}%");
            }

            if ($status && $status !== 'Semua Status') {
                $query->where('status', $status);
            }

            $pengajuan = $query->paginate(10)->withQueryString();

            $totalPengajuan = MahasiswaMagang::count();
            $pendingReview = MahasiswaMagang::where('status', 'Pending Review')->count();
            $disetujui = MahasiswaMagang::where('status', 'Disetujui')->count();
            $ditolak = MahasiswaMagang::where('status', 'Ditolak')->count();
        }

        return view('admin.verifikasi.index', compact(
            'tab',
            'pengajuan',
            'totalPengajuan',
            'pendingReview',
            'disetujui',
            'ditolak',
            'search',
            'status'
        ));
    }

    public function showKp($id)
    {
        $pengajuan = MahasiswaMagang::with('perusahaan')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => [
                'nama' => $pengajuan->nama,
                'nim' => $pengajuan->nim,
                'angkatan' => $pengajuan->angkatan,
                'jenis_kegiatan' => $pengajuan->kegiatan,
                'perusahaan' => $pengajuan->perusahaan->nama ?? '-',

                'periode' => $pengajuan->periode,
                'cv_file' => $pengajuan->cv_file,
                'transkrip_file' => $pengajuan->transkrip_file,
                'status' => $pengajuan->status,
                'alasan_penolakan' => $pengajuan->alasan_penolakan,
            ]
        ]);
    }

    public function approveKp($id)
    {
        $pengajuan = MahasiswaMagang::findOrFail($id);
        $pengajuan->update([
            'status' => 'Disetujui',
            'alasan_penolakan' => null,
        ]);

        // Broadcast event (graceful failure jika Reverb tidak running)
        try {
            broadcast(new MahasiswaMagangUpdated($pengajuan))->toOthers();
        } catch (\Exception $e) {
            \Log::warning('Broadcasting failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan berhasil disetujui.'
        ]);
    }

    public function rejectKp(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string'
        ]);

        $pengajuan = MahasiswaMagang::findOrFail($id);
        $pengajuan->update([
            'status' => 'Ditolak',
            'alasan_penolakan' => $request->alasan_penolakan,
        ]);

        // Broadcast event (graceful failure jika Reverb tidak running)
        try {
            broadcast(new MahasiswaMagangUpdated($pengajuan))->toOthers();
        } catch (\Exception $e) {
            \Log::warning('Broadcasting failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan berhasil ditolak.'
        ]);
    }

    public function showTa($id)
    {
        $pengajuan = FinalProject::with('student')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => [
                'nama' => $pengajuan->student->nama_lengkap ?? 'N/A',
                'nim' => $pengajuan->student->nim ?? 'N/A',
                'title' => $pengajuan->title,
                'abstract' => $pengajuan->abstract,
                'status' => $pengajuan->status,
            ]
        ]);
    }

    public function approveTa($id)
    {
        $pengajuan = FinalProject::findOrFail($id);
        $pengajuan->update([
            'status' => 'approved',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan Tugas Akhir berhasil disetujui.'
        ]);
    }

    public function rejectTa(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string'
        ]);

        $pengajuan = FinalProject::findOrFail($id);
        $pengajuan->update([
            'status' => 'rejected',
            // asumsikan tabel final_projects tidak punya alasan penolakan,
            // atau jika punya tambahkan: 'alasan_penolakan' => $request->alasan_penolakan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan Tugas Akhir berhasil ditolak.'
        ]);
    }
}

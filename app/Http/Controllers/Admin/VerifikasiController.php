<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MahasiswaMagang;
use App\Models\FinalProject;
use App\Models\AdminActivityLog;
use App\Events\MahasiswaMagangUpdated;
use App\Events\FinalProjectUpdated;

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
                // Map display status to database status
                // Note: Support both old format (Disetujui/Ditolak) and new format (approved/rejected/pending)
                if ($status === 'Pending Review') {
                    $query->where(function($q) {
                        $q->where('status', 'pending')
                          ->orWhere('status', 'Pending Review');
                    });
                } elseif ($status === 'Disetujui') {
                    $query->where(function($q) {
                        $q->where('status', 'approved')
                          ->orWhere('status', 'Disetujui');
                    });
                } elseif ($status === 'Ditolak') {
                    $query->where(function($q) {
                        $q->where('status', 'rejected')
                          ->orWhere('status', 'Ditolak');
                    });
                }
            }

            $pengajuan = $query->paginate(10)->withQueryString();

            $totalPengajuan = MahasiswaMagang::count();
            // Count both old and new format
            $pendingReview = MahasiswaMagang::where('status', 'pending')
                ->orWhere('status', 'Pending Review')
                ->count();
            $disetujui = MahasiswaMagang::where('status', 'approved')
                ->orWhere('status', 'Disetujui')
                ->count();
            $ditolak = MahasiswaMagang::where('status', 'rejected')
                ->orWhere('status', 'Ditolak')
                ->count();
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
            'status' => 'Disetujui', // Use same format as existing data
            'alasan_penolakan' => null,
        ]);

        // Log aktivitas admin
        AdminActivityLog::log(
            'approve_kp',
            "Menyetujui pengajuan {$pengajuan->kegiatan} atas nama {$pengajuan->nama} ({$pengajuan->nim})",
            'MahasiswaMagang',
            $pengajuan->id,
            [
                'mahasiswa_nama' => $pengajuan->nama,
                'mahasiswa_nim' => $pengajuan->nim,
                'kegiatan' => $pengajuan->kegiatan,
            ]
        );

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
            'status' => 'Ditolak', // Use same format as existing data
            'alasan_penolakan' => $request->alasan_penolakan,
        ]);

        // Log aktivitas admin
        AdminActivityLog::log(
            'reject_kp',
            "Menolak pengajuan {$pengajuan->kegiatan} atas nama {$pengajuan->nama} ({$pengajuan->nim})",
            'MahasiswaMagang',
            $pengajuan->id,
            [
                'mahasiswa_nama' => $pengajuan->nama,
                'mahasiswa_nim' => $pengajuan->nim,
                'kegiatan' => $pengajuan->kegiatan,
                'alasan_penolakan' => $request->alasan_penolakan,
            ]
        );

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
                'status' => $pengajuan->status,
                'submitted_at' => $pengajuan->submitted_at,
            ]
        ]);
    }

    public function approveTa($id)
    {
        $pengajuan = FinalProject::with('student')->findOrFail($id);
        $pengajuan->update([
            'status' => 'approved',
        ]);

        // Log aktivitas admin
        AdminActivityLog::log(
            'approve_ta',
            "Menyetujui Judul Tugas Akhir atas nama {$pengajuan->student->nama_lengkap} ({$pengajuan->student->nim})",
            'FinalProject',
            $pengajuan->id,
            [
                'mahasiswa_nama' => $pengajuan->student->nama_lengkap,
                'mahasiswa_nim' => $pengajuan->student->nim,
                'judul_ta' => $pengajuan->title,
            ]
        );

        // Broadcast event
        try {
            broadcast(new FinalProjectUpdated($pengajuan));
        } catch (\Exception $e) {
            \Log::warning('Broadcasting FinalProjectUpdated failed: ' . $e->getMessage());
        }

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

        $pengajuan = FinalProject::with('student')->findOrFail($id);
        $pengajuan->update([
            'status' => 'rejected',
        ]);

        // Log aktivitas admin
        AdminActivityLog::log(
            'reject_ta',
            "Menolak Judul Tugas Akhir atas nama {$pengajuan->student->nama_lengkap} ({$pengajuan->student->nim})",
            'FinalProject',
            $pengajuan->id,
            [
                'mahasiswa_nama' => $pengajuan->student->nama_lengkap,
                'mahasiswa_nim' => $pengajuan->student->nim,
                'judul_ta' => $pengajuan->title,
                'alasan_penolakan' => $request->alasan_penolakan,
            ]
        );

        // Broadcast event
        try {
            broadcast(new FinalProjectUpdated($pengajuan));
        } catch (\Exception $e) {
            \Log::warning('Broadcasting FinalProjectUpdated failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan Tugas Akhir berhasil ditolak.'
        ]);
    }
}

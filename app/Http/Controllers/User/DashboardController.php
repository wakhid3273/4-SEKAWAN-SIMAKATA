<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinalProject;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil data final project milik user
        $finalProject = FinalProject::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        // Status verifikasi judul TA
        $statusVerifikasi = $finalProject ? $finalProject->status : 'belum ada';

        // Riwayat aktivitas (contoh dummy, bisa diganti query log aktivitas)
        $riwayatAktivitas = [
            [
                'judul' => 'Judul TA disetujui',
                'deskripsi' => 'Selamat! Judul "' . ($finalProject->title ?? '-') . '" telah disetujui oleh Koordinator TA.',
                'waktu' => 'Kemarin, 08:15',
            ],
            [
                'judul' => 'Judul TA sedang diverifikasi admin',
                'deskripsi' => 'Sistem sedang memeriksa Judul TA',
                'waktu' => 'Tadi pukul 14:20',
            ],
            [
                'judul' => 'Berhasil mengunggah Judul TA',
                'deskripsi' => 'Dokumen Judul Tugas Akhir sudah diunggah.',
                'waktu' => '3 hari lalu',
            ],
        ];

        // Return ke Blade view, bukan JSON
        return view('user.dashboard', [
            'user' => $user,
            'status_verifikasi' => $statusVerifikasi,
            'final_project' => $finalProject,
            'riwayat_aktivitas' => $riwayatAktivitas,
        ]);
    }
}

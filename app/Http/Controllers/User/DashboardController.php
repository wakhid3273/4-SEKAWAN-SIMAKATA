<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinalProject;
use App\Models\MahasiswaMagang;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        // Ambil riwayat aktivitas REAL dari database
        $riwayatAktivitas = $this->getRiwayatAktivitas($user->id);

        // Return ke Blade view, bukan JSON
        return view('user.dashboard', [
            'user' => $user,
            'status_verifikasi' => $statusVerifikasi,
            'final_project' => $finalProject,
            'riwayat_aktivitas' => $riwayatAktivitas,
        ]);
    }

    private function getRiwayatAktivitas($userId)
    {
        $aktivitas = collect();

        // 1. Ambil riwayat KP/Magang
        $magangList = MahasiswaMagang::where('user_id', $userId)
            ->with('perusahaan')
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($magangList as $magang) {
            $perusahaanNama = $magang->perusahaan ? $magang->perusahaan->nama : 'Perusahaan';
            $divisi = $magang->posisi ?: 'Divisi tidak disebutkan';
            $lokasi = $magang->perusahaan && $magang->perusahaan->lokasi 
                ? $magang->perusahaan->lokasi 
                : 'Jakarta';
            
            $aktivitas->push([
                'type' => 'kp_magang',
                'judul' => 'Pengajuan ' . $magang->kegiatan . ' di ' . $perusahaanNama,
                'deskripsi' => $divisi . ' • ' . $lokasi,
                'status' => $magang->status, // 'Pending Review', 'Disetujui', 'Ditolak'
                'waktu' => $magang->created_at,
                'icon' => 'work_outline',
            ]);
        }

        // 2. Ambil riwayat Tugas Akhir
        $taList = FinalProject::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($taList as $ta) {
            $statusLabel = match($ta->status) {
                'approved' => 'Disetujui',
                'rejected' => 'Ditolak',
                'pending' => 'Pending Review',
                default => 'Menunggu Verifikasi'
            };

            $aktivitas->push([
                'type' => 'tugas_akhir',
                'judul' => 'Judul Tugas Akhir ' . $statusLabel,
                'deskripsi' => 'Topik: ' . $ta->title,
                'status' => $ta->status,
                'waktu' => $ta->created_at,
                'icon' => 'description',
            ]);
        }

        // 3. Sort berdasarkan waktu terbaru
        $aktivitas = $aktivitas->sortByDesc('waktu')->values();

        // 4. Format waktu dan group berdasarkan hari
        $result = [];
        $now = Carbon::now();
        
        foreach ($aktivitas as $item) {
            $waktu = Carbon::parse($item['waktu']);
            
            // Format waktu relatif
            if ($waktu->isToday()) {
                $waktuFormatted = 'Hari Ini • ' . $waktu->format('H:i') . ' WIB';
                $group = 'Hari Ini';
            } elseif ($waktu->isYesterday()) {
                $waktuFormatted = 'Kemarin • ' . $waktu->format('H:i') . ' WIB';
                $group = 'Kemarin';
            } elseif ($waktu->diffInDays($now) <= 7) {
                $waktuFormatted = $waktu->diffForHumans();
                $group = 'Minggu Ini';
            } else {
                $waktuFormatted = $waktu->format('d M Y');
                $group = 'Lebih Lama';
            }

            $result[] = [
                'type' => $item['type'],
                'judul' => $item['judul'],
                'deskripsi' => $item['deskripsi'],
                'status' => $item['status'],
                'waktu' => $waktuFormatted,
                'waktu_raw' => $item['waktu'],
                'icon' => $item['icon'],
                'group' => $group,
            ];
        }

        return $result;
    }
}

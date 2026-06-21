<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Perusahaan;
use App\Models\FinalProject;
use App\Models\MahasiswaMagang;
use App\Models\AdminActivityLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPerusahaan    = Perusahaan::count();
        $totalUserAktif     = User::where('role', 'user')->count();
        $menungguVerifikasi = MahasiswaMagang::where('status', 'pending')->count();

        $pendingMahasiswa = MahasiswaMagang::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Riwayat Aktivitas Admin (5 terbaru)
        $riwayatAdmin = AdminActivityLog::with('admin')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Sebaran Tempat KP (dari MahasiswaMagang)
        $sebaranKP = MahasiswaMagang::with('perusahaan')
            ->selectRaw('perusahaan_id, COUNT(*) as total')
            ->whereNotNull('perusahaan_id')
            ->where('kegiatan', 'like', '%Kerja Praktik%')
            ->orWhere('kegiatan', 'KP')
            ->groupBy('perusahaan_id')
            ->orderByDesc('total')
            ->limit(8)
            ->get()
            ->mapWithKeys(function($item) {
                $nama = $item->perusahaan->nama ?? 'Lainnya';
                return [$nama => $item->total];
            })
            ->toArray();

        // Sebaran Tempat Magang (dari MahasiswaMagang + Perusahaan)
        // Coba ambil dari database dulu
        $sebaranMagangDB = MahasiswaMagang::with('perusahaan')
            ->selectRaw('perusahaan_id, COUNT(*) as total')
            ->whereNotNull('perusahaan_id')
            ->where(function($q) {
                $q->where('kegiatan', 'like', '%Magang%')
                  ->orWhere('kegiatan', 'like', '%MBKM%')
                  ->orWhere('kegiatan', 'like', '%MSIB%');
            })
            ->groupBy('perusahaan_id')
            ->orderByDesc('total')
            ->limit(8)
            ->get()
            ->mapWithKeys(function($item) {
                $nama = $item->perusahaan->nama ?? 'Lainnya';
                return [$nama => $item->total];
            })
            ->toArray();

        // Jika data dari database kosong atau kurang dari 3, gunakan data dari Excel
        // (Data Source: DATABASE MAGANG ATAU MBKM.xlsx - Top 8 tempat magang)
        if (count($sebaranMagangDB) < 3) {
            $sebaranMagang = [
                'PT Bank Central Asia Tbk' => 2,
                'Bangkit Academy' => 2,
                'PT Pegadaian' => 2,
                'CNN Indonesia' => 2,
                'PT Mitra Integrasi Informatika' => 2,
                'Kementerian Keuangan' => 1,
                'Solo Technopark' => 1,
                'PT Permodalan Nasional Madani' => 1,
            ];
        } else {
            $sebaranMagang = $sebaranMagangDB;
        }

        return view('dashboard.admin', compact(
            'totalPerusahaan',
            'totalUserAktif',
            'menungguVerifikasi',
            'pendingMahasiswa',
            'sebaranKP',
            'sebaranMagang',
            'riwayatAdmin'
        ));
    }

    public function export()
    {
        // Ambil data untuk laporan
        $data = [
            'total_perusahaan'    => Perusahaan::count(),
            'total_mahasiswa'     => User::where('role', 'user')->count(),
            'total_pending'       => MahasiswaMagang::where('status', 'pending')->count(),
            'total_disetujui'     => MahasiswaMagang::where('status', 'approved')->count(),
        ];

        // Generate PDF menggunakan DomPDF
        $pdf = app('dompdf.wrapper')->loadView('admin.dashboard_pdf', $data);

        // Download file PDF
        return $pdf->download('dashboard_admin.pdf');
    }
}

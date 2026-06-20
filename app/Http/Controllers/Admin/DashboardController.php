<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Perusahaan;
use App\Models\FinalProject;
use App\Models\MahasiswaMagang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // pastikan sudah install barryvdh/laravel-dompdf

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
        $sebaranMagang = MahasiswaMagang::with('perusahaan')
            ->selectRaw('perusahaan_id, COUNT(*) as total')
            ->whereNotNull('perusahaan_id')
            ->where(function($q) {
                $q->where('kegiatan', 'like', '%Magang%')
                  ->orWhere('kegiatan', 'MBKM')
                  ->orWhere('kegiatan', 'MSIB');
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

        return view('dashboard.admin', compact(
            'totalPerusahaan',
            'totalUserAktif',
            'menungguVerifikasi',
            'pendingMahasiswa',
            'sebaranKP',
            'sebaranMagang'
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

        // Generate PDF dari view (buat file resources/views/admin/dashboard_pdf.blade.php)
        $pdf = Pdf::loadView('admin.dashboard_pdf', $data);

        // Download file PDF
        return $pdf->download('dashboard_admin.pdf');
    }
}

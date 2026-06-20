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

        $activityTrends = [
            'MON' => 12,
            'TUE' => 8,
            'WED' => 15,
            'THU' => 20,
            'FRI' => 10,
            'SAT' => 5,
            'SUN' => 25,
        ];

        return view('dashboard.admin', compact(
            'totalPerusahaan',
            'totalUserAktif',
            'menungguVerifikasi',
            'pendingMahasiswa',
            'activityTrends'
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

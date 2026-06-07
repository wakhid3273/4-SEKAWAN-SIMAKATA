<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use App\Models\FinalProject;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // pastikan sudah install barryvdh/laravel-dompdf

class DashboardController extends Controller
{
    public function index()
    {
        $totalPerusahaan    = Company::count();
        $totalUserAktif     = User::where('status', 'active')->count();
        $menungguVerifikasi = FinalProject::where('status', 'pending')->count();

        $pendingMahasiswa = FinalProject::with('student')
            ->where('status', 'pending')
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

        return response()->json([
            'total_perusahaan'    => $totalPerusahaan,
            'total_user_aktif'    => $totalUserAktif,
            'menunggu_verifikasi' => $menungguVerifikasi,
            'pending_mahasiswa'   => $pendingMahasiswa,
            'activity_trends'     => $activityTrends,
        ]);
    }

    public function export()
    {
        // Ambil data dashboard
        $data = [
            'total_perusahaan'    => Company::count(),
            'total_user_aktif'    => User::where('status', 'active')->count(),
            'menunggu_verifikasi' => FinalProject::where('status', 'pending')->count(),
            'pending_mahasiswa'   => FinalProject::with('student')
                                        ->where('status', 'pending')
                                        ->orderBy('created_at', 'desc')
                                        ->get(),
        ];

        // Generate PDF dari view (buat file resources/views/admin/dashboard_pdf.blade.php)
        $pdf = Pdf::loadView('admin.dashboard_pdf', $data);

        // Download file PDF
        return $pdf->download('dashboard_admin.pdf');
    }
}

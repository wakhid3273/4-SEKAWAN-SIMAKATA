<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use App\Models\FinalProject;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        $totalVerifikasi = FinalProject::whereIn('status', ['approved', 'rejected'])->count();
        $totalPerusahaan = Company::count();
        $totalMahasiswa = User::where('role', 'user')->count();
        $pendingReview = FinalProject::where('status', 'pending')->count();

        // Dummy activity log
        $aktivitasTerbaru = [
            [
                'judul' => 'Verifikasi Pengajuan KP/Magang',
                'deskripsi' => 'Mahasiswa: Aditya Dharmawan',
                'waktu' => 'Hari ini, 14:20',
                'status' => 'BERHASIL',
                'icon' => 'verified_user',
                'color' => 'blue'
            ],
            [
                'judul' => 'Update Data Perusahaan',
                'deskripsi' => 'Mitra: PT Telkom Indonesia',
                'waktu' => 'Kemarin, 09:15',
                'status' => 'DIPERBARUI',
                'icon' => 'domain',
                'color' => 'amber'
            ],
            [
                'judul' => 'Verifikasi Judul TA',
                'deskripsi' => 'Mahasiswa: Rina Wijaya',
                'waktu' => '25 Okt 2024',
                'status' => 'DITERIMA',
                'icon' => 'school',
                'color' => 'amber'
            ],
            [
                'judul' => 'Import Data Mahasiswa Baru',
                'deskripsi' => 'Batch Angkatan 2024',
                'waktu' => '22 Okt 2024',
                'status' => '',
                'icon' => 'group_add',
                'color' => 'slate'
            ]
        ];

        return view('admin.profile', compact(
            'admin',
            'totalVerifikasi',
            'totalPerusahaan',
            'totalMahasiswa',
            'pendingReview',
            'aktivitasTerbaru'
        ));
    }
}

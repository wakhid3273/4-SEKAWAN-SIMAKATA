<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaMagang;
use App\Models\FinalProject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RiwayatAktivitasController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // Filter kegiatan
        $filterKegiatan = $request->get('kegiatan', 'Semua Kegiatan');
        
        // Ambil riwayat KP/Magang milik user
        $riwayatMagang = MahasiswaMagang::where('user_id', $user->id)
            ->with('perusahaan')
            ->when($filterKegiatan !== 'Semua Kegiatan', function ($query) use ($filterKegiatan) {
                if ($filterKegiatan === 'KP / Magang') {
                    $query->whereIn('kegiatan', ['Kerja Praktik', 'Magang']);
                } elseif ($filterKegiatan === 'Tugas Akhir') {
                    // Exclude from this query
                    $query->where('id', '<', 0);
                }
            })
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Ambil riwayat Tugas Akhir milik user
        $riwayatTA = FinalProject::where('user_id', $user->id)
            ->when($filterKegiatan !== 'Semua Kegiatan' && $filterKegiatan !== 'Tugas Akhir', function ($query) {
                // Exclude if not filtering for TA
                $query->where('id', '<', 0);
            })
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Statistik
        $stats = [
            'total' => $riwayatMagang->count() + $riwayatTA->count(),
            'pending' => $riwayatMagang->where('status', 'Pending Review')->count() + 
                        $riwayatTA->where('status', 'pending')->count(),
            'disetujui' => $riwayatMagang->where('status', 'Disetujui')->count() + 
                          $riwayatTA->where('status', 'approved')->count(),
        ];
        
        return view('user.riwayat-aktivitas.index', compact(
            'user',
            'riwayatMagang',
            'riwayatTA',
            'filterKegiatan',
            'stats'
        ));
    }
}

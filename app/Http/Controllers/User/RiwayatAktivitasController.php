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
            // Support both old format (Pending Review) and new format (pending)
            'pending' => $riwayatMagang->filter(function($item) {
                return $item->status === 'Pending Review' || $item->status === 'pending';
            })->count() + 
            $riwayatTA->where('status', 'pending')->count(),
            // Support both old format (Disetujui) and new format (approved)
            'disetujui' => $riwayatMagang->filter(function($item) {
                return $item->status === 'Disetujui' || $item->status === 'approved';
            })->count() + 
            $riwayatTA->where('status', 'approved')->count(),
            // Support both old format (Ditolak) and new format (rejected)
            'ditolak' => $riwayatMagang->filter(function($item) {
                return $item->status === 'Ditolak' || $item->status === 'rejected';
            })->count() + 
            $riwayatTA->where('status', 'rejected')->count(),
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

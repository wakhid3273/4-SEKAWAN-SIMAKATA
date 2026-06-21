<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatAktivitasController extends Controller
{
    public function index(Request $request)
    {
        $admin = Auth::user();
        
        // Filter action
        $filterAction = $request->get('action', 'Semua Aktivitas');
        
        // Query log aktivitas
        $query = AdminActivityLog::with('admin')->orderBy('created_at', 'desc');
        
        // Filter berdasarkan action
        if ($filterAction !== 'Semua Aktivitas') {
            $actionMap = [
                'Verifikasi' => ['approve_kp', 'reject_kp', 'approve_ta', 'reject_ta'],
                'Perusahaan' => ['create_perusahaan', 'update_perusahaan', 'delete_perusahaan'],
            ];
            
            if (isset($actionMap[$filterAction])) {
                $query->whereIn('action', $actionMap[$filterAction]);
            }
        }
        
        $riwayatAktivitas = $query->paginate(15);
        
        // Statistik
        $stats = [
            'total' => AdminActivityLog::count(),
            'verifikasi' => AdminActivityLog::whereIn('action', ['approve_kp', 'reject_kp', 'approve_ta', 'reject_ta'])->count(),
            'perusahaan' => AdminActivityLog::whereIn('action', ['create_perusahaan', 'update_perusahaan', 'delete_perusahaan'])->count(),
        ];
        
        return view('admin.riwayat-aktivitas.index', compact(
            'admin',
            'riwayatAktivitas',
            'filterAction',
            'stats'
        ));
    }
}

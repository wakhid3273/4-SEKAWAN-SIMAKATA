<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FinalProject;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $totalTugasAkhir = FinalProject::where('user_id', $user->id)->count();
        $pengajuanPending = FinalProject::where('user_id', $user->id)->where('status', 'pending')->count();
        $pengajuanDisetujui = FinalProject::where('user_id', $user->id)->where('status', 'approved')->count();
        
        // Dummy data for KP/Magang as there's no table linking user to magang application yet
        $totalKpMagang = 3; 

        return view('user.profile', compact(
            'user',
            'totalTugasAkhir',
            'pengajuanPending',
            'pengajuanDisetujui',
            'totalKpMagang'
        ));
    }
}

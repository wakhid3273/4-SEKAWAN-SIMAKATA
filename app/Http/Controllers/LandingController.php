<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login (kalau ada)
        $user = Auth::user();

        // Get dynamic stats
        $perusahaanCount = DB::table('perusahaan')->count();
        $mahasiswaMagangCount = DB::table('mahasiswa_magang')->count();
        $mahasiswaKpCount = DB::table('final_projects')->count(); // Assuming final_projects is used for Kerja Praktik
        
        // Kirim ke view landing.blade.php
        return view('landing', compact('user', 'perusahaanCount', 'mahasiswaMagangCount', 'mahasiswaKpCount'));
    }
}

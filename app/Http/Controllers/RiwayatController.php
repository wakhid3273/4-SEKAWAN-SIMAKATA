<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaMagang;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $query = MahasiswaMagang::with('perusahaan')->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nim', 'like', "%{$search}%")
                  ->orWhereHas('perusahaan', function ($sq) use ($search) {
                      $sq->where('nama', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('kegiatan') && $request->kegiatan !== 'Semua') {
            $query->where('kegiatan', $request->kegiatan);
        }

        $riwayat = $query->paginate(15)->withQueryString();

        $jenisKegiatan = MahasiswaMagang::select('kegiatan')
            ->whereNotNull('kegiatan')
            ->distinct()
            ->pluck('kegiatan');

        return view('riwayat.index', compact('riwayat', 'jenisKegiatan'));
    }
}

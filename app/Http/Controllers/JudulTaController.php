<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinalProject;

class JudulTaController extends Controller
{
    public function index(Request $request)
    {
        $query = FinalProject::with('student')->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('student', function ($sq) use ($search) {
                      $sq->where('nim', 'like', "%{$search}%")
                         ->orWhere('nama_lengkap', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('status') && $request->status !== 'Semua') {
            $mapStatus = [
                'Disetujui' => 'approved',
                'Pending'   => 'pending',
                'Ditolak'   => 'rejected',
            ];
            $s = $mapStatus[$request->status] ?? null;
            if ($s) $query->where('status', $s);
        }

        $judulTa = $query->paginate(10)->withQueryString();

        return view('judul-ta.index', compact('judulTa'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinalProject;
use App\Models\MahasiswaMagang;
use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    /**
     * Halaman utama verifikasi data.
     * Tab 1: Pengajuan KP/Magang  => mahasiswa_magang join perusahaan (tanpa status, display saja)
     * Tab 2: Pengajuan Tugas Akhir => final_projects (ada status: pending/approved/rejected)
     */
    public function index(Request $request)
    {
        $tab       = $request->get('tab', 'kpmagang');
        $search    = $request->get('search', '');
        $filterStatus = $request->get('status', '');

        // ── STATISTIK GLOBAL ─────────────────────────────────────────────
        $totalKp     = MahasiswaMagang::count();
        $totalTa     = FinalProject::count();
        $totalAll    = $totalKp + $totalTa;
        $pending     = FinalProject::where('status', 'pending')->count();
        $approved    = FinalProject::where('status', 'approved')->count();
        $rejected    = FinalProject::where('status', 'rejected')->count();

        // ── TAB KP/MAGANG (mahasiswa_magang) ─────────────────────────────
        $queryKp = MahasiswaMagang::with('perusahaan')
            ->when($search, function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%");
            });

        $kpList = $queryKp->orderByDesc('created_at')->paginate(10, ['*'], 'kp_page');

        // ── TAB TUGAS AKHIR (final_projects) ─────────────────────────────
        $queryTa = FinalProject::with('student')
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhereHas('student', fn($u) => $u->where('nama_lengkap', 'like', "%$search%")
                                                       ->orWhere('nim', 'like', "%$search%"));
            })
            ->when($filterStatus, function ($q) use ($filterStatus) {
                $q->where('status', $filterStatus);
            });

        $taList = $queryTa->orderByDesc('submitted_at')->paginate(10, ['*'], 'ta_page');

        // Stats cards – untuk KP/Magang tidak ada status, jadi gunakan total saja
        $stats = [
            'total'    => $totalAll,
            'pending'  => $pending,
            'approved' => $approved,
            'rejected' => $rejected,
        ];

        return view('admin.verifikasi.index', compact(
            'tab', 'search', 'filterStatus',
            'kpList', 'taList', 'stats'
        ));
    }

    /**
     * Detail satu pengajuan Tugas Akhir (AJAX/JSON untuk modal).
     */
    public function showTa($id)
    {
        $project = FinalProject::with('student')->findOrFail($id);
        return response()->json($project);
    }

    /**
     * Setujui pengajuan Tugas Akhir.
     */
    public function approveTa($id)
    {
        $project = FinalProject::findOrFail($id);
        $project->update(['status' => 'approved']);
        return back()->with('success', "Pengajuan \"{$project->title}\" telah disetujui.");
    }

    /**
     * Tolak pengajuan Tugas Akhir dengan alasan.
     */
    public function rejectTa(Request $request, $id)
    {
        $request->validate(['catatan' => 'nullable|string|max:500']);
        $project = FinalProject::findOrFail($id);
        $project->update(['status' => 'rejected']);
        return back()->with('success', "Pengajuan \"{$project->title}\" telah ditolak.");
    }
}

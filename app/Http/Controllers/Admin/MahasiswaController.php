<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan daftar semua mahasiswa (role = user).
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'user')->orderBy('created_at', 'desc');

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nim', 'like', "%{$search}%")
                  ->orWhere('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('angkatan', 'like', "%{$search}%")
                  ->orWhere('program_studi', 'like', "%{$search}%");
            });
        }

        // Filter angkatan
        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }

        // Filter status akademik
        if ($request->filled('status')) {
            $query->where('status_akademik', $request->status);
        }

        $mahasiswa   = $query->paginate(15)->withQueryString();
        $totalMhs    = User::where('role', 'user')->count();
        $angkatanList = User::where('role', 'user')
                            ->whereNotNull('angkatan')
                            ->distinct()
                            ->orderBy('angkatan', 'desc')
                            ->pluck('angkatan');

        return view('admin.mahasiswa.index', compact('mahasiswa', 'totalMhs', 'angkatanList'));
    }

    /**
     * Form tambah mahasiswa baru.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Simpan mahasiswa baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim'            => ['required', 'string', 'max:20', Rule::unique('users', 'nim')],
            'nama_lengkap'   => ['required', 'string', 'max:100'],
            'email'          => ['nullable', 'email', 'max:100', Rule::unique('users', 'email')],
            'angkatan'       => ['nullable', 'string', 'max:10'],
            'program_studi'  => ['nullable', 'string', 'max:100'],
            'semester_aktif' => ['nullable', 'string', 'max:10'],
            'nomor_telepon'  => ['nullable', 'string', 'max:20'],
            'status_akademik'=> ['nullable', 'string', 'in:Aktif,Cuti,Lulus,Mengundurkan Diri'],
            'password'       => ['required', 'string', 'min:6'],
        ]);

        User::create([
            'nim'            => $validated['nim'],
            'nama_lengkap'   => $validated['nama_lengkap'],
            'email'          => $validated['email'] ?? null,
            'angkatan'       => $validated['angkatan'] ?? null,
            'program_studi'  => $validated['program_studi'] ?? null,
            'semester_aktif' => $validated['semester_aktif'] ?? null,
            'nomor_telepon'  => $validated['nomor_telepon'] ?? null,
            'status_akademik'=> $validated['status_akademik'] ?? 'Aktif',
            'password'       => Hash::make($validated['password']),
            'role'           => 'user',
        ]);

        return redirect()->route('admin.mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail mahasiswa.
     */
    public function show(User $mahasiswa)
    {
        // Pastikan yang dibuka adalah user (bukan admin)
        abort_if($mahasiswa->role !== 'user', 403);
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Form edit mahasiswa.
     */
    public function edit(User $mahasiswa)
    {
        abort_if($mahasiswa->role !== 'user', 403);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update data mahasiswa.
     */
    public function update(Request $request, User $mahasiswa)
    {
        abort_if($mahasiswa->role !== 'user', 403);

        $validated = $request->validate([
            'nim'            => ['required', 'string', 'max:20', Rule::unique('users', 'nim')->ignore($mahasiswa->id)],
            'nama_lengkap'   => ['required', 'string', 'max:100'],
            'email'          => ['nullable', 'email', 'max:100', Rule::unique('users', 'email')->ignore($mahasiswa->id)],
            'angkatan'       => ['nullable', 'string', 'max:10'],
            'program_studi'  => ['nullable', 'string', 'max:100'],
            'semester_aktif' => ['nullable', 'string', 'max:10'],
            'nomor_telepon'  => ['nullable', 'string', 'max:20'],
            'status_akademik'=> ['nullable', 'string', 'in:Aktif,Cuti,Lulus,Mengundurkan Diri'],
            'password'       => ['nullable', 'string', 'min:6'],
        ]);

        $data = [
            'nim'            => $validated['nim'],
            'nama_lengkap'   => $validated['nama_lengkap'],
            'email'          => $validated['email'] ?? null,
            'angkatan'       => $validated['angkatan'] ?? null,
            'program_studi'  => $validated['program_studi'] ?? null,
            'semester_aktif' => $validated['semester_aktif'] ?? null,
            'nomor_telepon'  => $validated['nomor_telepon'] ?? null,
            'status_akademik'=> $validated['status_akademik'] ?? 'Aktif',
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $mahasiswa->update($data);

        return redirect()->route('admin.mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Hapus mahasiswa.
     */
    public function destroy(User $mahasiswa)
    {
        abort_if($mahasiswa->role !== 'user', 403);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil dihapus.');
    }

    /**
     * Export PDF daftar mahasiswa.
     */
    public function exportPdf(Request $request)
    {
        $query = User::where('role', 'user')->orderBy('angkatan', 'desc')->orderBy('nama_lengkap');

        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }
        if ($request->filled('status')) {
            $query->where('status_akademik', $request->status);
        }

        $mahasiswa    = $query->get();
        $totalMhs     = $mahasiswa->count();
        $filterAngkatan = $request->angkatan ?? 'Semua';
        $filterStatus   = $request->status   ?? 'Semua';
        $generatedAt    = now()->locale('id')->isoFormat('D MMMM YYYY, HH:mm');

        $pdf = Pdf::loadView('admin.mahasiswa.pdf', compact(
            'mahasiswa', 'totalMhs', 'filterAngkatan', 'filterStatus', 'generatedAt'
        ))->setPaper('a4', 'landscape');

        return $pdf->download('data-mahasiswa-simakata.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\MahasiswaMagang;
use App\Events\PerusahaanCreated;
use App\Events\PerusahaanUpdated;
use App\Events\PerusahaanDeleted;

class PerusahaanController extends Controller
{
    public function index(Request $request)
    {
        $query = Perusahaan::orderBy('nama', 'asc');

        // Search by nama or keyword
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($builder) use ($q) {
                $builder->where('nama', 'like', "%{$q}%")
                        ->orWhere('tentang', 'like', "%{$q}%")
                        ->orWhere('lokasi', 'like', "%{$q}%");
            });
        }

        // Filter by lokasi
        if ($request->filled('lokasi') && $request->lokasi !== 'Semua Lokasi') {
            $query->where('lokasi', $request->lokasi);
        }

        // Filter by jenis kegiatan
        if ($request->filled('jenis_kegiatan') && $request->jenis_kegiatan !== 'Semua Kegiatan') {
            $query->where('jenis_kegiatan', $request->jenis_kegiatan);
        }

        // Paginate 6 per halaman (3 kolom x 2 baris sesuai desain)
        $perusahaan = $query->withCount('magang')->paginate(6)->withQueryString();

        // Data untuk dropdown filter lokasi (unik)
        $lokasiList    = Perusahaan::select('lokasi')->whereNotNull('lokasi')->distinct()->pluck('lokasi');
        $jenisKegiatan = ['Magang', 'Kerja Praktik', 'Tugas Akhir'];

        return view('perusahaan.index', compact(
            'perusahaan',
            'lokasiList',
            'jenisKegiatan'
        ));
    }

    public function show($id)
    {
        // Ambil data perusahaan
        $perusahaan = Perusahaan::findOrFail($id);

        // Ambil riwayat magang mahasiswa di perusahaan ini
        $riwayatMagang = MahasiswaMagang::where('perusahaan_id', $id)->get();

        return view('perusahaan.detail', compact('perusahaan', 'riwayatMagang'));
    }

    public function manage()
    {
        $perusahaan = Perusahaan::orderBy('nama', 'asc')->paginate(10);
        return view('dashboard.perusahaan.index', compact('perusahaan'));
    }

    public function create()
    {
        return view('dashboard.perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'jenis_kegiatan' => 'nullable',
            'tentang' => 'nullable',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
            'jumlah_mahasiswa' => 'integer|min:0'
        ]);

        $perusahaan = Perusahaan::create($request->all());
        broadcast(new PerusahaanCreated($perusahaan));

        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('dashboard.perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
            'jenis_kegiatan' => 'nullable',
            'tentang' => 'nullable',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
            'jumlah_mahasiswa' => 'integer|min:0'
        ]);

        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update($request->all());
        broadcast(new PerusahaanUpdated($perusahaan));

        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
        broadcast(new PerusahaanDeleted($id));

        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil dihapus.');
    }
}

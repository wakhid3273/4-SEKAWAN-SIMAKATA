<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\MahasiswaMagang;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('perusahaan.index', compact('perusahaan'));
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
        $perusahaan = Perusahaan::all();
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
            'tentang' => 'nullable',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
            'jumlah_mahasiswa' => 'integer|min:0'
        ]);

        Perusahaan::create($request->all());

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
            'tentang' => 'nullable',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
            'jumlah_mahasiswa' => 'integer|min:0'
        ]);

        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update($request->all());

        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil dihapus.');
    }
}

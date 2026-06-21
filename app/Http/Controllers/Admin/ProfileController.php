<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Company;
use App\Models\FinalProject;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        $totalVerifikasi = FinalProject::whereIn('status', ['approved', 'rejected'])->count();
        $totalPerusahaan = Company::count();
        $totalMahasiswa = User::where('role', 'user')->count();
        $pendingReview = FinalProject::where('status', 'pending')->count();

        // Dummy activity log
        $aktivitasTerbaru = [
            [
                'judul' => 'Verifikasi Pengajuan KP/Magang',
                'deskripsi' => 'Mahasiswa: Aditya Dharmawan',
                'waktu' => 'Hari ini, 14:20',
                'status' => 'BERHASIL',
                'icon' => 'verified_user',
                'color' => 'blue'
            ],
            [
                'judul' => 'Update Data Perusahaan',
                'deskripsi' => 'Mitra: PT Telkom Indonesia',
                'waktu' => 'Kemarin, 09:15',
                'status' => 'DIPERBARUI',
                'icon' => 'domain',
                'color' => 'amber'
            ],
            [
                'judul' => 'Verifikasi Judul TA',
                'deskripsi' => 'Mahasiswa: Rina Wijaya',
                'waktu' => '25 Okt 2024',
                'status' => 'DITERIMA',
                'icon' => 'school',
                'color' => 'amber'
            ],
            [
                'judul' => 'Import Data Mahasiswa Baru',
                'deskripsi' => 'Batch Angkatan 2024',
                'waktu' => '22 Okt 2024',
                'status' => '',
                'icon' => 'group_add',
                'color' => 'slate'
            ]
        ];

        return view('admin.profile', compact(
            'admin',
            'totalVerifikasi',
            'totalPerusahaan',
            'totalMahasiswa',
            'pendingReview',
            'aktivitasTerbaru'
        ));
    }

    public function edit()
    {
        $admin = Auth::user();
        return view('admin.edit-profile', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'nim' => 'required|string|max:50|unique:users,nim,' . $admin->id,
            'password' => 'nullable|min:6',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // 5MB
            'cover_file' => 'nullable|file|mimes:jpeg,png,jpg,webp,mp4,webm|max:10240', // 10MB
            'cover_type' => 'nullable|in:image,video',
        ];

        $request->validate($rules);

        // Update basic info
        $admin->nama_lengkap = $request->nama_lengkap;
        $admin->email = $request->email;
        $admin->nim = $request->nim;

        // Handle delete profile photo FIRST before upload
        if ($request->input('delete_profile_photo') === '1') {
            if ($admin->profile_photo && Storage::disk('public')->exists($admin->profile_photo)) {
                Storage::disk('public')->delete($admin->profile_photo);
            }
            $admin->profile_photo = null;
        }

        // Handle profile photo upload (NEW)
        if ($request->hasFile('profile_photo')) {
            if ($admin->profile_photo && Storage::disk('public')->exists($admin->profile_photo)) {
                Storage::disk('public')->delete($admin->profile_photo);
            }
            $profilePhotoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $admin->profile_photo = $profilePhotoPath;
        }

        // Handle delete cover FIRST before upload
        if ($request->input('delete_cover') === '1') {
            if ($admin->cover_file && Storage::disk('public')->exists($admin->cover_file)) {
                Storage::disk('public')->delete($admin->cover_file);
            }
            $admin->cover_file = null;
            $admin->cover_type = null;
        }

        // Handle cover upload (NEW)
        if ($request->hasFile('cover_file')) {
            // Delete old cover
            if ($admin->cover_file && Storage::disk('public')->exists($admin->cover_file)) {
                Storage::disk('public')->delete($admin->cover_file);
            }

            $coverFile = $request->file('cover_file');
            $coverType = $request->input('cover_type', 'image');

            $coverPath = $coverFile->store('covers', 'public');
            $admin->cover_file = $coverPath;
            $admin->cover_type = $coverType;
        }

        // Update password if provided
        if ($request->filled('password')) {
            $admin->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui.');
    }
}

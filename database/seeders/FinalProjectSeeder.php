<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FinalProject;

class FinalProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Data Tugas Akhir dari DATABASE TUGAS AKHIR.xlsx
        // Setiap mahasiswa TA dibuatkan akun user dengan password = NIM huruf kecil
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022071'],
                [
                    'password'     => Hash::make('h1d022071'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Jasmine Adzra Fakhirah',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'PENGEMBANGAN APLIKASI END USER COMPUTING – CREDIT DOCUMENT AND CONTROL (EUC-CDC) TOOLS SEBAGAI PLATFORM DIGITALISASI DAN BUSINESS INTELLIGENCE UNTUK MONITORING DOKUMEN AGUNAN BERBASIS WEB',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022016'],
                [
                    'password'     => Hash::make('h1d022016'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Ageng Praba Wijaya',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'IMPLEMENTASI RETRIEVAL AUGMENTED GENERATION (RAG) PADA ASISTEN VIRTUAL DALAM PENGEMBANGAN WEBSITE SIWUR BERBASIS TALL STACK',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022001'],
                [
                    'password'     => Hash::make('h1d022001'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Emma Sarkilla',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'KLASTERISASI DATA PEMOHON PASPOR BERDASARKAN KARAKTERISTIK PEMOHON MENGGUNAKAN ALGORITMA K-PROROTYPES BERBASIS APLIKASI WEBSITE DI KANTOR IMIGRASI CILACAP',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022043'],
                [
                    'password'     => Hash::make('h1d022043'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Dzakwan Irfan Ramdhani',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'SISTEM IT HELPDESK DENGAN WORKFLOW AUTOMATION DA SERIVCE LEVEL AGREEMENT TRACKING DI PT KALBE MORINAGA INDONESIA',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022040'],
                [
                    'password'     => Hash::make('h1d022040'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Abdul Aziz Fahmi \'Alauddin',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'IMPLEMENTASI DAN ANALISIS PERFORMA LIBRARY LEAFLET,  OPENLAYERS, DAN MAPBOX GL JS PADA SISTEM INFORMASI  GEOGRAFIS PERSEBARAN KELOMPOK PEMBUDIDAYA IKAN KABUPATEN BANYUMAS BERBASIS WEBSITE',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022023'],
                [
                    'password'     => Hash::make('h1d022023'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Zia Khusnul Fauzi Akhmad',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'OPTIMALISASI ALGORITMA PATHFINDING A* DENGAN JUMP POINT SEARCH PADA GAME BERBASIS GRID MOVEMENT',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022031'],
                [
                    'password'     => Hash::make('h1d022031'),
                    'role'         => 'user',
                    'nama_lengkap' => 'athifa nathania',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'IMPLEMENTASI METODE SAW DAN RULE-BASED AI DALAM PENGEMBANGAN SISTEM MANAJEMEN BILL OF MATERIALS BERBASIS WEB UNTUK PENENTUAN SUPPLIER TERBAIK DI PT INDOMATSUMOTO PRESS & DIES INDUSTRIES',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022089'],
                [
                    'password'     => Hash::make('h1d022089'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Endini Nurlaily',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'IMPLEMENTASI ALGORITMA YOLO VERSI 8 UNTUK DETEKSI KENDARAAN PADA VIDEO LALU LINTAS (STUDI KASUS : DINAS PERHUBUNGAN KABUPATEN BANYUMAS)',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022009'],
                [
                    'password'     => Hash::make('h1d022009'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Brian Cahya Purnama',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'SISTEM PAKAR UNTUK DIAGNOSIS PENYAKIT GIGI DAN MULUT PADA ANAK DENGAN METODE FORWARD CHAINING BERBASIS WEBSITE',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022108'],
                [
                    'password'     => Hash::make('h1d022108'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Nabila Winanda Meirani',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'ANALISIS TREN DAN PREDIKSI KASUS DEMAM BERDARAH DENGUE DI DKI JAKARTA MENGGUNAKAN MODEL TIME SERIES SARIMA PERIODE 2010 - 2025',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
        {
            $user = User::firstOrCreate(
                ['nim' => 'H1D022084'],
                [
                    'password'     => Hash::make('h1d022084'),
                    'role'         => 'user',
                    'nama_lengkap' => 'Alfido Mazdan Marsyadi',
                ]
            );
            FinalProject::create([
                'user_id'      => $user->id,
                'title'        => 'SISTEM PENDUKUNG KEPUTUSAN UNTUK MANAJEMEN INVENTORY MENGGUNAKAN METODE SIMPLE ADDITIVE WEIGHTING(SAW) BERBASIS WEBSITE (STUDI KASUS: PT TIRTA EMPAT SATU)',
                'status'       => 'approved',
                'submitted_at' => now()->toDateString(),
            ]);
        }
    }
}

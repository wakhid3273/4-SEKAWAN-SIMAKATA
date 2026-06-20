<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MahasiswaMagang;
use App\Models\Perusahaan;

class MahasiswaMagangSeeder extends Seeder
{
    public function run(): void
    {
        // Dari DATABASE MAGANG ATAU MBKM.xlsx
        {
            $p = Perusahaan::where('nama', 'Kementerian Keuangan')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Taufik Satria Nugraha',
                    'nim'           => 'H1D020028',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Februari - Juni 2024 (6 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Solo Technopark')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Narotama',
                    'nim'           => 'H1D020060',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Permodalan Nasional Madani')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Katarina Putri Praditasari',
                    'nim'           => 'H1D020078',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'Februari - Juni 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Sekretariat Direktorat Jenderal Pendidikan Tinggi, Riset, dan Teknologi')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Tuti Alawiyah',
                    'nim'           => 'H1D020045',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Bank Central Asia Tbk')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Anin Ammbya Soulani',
                    'nim'           => 'H1D020055',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT INKA (Industri Kereta Api)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Salsabilla Puteri Sandi Wardana',
                    'nim'           => 'H1D021063',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'Februari - Juni 2024 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT INASTEK (Inamas Sintesis Teknologi)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Salsabilla Puteri Sandi Wardana',
                    'nim'           => 'H1D021063',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Traveloka Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Sad Keenanda Adityo',
                    'nim'           => 'H1D021045',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Februari - Juni 2024 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'CV. Brother Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Dhiya Ulhaq Ayyuasy',
                    'nim'           => 'H1D021040',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM Matching Fund Unsoed X Brother Indonesia',
                    'periode'       => 'Agustus-Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Telekomunikasi Selular')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Priandika Ratmadani Anugrah',
                    'nim'           => 'H1D021013',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Februari - Juni 2024 (5 Bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Bank Central Asia Tbk')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Hakam Royhan Adiluhung',
                    'nim'           => 'H1D020036',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Dicoding Academi Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Fauzan Akmal',
                    'nim'           => 'H1D020086',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Februari - Juli 2023(5 Bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Bangkit Academy')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Putri Alviany Dyah Prameswari',
                    'nim'           => 'H1D020030',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'September - Desember 2023 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Pegadaian')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nabila Rifdah Aulia',
                    'nim'           => 'H1D020073',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Bank CIMB Niaga Tbk')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Atika Zahra',
                    'nim'           => 'H1D020087',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM Kampus Merdeka',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Lawang Sewu Teknologi')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Atika Zahra',
                    'nim'           => 'H1D020087',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM Lawang Sewu',
                    'periode'       => 'Februari - Juni 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Bangkit Academy')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Taufik Satria Nugraha',
                    'nim'           => 'H1D020028',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'Februari - Juni 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Pegadaian')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Ihya\' Ulumiddin',
                    'nim'           => 'H1D020059',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Surya Citra Media')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Delvi Fitri Assary',
                    'nim'           => 'H1D020010',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Balitbang Diklat Kementerian Agama')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Fakhri Dwi Arkaan',
                    'nim'           => 'H1D020027',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'Agustus - Desember 2023 (5 Bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Global Digital Niaga Tbk')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Maria Ulfa Chasanah',
                    'nim'           => 'H1D020035',
                    'angkatan'      => '2020',
                    'kegiatan'      => 'MBKM Mandiri',
                    'periode'       => 'Agustus 2023 - Februari 2024 (7 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Cerdas Digital Nusantara (Cakap)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Niken Ayu Wijaya',
                    'nim'           => 'H1D021018',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Direktorat Jenderal Pendidikan Tinggi, Riset, dan Teknologi, Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Syifa Rahmadina',
                    'nim'           => 'H1D021094',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'Agustus - Desember 2023 (5 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Bakrie Center Foundation')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Adnan Fito Dharmawan',
                    'nim'           => 'H1D022054',
                    'angkatan'      => '2022',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Dinas Desa Panembangan Cilongok Banyumas')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Syaiful Latif',
                    'nim'           => 'H1D022025',
                    'angkatan'      => '2022',
                    'kegiatan'      => 'MBKM Poltades',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT United Tractors Tbk')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Ivan Darmawan',
                    'nim'           => 'H1D022042',
                    'angkatan'      => '2022',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'September - Desember 2024 (4 Bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'CNN Indonesia (PT Trans News Corpora)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alfi Syifana Ghozwy',
                    'nim'           => 'H1D021037',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Badan Strategi Kebijakan Luar Negeri (BSKLN) Kementerian Luar Negeri Republik Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nuansa Syafrie Rahardian',
                    'nim'           => 'H1D021083',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Dankos Farma')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Rizkytha Hatma Putri',
                    'nim'           => 'H1D021044',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Gama Inovasi Berdikari')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Ayu Anjar Paramestuti',
                    'nim'           => 'H1D021007',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Hacktivate Teknologi Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Khalimah Musaadah',
                    'nim'           => 'H1D021001',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Mitra Integrasi Informatika (Metrodata Academy)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nihayatur Rahmah',
                    'nim'           => 'H1D021002',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Mitra Integrasi Informatika (Metrodata Academy)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nurul Afifah',
                    'nim'           => 'H1D021042',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MSIB',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Telkom Indonesia (Persero) Tbk')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Aufa Syaihan Azzahidi',
                    'nim'           => 'H1D021020',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'Mandiri',
                    'periode'       => 'Agustus 2024 - Januari 2025 (6 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Blibli (PT. Global Digital Niaga)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Maulana Imamul Khaq',
                    'nim'           => 'H1D021054',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'Mandiri',
                    'periode'       => 'November 2024 - Mei 2025 (7 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kementerian Pemberdayaan Perempuan dan Perlindungan Anak, dan Pelitades')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Ahmad Rian Syaifullah',
                    'nim'           => 'H1D022010',
                    'angkatan'      => '2022',
                    'kegiatan'      => 'Mandiri dan MBKM',
                    'periode'       => 'Juli - Desember 2024 (6 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'CNN Indonesia (PT Trans News Corpora)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alfi Syifana Ghozwy',
                    'nim'           => 'H1D021037',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Modular Kuliner Indonesia (Hangry Indonesia)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Charinta Candrakanti Dewi',
                    'nim'           => 'H1D021082',
                    'angkatan'      => '2021',
                    'kegiatan'      => 'MBKM',
                    'periode'       => 'September - Desember 2024 (4 bulan)',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }

        // Dari DATABASE KERJA PRAKTIK.xlsx
        {
            $p = Perusahaan::where('nama', 'FT UNSOED')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Devyan Aby Rifai',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Domain Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Jamkrindo Purwokerto')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alviansyah Pangestu',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kecamatan Jatinegara Kabupaten Tegal')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Diya Aulia',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'BPKAD Pemalang')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Niken Ayu Wijaya',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Data Analyst',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Perpusda Purbalingga')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Bimo Amandito',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Data Analyst',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Perpusda Purbalingga')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nuansa Syafrie Rahardian',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Wordpress Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Perpusda Purbalingga')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Aufa Syaihan Azzahidi',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Arfin Goweb Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Mohamad Naufal Azizi',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'UIUX',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Bapenda Kota Batam')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Naufal Althafi Handoyo',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Frontend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Bapenda Kota Batam')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Mohammad Nafiis Septiano',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Frontend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Arfin Goweb Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Usriyatul Khamimah',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Frontend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Perda Purbalingga')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Rizkytha Hatma Putri',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kominfo Purbalingga')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Hanif',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kominfo Purbalingga')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Justicio Caesario',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'IT Security',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Lawangsewu Teknologi Cabang Purwokerto')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Marsa Salsabila',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'LPPM Unsoed')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alvin Aryanta Suwardono',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Wordpress Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kominfo RI')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Daffa Khairon Khan',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'QA Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Astra Otoparts Tbk Divisi Winteq')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nursina Hamdalah',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Astra Otoparts Tbk Divisi Winteq')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Charinta Candrakanti Dewi',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Mal Pelayanan Publik BMS')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Yasif Akbar',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'QA Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Mal Pelayanan Publik BMS')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Fachrubi Annafi',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Videographer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Mal Pelayanan Publik BMS')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Anisa Meilia',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'QA Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Soedirman Career Center')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Raudhotin Eka Putri',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'QA Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Desa Wisata Tambaknegara')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nihayatur Rahmah',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'UIUX',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kominfo RI')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Wildan Nouval Rizki',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'QA Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kominfo RI')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Rangga Dwi Mahendra',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'QA Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Arfin Goweb Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Ahita Bisma Adlula',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Frontend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'RSUD Pelabuhanratu')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alifa Nasywa Retno Agustin',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Perna Persada')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Gilang Ashar Aldiansyah',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'System Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Perna Persada')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Bagus Hanifuddin',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Jamkrindo Purwokerto')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Salman Farrisi',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Desa Wisata Tambaknegara')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Randhika Rangga Suryakusuma',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Dinpora')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Ayu Anjar Paramestuti',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'QA Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PLN Icon Plus')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Rayhan Aghnat',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'System Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'KEMENTERIAN KELAUTAN DAN PERIKANAN')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Levi Asshidiqi',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PLN ULP Wangon')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Agung Wira Pradhana',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'System Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'B-Universe')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Adnan Fito Dharmawan',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'System Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PLN UP3 Purwokerto')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Adhwa Moyafi Hartoyo',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Frontend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Diskominfo Pemalang')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Wike Laelatunuji',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'System Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Kilang Pertamina Internasional Refinery Unit IV Cilacap')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Khansa Khalda',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'UIUX',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Birutekno Bandung')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nurul Afifah',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kemen PPPA Jakarta')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Syaiful Latif',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'UIUX',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT KAI DAOP V Purwokerto')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Annisa Raihan Delana',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'GDP Labs Yogyakarta')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Amar Ma\'ruf',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'System Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Diskominfotik DKI Jakarta')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Nailia Farah Isnaeni',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'BPS Kota Pekalongan')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Khadziq',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Rumah Sakit Santa Elisabeth Purwokerto')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Brian Cahya',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'CV Jenderal Solusi Digital')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Hendra Latieful Maajid',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'LPPM UNSOED')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Ivan Darmawan',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'QA Engineer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Protergo Siber Sekuriti (Jakarta)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Rizqullah Abiyyu Hade',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Penetration Tester',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Kilang Pertamina Internasional Refinery Unit IV Cilacap')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Mutia Nandhika',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'UIUX',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT KAI DAOP V Purwokerto')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Claresta Berthalita Jatmika',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Rumah Sakit Santa Elisabeth Purwokerto')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'JEHIAN ATHAYA TSANI AZ ZUHRY',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Diskominfo Kota Tasikmalaya')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muthia Khanza',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Backend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT SUMBER SEGARA PRIMADAYA (PLTU) CILACAP')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'EMMA SARKILLA',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Backend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Mandom Indonesia Tbk')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Anindya Diva Talitha',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'CV Jenderal Solusi Digital')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'DZAKWAN IRFAN RAMDHANI',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT PLN Indonesia Power UBP Mrica')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Zia Khusnul Fauzi Akhmad',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Mobile Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'CV Jenderal Solusi Digital')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Ageng Praba Wijaya',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'BPS Kabupaten Banyumas')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alfi Syifana Ghozwy',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Graphic Design',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kominfo Purbalingga')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Azzam Dicky Umar Widadi',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Frontend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Perumda Air Minum Tirta Satria Banyumas')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Luthfi Emillulfata',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Backend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT TIRTA EMPAT SATU BERKAH AGUARIA')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Mochamad Gilang Fadil Hakim',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Mandom Indonesia Tbk')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Eka Belandini',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Pegadaian (Persero) Pusat')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Rizka Hasna Nabila',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Business Analyst (BA)',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'BKPSDM Kota Banjar')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhamad Galih',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT TIRTA EMPAT SATU BERKAH AGUARIA')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alfido Mazdan Marsyadi',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack Laravel Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Data Bumi Indonesia')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Athiyya Adzky Khairany',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Frontend Developer',
                    'periode'       => '',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN BANYUMAS')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Otniel Eguwaidanu Degei',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Evaluasi Website E-Office Banyumas',
                    'periode'       => '1 Bulan',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT KILANG PERTAMINA INTERNASIONAL RU IV CILACAP')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Raditya Yusuf Ramadhan',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => '-',
                    'periode'       => '2 Bulan',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'CV. Has Survey')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Karel Tsalasatir Riyan',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'FULL STACK',
                    'periode'       => '1 Bulan Setengah',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Kaskar Group')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Jeskris Oktovianus Silahooy',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Front end',
                    'periode'       => 'Sebulan',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Solusi Bangun Indonesia Tbk Cilacap')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alya Luthfi Kharimah',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Full Stack',
                    'periode'       => '1 Juli - 8 Agustus',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Bali Internasional Teknologi')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Muhammad Nabil Putra Monti',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Programmer',
                    'periode'       => '1 bulan hari kerja',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT PLN Nusantara Power Unit Pembangkitan Muara Tawar')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Rafif Surya Murtadha',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'full stack developer',
                    'periode'       => 'Selasa, 1 Juli 2025 s.d. Jumat, 1 Agustus 2025',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'Dinas Kebudayaan DKI Jakarta')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'REVALINA FIDIYA ANUGRAH',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Front-End Dev',
                    'periode'       => '1 Bulan',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT Solusi Bangun Indonesia Tbk Pabrik Cilacap')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Alfan Fauzan Ridlo',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Full Stack',
                    'periode'       => '1 Juli - 8 Agustus 2025',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
        {
            $p = Perusahaan::where('nama', 'PT. Dirgantara Indonesia (Persero)')->first();
            if ($p) {
                MahasiswaMagang::create([
                    'nama'          => 'Gilang Happy Dwinugroho',
                    'nim'           => '',
                    'angkatan'      => '',
                    'kegiatan'      => 'Kerja Praktik',
                    'posisi'        => 'Fullstack',
                    'periode'       => '1 Bulan',
                    'perusahaan_id' => $p->id,
                    'status'        => 'Disetujui',
                ]);
            }
        }
    }
}

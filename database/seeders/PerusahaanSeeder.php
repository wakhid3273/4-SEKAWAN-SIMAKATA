<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perusahaan;

class PerusahaanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama'            => 'TechGlobal Indonesia',
                'lokasi'          => 'Jakarta Selatan, DKI Jakarta',
                'jenis_kegiatan'  => 'Magang',
                'tentang'         => 'TechGlobal Indonesia adalah perusahaan teknologi terkemuka yang berfokus pada transformasi digital dan inovasi perangkat lunak berskala enterprise.',
                'website'         => 'https://www.techglobal.id',
                'email'           => 'talent@techglobal.id',
                'alamat'          => 'SCBD District 8, Senopati, Kebayoran Baru, Jakarta Selatan',
                'jumlah_mahasiswa'=> 12,
            ],
            [
                'nama'            => 'DataNexus Solutions',
                'lokasi'          => 'Bandung, Jawa Barat',
                'jenis_kegiatan'  => 'Kerja Praktik',
                'tentang'         => 'DataNexus Solutions bergerak di bidang analitik data dan kecerdasan buatan untuk solusi bisnis modern.',
                'website'         => 'https://www.datanexus.co.id',
                'email'           => 'hr@datanexus.co.id',
                'alamat'          => 'Jl. Buah Batu No. 55, Bandung',
                'jumlah_mahasiswa'=> 45,
            ],
            [
                'nama'            => 'CreativePixels Lab',
                'lokasi'          => 'Yogyakarta, DIY',
                'jenis_kegiatan'  => 'Magang',
                'tentang'         => 'CreativePixels Lab adalah studio desain digital kreatif yang mengerjakan proyek UI/UX dan branding untuk klien domestik dan internasional.',
                'website'         => 'https://www.creativepixels.id',
                'email'           => 'intern@creativepixels.id',
                'alamat'          => 'Jl. Kaliurang KM 7, Sleman, Yogyakarta',
                'jumlah_mahasiswa'=> 8,
            ],
            [
                'nama'            => 'CyberGuard Security',
                'lokasi'          => 'Jakarta Pusat, DKI Jakarta',
                'jenis_kegiatan'  => 'Tugas Akhir',
                'tentang'         => 'CyberGuard Security adalah perusahaan keamanan siber terdepan yang menyediakan layanan proteksi infrastruktur digital untuk perusahaan besar.',
                'website'         => 'https://www.cyberguard.id',
                'email'           => 'recruit@cyberguard.id',
                'alamat'          => 'Sudirman Park, Lt. 12, Jakarta Pusat',
                'jumlah_mahasiswa'=> 21,
            ],
            [
                'nama'            => 'StartupHub Nusantara',
                'lokasi'          => 'Tangerang, Banten',
                'jenis_kegiatan'  => 'Magang',
                'tentang'         => 'StartupHub Nusantara adalah ekosistem startup terbesar di kawasan Banten yang mendukung inovasi teknologi lokal.',
                'website'         => 'https://www.startuphub.id',
                'email'           => 'intern@startuphub.id',
                'alamat'          => 'BSD City, Tangerang Selatan, Banten',
                'jumlah_mahasiswa'=> 5,
            ],
            [
                'nama'            => 'Artha Fintech Group',
                'lokasi'          => 'Surabaya, Jawa Timur',
                'jenis_kegiatan'  => 'Kerja Praktik',
                'tentang'         => 'Artha Fintech Group adalah perusahaan finansial teknologi yang membangun platform pembayaran dan pinjaman digital untuk UMKM Indonesia.',
                'website'         => 'https://www.arthafintech.co.id',
                'email'           => 'career@arthafintech.co.id',
                'alamat'          => 'Jl. Pemuda No. 27, Surabaya, Jawa Timur',
                'jumlah_mahasiswa'=> 33,
            ],
            [
                'nama'            => 'CloudMatrix Infra',
                'lokasi'          => 'Denpasar, Bali',
                'jenis_kegiatan'  => 'Tugas Akhir',
                'tentang'         => 'CloudMatrix Infra menyediakan layanan infrastruktur cloud computing dan DevOps untuk perusahaan skala menengah dan enterprise.',
                'website'         => 'https://www.cloudmatrix.id',
                'email'           => 'talent@cloudmatrix.id',
                'alamat'          => 'Jl. Teuku Umar, Denpasar Barat, Bali',
                'jumlah_mahasiswa'=> 17,
            ],
            [
                'nama'            => 'GreenLogic Systems',
                'lokasi'          => 'Semarang, Jawa Tengah',
                'jenis_kegiatan'  => 'Magang',
                'tentang'         => 'GreenLogic Systems berfokus pada pengembangan sistem IoT dan otomasi industri berbasis teknologi hijau ramah lingkungan.',
                'website'         => 'https://www.greenlogic.id',
                'email'           => 'hrd@greenlogic.id',
                'alamat'          => 'Kawasan Industri Wijayakusuma, Semarang',
                'jumlah_mahasiswa'=> 9,
            ],
            [
                'nama'            => 'MediTech Indonesia',
                'lokasi'          => 'Bandung, Jawa Barat',
                'jenis_kegiatan'  => 'Kerja Praktik',
                'tentang'         => 'MediTech Indonesia mengembangkan solusi teknologi kesehatan digital meliputi rekam medis elektronik dan telemedicine.',
                'website'         => 'https://www.meditech.id',
                'email'           => 'intern@meditech.id',
                'alamat'          => 'Jl. Pasteur No. 77, Bandung',
                'jumlah_mahasiswa'=> 14,
            ],
        ];

        foreach ($data as $item) {
            Perusahaan::create($item);
        }
    }
}

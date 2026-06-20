<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perusahaan;

class PerusahaanSeeder extends Seeder
{
    public function run(): void
    {
        // Data perusahaan/instansi dari DATABASE MAGANG ATAU MBKM.xlsx
        $dataMagang = [
            [
                'nama'             => 'Badan Strategi Kebijakan Luar Negeri (BSKLN) Kementerian Luar Negeri Republik Indonesia',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Bakrie Center Foundation',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Balitbang Diklat Kementerian Agama',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Bangkit Academy',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'Blibli (PT. Global Digital Niaga)',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'CNN Indonesia (PT Trans News Corpora)',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'CV. Brother Indonesia',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Dinas Desa Panembangan Cilongok Banyumas',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Direktorat Jenderal Pendidikan Tinggi, Riset, dan Teknologi, Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Kementerian Keuangan',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Kementerian Pemberdayaan Perempuan dan Perlindungan Anak, dan Pelitades',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Bank CIMB Niaga Tbk',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Bank Central Asia Tbk',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'PT Dankos Farma',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Dicoding Academi Indonesia',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Gama Inovasi Berdikari',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Global Digital Niaga Tbk',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Hacktivate Teknologi Indonesia',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT INASTEK (Inamas Sintesis Teknologi)',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT INKA (Industri Kereta Api)',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Lawang Sewu Teknologi',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Mitra Integrasi Informatika (Metrodata Academy)',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'PT Pegadaian',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'PT Permodalan Nasional Madani',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Surya Citra Media',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Telkom Indonesia (Persero) Tbk',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Traveloka Indonesia',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT United Tractors Tbk',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT. Cerdas Digital Nusantara (Cakap)',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT. Modular Kuliner Indonesia (Hangry Indonesia)',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT. Telekomunikasi Selular',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Sekretariat Direktorat Jenderal Pendidikan Tinggi, Riset, dan Teknologi',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Solo Technopark',
                'jenis_kegiatan'   => 'Magang',
                'jumlah_mahasiswa' => 1,
            ],
        ];

        // Data perusahaan/instansi dari DATABASE KERJA PRAKTIK.xlsx
        $dataKP = [
            [
                'nama'             => 'B-Universe',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'BKPSDM Kota Banjar',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'BPKAD Pemalang',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'BPS Kabupaten Banyumas',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'BPS Kota Pekalongan',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Bapenda Kota Batam',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'Birutekno Bandung',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'CV Jenderal Solusi Digital',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 3,
            ],
            [
                'nama'             => 'CV. Has Survey',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN BANYUMAS',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Desa Wisata Tambaknegara',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'Dinas Kebudayaan DKI Jakarta',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Dinpora',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Diskominfo Kota Tasikmalaya',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Diskominfo Pemalang',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Diskominfotik DKI Jakarta',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'FT UNSOED',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'GDP Labs Yogyakarta',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'KEMENTERIAN KELAUTAN DAN PERIKANAN',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Kaskar Group',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Kecamatan Jatinegara Kabupaten Tegal',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Kemen PPPA Jakarta',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Kominfo Purbalingga',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 3,
            ],
            [
                'nama'             => 'Kominfo RI',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 3,
            ],
            [
                'nama'             => 'LPPM UNSOED',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'LPPM Unsoed',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Mal Pelayanan Publik BMS',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 3,
            ],
            [
                'nama'             => 'PLN Icon Plus',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PLN ULP Wangon',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PLN UP3 Purwokerto',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Astra Otoparts Tbk Divisi Winteq',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'PT Bali Internasional Teknologi',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Jamkrindo Purwokerto',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'PT KAI DAOP V Purwokerto',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'PT KILANG PERTAMINA INTERNASIONAL RU IV CILACAP',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Lawangsewu Teknologi Cabang Purwokerto',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Mandom Indonesia Tbk',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT PLN Indonesia Power UBP Mrica',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT PLN Nusantara Power Unit Pembangkitan Muara Tawar',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Pegadaian (Persero) Pusat',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Protergo Siber Sekuriti (Jakarta)',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT SUMBER SEGARA PRIMADAYA (PLTU) CILACAP',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Solusi Bangun Indonesia Tbk Cilacap',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT Solusi Bangun Indonesia Tbk Pabrik Cilacap',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT TIRTA EMPAT SATU BERKAH AGUARIA',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'PT. Arfin Goweb Indonesia',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 3,
            ],
            [
                'nama'             => 'PT. Data Bumi Indonesia',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT. Dirgantara Indonesia (Persero)',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT. Kilang Pertamina Internasional Refinery Unit IV Cilacap',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'PT. Mandom Indonesia Tbk',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'PT. Perna Persada',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'Perda Purbalingga',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Perpusda Purbalingga',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 3,
            ],
            [
                'nama'             => 'Perumda Air Minum Tirta Satria Banyumas',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'RSUD Pelabuhanratu',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
            [
                'nama'             => 'Rumah Sakit Santa Elisabeth Purwokerto',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 2,
            ],
            [
                'nama'             => 'Soedirman Career Center',
                'jenis_kegiatan'   => 'Kerja Praktik',
                'jumlah_mahasiswa' => 1,
            ],
        ];

        $faker = \Faker\Factory::create('id_ID');

        foreach (array_merge($dataMagang, $dataKP) as $item) {
            $item['tentang'] = $faker->paragraph(3);
            $item['lokasi'] = $faker->city();
            $item['website'] = 'https://' . $faker->domainName();
            $item['email'] = $faker->companyEmail();
            $item['alamat'] = $faker->address();
            
            Perusahaan::create($item);
        }
    }
}

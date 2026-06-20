<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Mahasiswa</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 11px; margin: 0; padding: 0; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h1 { margin: 0; font-size: 18px; text-transform: uppercase; }
        .header p { margin: 3px 0; font-size: 12px; }
        .meta-info { margin-bottom: 15px; font-size: 11px; }
        .meta-info table { width: 100%; border: none; }
        .meta-info td { padding: 2px; border: none; }
        
        table.data-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table.data-table th, table.data-table td {
            border: 1px solid #333; padding: 6px; text-align: left; vertical-align: top;
        }
        table.data-table th { background-color: #f0f0f0; font-weight: bold; }
        
        .footer { margin-top: 30px; font-size: 9px; text-align: center; color: #555; }
        .text-center { text-align: center !important; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sistem Informasi Manajemen Kerja Praktik dan Tugas Akhir</h1>
        <p><strong>(SIMAKATA)</strong></p>
        <p>Laporan Data Mahasiswa</p>
    </div>

    <div class="meta-info">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td width="15%"><strong>Total Mahasiswa</strong></td>
                <td width="2%">:</td>
                <td width="33%">{{ $totalMhs }}</td>
                <td width="15%"><strong>Filter Angkatan</strong></td>
                <td width="2%">:</td>
                <td width="33%">{{ $filterAngkatan }}</td>
            </tr>
            <tr>
                <td><strong>Waktu Dicetak</strong></td>
                <td>:</td>
                <td>{{ $generatedAt }}</td>
                <td><strong>Filter Status</strong></td>
                <td>:</td>
                <td>{{ $filterStatus }}</td>
            </tr>
        </table>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="15%">NIM</th>
                <th width="25%">Nama Lengkap</th>
                <th width="10%">Angkatan</th>
                <th width="15%">Program Studi</th>
                <th width="20%">Email</th>
                <th width="10%" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $i => $mhs)
            <tr>
                <td class="text-center">{{ $i + 1 }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama_lengkap ?? '-' }}</td>
                <td class="text-center">{{ $mhs->angkatan ?? '-' }}</td>
                <td>{{ $mhs->program_studi ?? '-' }}</td>
                <td>{{ $mhs->email ?? '-' }}</td>
                <td class="text-center">{{ $mhs->status_akademik ?? 'Aktif' }}</td>
            </tr>
            @endforeach
            @if(count($mahasiswa) == 0)
            <tr>
                <td colspan="7" class="text-center">Tidak ada data mahasiswa.</td>
            </tr>
            @endif
        </tbody>
    </table>

    <div class="footer">
        Dicetak otomatis oleh SIMAKATA pada {{ $generatedAt }}<br>
        © Informatika Universitas Jenderal Soedirman
    </div>
</body>
</html>

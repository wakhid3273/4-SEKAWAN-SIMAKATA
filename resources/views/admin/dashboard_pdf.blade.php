<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data SIMAKATA</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; color: #333; }
        h1 { margin: 0; padding: 10px 0 5px; color: #1a5fb4; text-align: center; font-size: 24px; }
        .subtitle { text-align: center; font-size: 12px; color: #666; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #e2e8f0; padding: 12px; text-align: left; }
        th { background: #f8fafc; color: #1e293b; font-weight: bold; width: 60%; }
        td { font-weight: bold; color: #1a5fb4; text-align: right; width: 40%; font-size: 16px; }
        .footer { margin-top: 50px; font-size: 10px; text-align: center; color: #94a3b8; }
    </style>
</head>
<body>
    <h1>Laporan Data SIMAKATA</h1>
    <div class="subtitle">Sistem Informasi Magang, Kerja Praktik, dan Tugas Akhir<br>Universitas Jenderal Soedirman</div>

    <table>
        <tbody>
            <tr>
                <th>Total Perusahaan Terdaftar</th>
                <td>{{ $total_perusahaan }}</td>
            </tr>
            <tr>
                <th>Total Mahasiswa Terdaftar</th>
                <td>{{ $total_mahasiswa }}</td>
            </tr>
            <tr>
                <th>Total Verifikasi Pengajuan Pending</th>
                <td>{{ $total_pending }}</td>
            </tr>
            <tr>
                <th>Total Verifikasi Pengajuan Disetujui</th>
                <td>{{ $total_disetujui }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}<br>
        © SIMAKATA Informatika Universitas Jenderal Soedirman.
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard Admin Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1, h2, h3 { margin: 0; padding: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 6px; text-align: left; }
        .summary { margin-bottom: 20px; }
        .summary div { margin: 5px 0; }
    </style>
</head>
<body>
    <h1>SIMAKATA - Dashboard Admin Report</h1>
    <p><em>Universitas Jenderal Soedirman</em></p>

    <div class="summary">
        <h2>Ringkasan</h2>
        <div>Total Perusahaan: {{ $total_perusahaan }}</div>
        <div>Total User Aktif: {{ $total_user_aktif }}</div>
        <div>Menunggu Verifikasi: {{ $menunggu_verifikasi }}</div>
    </div>

    <h2>Status Verifikasi Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Judul Tugas Akhir</th>
                <th>Tanggal Submit</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pending_mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs->student->name }}</td>
                    <td>{{ $mhs->title }}</td>
                    <td>{{ $mhs->submitted_at }}</td>
                    <td>{{ $mhs->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer style="margin-top:30px; font-size:10px; text-align:center;">
        SIMAKATA — The official management system for Informatics Final Projects and Internship tracking.<br>
        © SIMAKATA Informatika Universitas Jenderal Soedirman. All rights reserved.
    </footer>
</body>
</html>

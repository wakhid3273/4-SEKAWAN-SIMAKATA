@extends('layouts.app')

@section('title', $perusahaan->nama)

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="fw-bold">{{ $perusahaan->nama }}</h2>
            <p class="text-muted">{{ $perusahaan->lokasi }}</p>
            <p><strong>{{ $perusahaan->jumlah_mahasiswa }}</strong> mahasiswa magang</p>

            <ul class="nav nav-tabs mt-4" id="perusahaanTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="info-tab" data-bs-toggle="tab" href="#info" role="tab">Informasi Perusahaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="riwayat-tab" data-bs-toggle="tab" href="#riwayat" role="tab">Riwayat Magang</a>
                </li>
            </ul>

            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="info" role="tabpanel">
                    <h5>Tentang Perusahaan</h5>
                    <p>{{ $perusahaan->tentang }}</p>

                    <h5>Kontak & Lokasi</h5>
                    <p>Website: <a href="{{ $perusahaan->website }}" target="_blank">{{ $perusahaan->website }}</a></p>
                    <p>Email: {{ $perusahaan->email }}</p>
                    <p>Alamat: {{ $perusahaan->alamat }}</p>
                </div>

                <div class="tab-pane fade" id="riwayat" role="tabpanel">
                    <h5>Riwayat Magang Mahasiswa</h5>
                    <ul class="list-group">
                        @foreach($riwayatMagang as $mhs)
                            <li class="list-group-item">
                                <strong>{{ $mhs->nama }}</strong> – Angkatan {{ $mhs->angkatan }}  
                                <br>Posisi: {{ $mhs->posisi }}  
                                <br>Periode: {{ $mhs->periode }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

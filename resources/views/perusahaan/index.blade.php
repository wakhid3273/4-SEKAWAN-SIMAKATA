@extends('layouts.app')

@section('title', 'Database Perusahaan')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Database Perusahaan</h2>
        <a href="{{ route('landing') }}" class="btn btn-outline-secondary">Kembali ke Beranda</a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($perusahaan as $p)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $p->nama }}</h5>
                        <p class="card-text text-muted small"><i class="material-icons-outlined align-middle fs-6">location_on</i> {{ $p->lokasi }}</p>
                        <p class="card-text">{{ Str::limit($p->tentang, 100) }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 pt-0">
                        <a href="{{ route('perusahaan.detail', $p->id) }}" class="btn btn-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($perusahaan->isEmpty())
        <div class="alert alert-info text-center">
            Belum ada data perusahaan.
        </div>
    @endif
</div>
@endsection

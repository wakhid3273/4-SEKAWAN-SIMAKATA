@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 bg-light p-3">
            <h4>Mahasiswa Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Input Tugas Akhir</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Riwayat Aktivitas</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Profil</a>
                </li>
                <!-- Logout pakai form POST -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="padding:0; border:none; background:none;">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 p-4">
            <h2>Selamat Datang, {{ Auth::user()->name }}</h2>
            <p>Kelola Kerja Praktik, Magang, dan Tugas Akhir Anda dalam satu platform yang terintegrasi dan efisien.</p>

            <!-- Ringkasan -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5>Status Verifikasi</h5>
                            <p>{{ $status_verifikasi }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Aktivitas -->
            <h4>Riwayat Aktivitas</h4>
            <ul class="list-group">
                @foreach($riwayat_aktivitas as $aktivitas)
                    <li class="list-group-item">
                        <strong>{{ $aktivitas['judul'] }}</strong><br>
                        {{ $aktivitas['deskripsi'] }}<br>
                        <small>{{ $aktivitas['waktu'] }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

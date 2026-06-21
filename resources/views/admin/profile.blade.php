@extends('layouts.admin')

@section('title', 'Profil Admin')

@section('extra_styles')
    <style>
        /* ===== PREMIUM CARD SYSTEM ===== */
        .profile-header-card {
            background: linear-gradient(135deg, #0a3d6b 0%, #1a5fb4 100%);
            border-radius: 16px;
            padding: 30px;
            display: flex;
            align-items: center;
            gap: 24px;
            color: white;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
            min-height: 200px;
            box-shadow: 0 4px 12px rgba(10, 61, 107, 0.15), 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Premium Hover Effect - Profile Card */
        .profile-header-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(10, 61, 107, 0.25), 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .profile-header-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
            pointer-events: none;
        }

        .profile-header-card::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
            z-index: 2;
        }
        
        .profile-cover-media {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Subtle depth effect on cover */
        .profile-header-card:hover .profile-cover-media {
            transform: scale(1.02);
        }
        
        .profile-cover-media video {
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
        }

        .profile-avatar-wrapper {
            position: relative;
            z-index: 3;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Premium Avatar Hover */
        .profile-avatar-wrapper:hover {
            transform: scale(1.05);
        }
        
        .profile-avatar-wrapper:hover .profile-avatar {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3), 0 0 0 4px rgba(244, 168, 7, 0.3);
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 16px;
            object-fit: cover;
            /* Premium Ring Effect */
            border: 3px solid rgba(255, 255, 255, 0.3);
            box-shadow: 
                0 4px 12px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(244, 168, 7, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            /* Subtle shine effect */
            position: relative;
        }
        
        .profile-avatar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, transparent 50%);
            pointer-events: none;
        }

        .profile-avatar-icon {
            position: absolute;
            bottom: -8px;
            right: -8px;
            background: #f4a807;
            color: white;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 14px;
            z-index: 4;
            box-shadow: 0 2px 8px rgba(244, 168, 7, 0.4);
            transition: transform 0.2s ease;
        }
        
        .profile-avatar-wrapper:hover .profile-avatar-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .profile-info {
            z-index: 3;
            transition: transform 0.3s ease;
        }
        
        .profile-header-card:hover .profile-info {
            transform: translateY(-2px);
        }

        .profile-info h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 4px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .profile-info p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-edit-profile {
            margin-left: auto;
            background: #f4a807;
            color: #0d1b2e;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            z-index: 1;
            box-shadow: 0 2px 8px rgba(244, 168, 7, 0.3);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-edit-profile:hover {
            background: #e59a05;
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(244, 168, 7, 0.4);
        }
        
        .btn-edit-profile:active {
            transform: translateY(0);
        }

        .stats-grid-profile {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        /* ===== PREMIUM STAT CARDS ===== */
        .stat-box {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        /* Subtle accent line on top */
        .stat-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #1a5fb4, transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        /* Premium Hover - Stat Cards */
        .stat-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1), 0 2px 6px rgba(0, 0, 0, 0.06);
            border-color: #d1d5db;
        }
        
        .stat-box:hover::before {
            opacity: 1;
        }

        .stat-box-icon {
            width: 32px;
            height: 32px;
            background: #f3f6fb;
            color: #1a5fb4;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }
        
        /* Icon Animation on Hover */
        .stat-box:hover .stat-box-icon {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(26, 95, 180, 0.2);
        }

        .stat-box-title {
            font-size: 10px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }
        
        .stat-box:hover .stat-box-title {
            color: #1a5fb4;
        }

        .stat-box-value {
            font-size: 24px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }
        
        /* Number Emphasis on Hover */
        .stat-box:hover .stat-box-value {
            color: #1a5fb4;
            transform: scale(1.02);
            transform-origin: left;
        }

        .stat-box-trend {
            font-size: 11px;
            color: #10b981;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 24px;
        }

        /* ===== PREMIUM INFO CARDS ===== */
        .info-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Subtle Hover - Info Cards */
        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.04);
            border-color: #d1d5db;
        }

        .info-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: #111827;
            background: #f8fafc;
            transition: background 0.3s ease;
        }
        
        .info-card:hover .info-card-header {
            background: #f3f6fb;
        }

        .info-card-header .material-icons-outlined {
            color: #1a5fb4;
            font-size: 20px;
            transition: transform 0.3s ease;
        }
        
        .info-card:hover .info-card-header .material-icons-outlined {
            transform: scale(1.1);
        }

        .info-card-body {
            padding: 20px;
        }

        .info-row {
            margin-bottom: 16px;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        
        .info-row:hover {
            background: #f9fafb;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            font-size: 11px;
            color: #6b7280;
            font-weight: 600;
            margin-bottom: 4px;
            transition: color 0.2s ease;
        }
        
        .info-row:hover .info-label {
            color: #1a5fb4;
        }

        .info-value {
            font-size: 14px;
            font-weight: 500;
            color: #111827;
        }

        .info-badge {
            display: inline-block;
            padding: 4px 10px;
            background: #e8f0fb;
            color: #1a5fb4;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 4px;
            box-shadow: 0 1px 3px rgba(26, 95, 180, 0.1);
            transition: all 0.2s ease;
        }
        
        .info-badge:hover {
            background: #dbeafe;
            transform: scale(1.02);
            box-shadow: 0 2px 6px rgba(26, 95, 180, 0.15);
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            position: relative;
        }

        .activity-list::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 10px;
            bottom: 10px;
            width: 2px;
            background: #e5e7eb;
            z-index: 0;
        }

        /* ===== PREMIUM ACTIVITY ITEMS ===== */
        .activity-item {
            display: flex;
            gap: 16px;
            position: relative;
            z-index: 1;
            background: #f8fafc;
            padding: 16px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Interactive Activity Items */
        .activity-item:hover {
            transform: translateX(4px);
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            border-color: #d1d5db;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }
        
        .activity-item:hover .activity-icon {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .activity-icon.blue {
            background: #1a5fb4;
        }

        .activity-icon.amber {
            background: #d97706;
        }

        .activity-icon.slate {
            background: #64748b;
        }

        .activity-content {
            flex: 1;
            transition: transform 0.2s ease;
        }
        
        .activity-item:hover .activity-content {
            transform: translateX(2px);
        }

        .activity-title {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 2px;
            transition: color 0.2s ease;
        }
        
        .activity-item:hover .activity-title {
            color: #1a5fb4;
        }

        .activity-desc {
            font-size: 13px;
            color: #6b7280;
        }

        .activity-meta {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 6px;
        }

        .activity-time {
            font-size: 11px;
            color: #9ca3af;
            font-weight: 500;
        }

        .activity-status {
            font-size: 10px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 4px;
            letter-spacing: 0.5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
        }
        
        .activity-item:hover .activity-status {
            transform: scale(1.05);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .status-success {
            background: #dcfce7;
            color: #15803d;
        }

        .status-update {
            background: #e0f2fe;
            color: #0369a1;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid-profile {
                grid-template-columns: repeat(2, 1fr);
            }

            .profile-header-card {
                flex-direction: column;
                text-align: center;
            }

            .btn-edit-profile {
                margin: 16px auto 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="page-header">
        <div>
            <h1>Profil Administrator</h1>
            <p class="subtitle">Kelola informasi akun dan pantau aktivitas Anda.</p>
        </div>
    </div>

    @if(session('success'))
    <div style="background: #d1fae5; border: 1px solid #6ee7b7; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
        <span class="material-icons-outlined" style="font-size: 20px; color: #10b981;">check_circle</span>
        <span style="font-weight: 600;">{{ session('success') }}</span>
    </div>
    @endif

    <div class="profile-header-card">
        <!-- Cover Media (Image or Video) -->
        @if($admin->cover_file)
            @if($admin->cover_type === 'video')
                <video class="profile-cover-media" autoplay muted loop playsinline preload="auto">
                    <source src="{{ Storage::url($admin->cover_file) }}" type="video/mp4">
                    <source src="{{ Storage::url($admin->cover_file) }}" type="video/webm">
                </video>
            @else
                <img class="profile-cover-media" src="{{ Storage::url($admin->cover_file) }}" alt="Cover" loading="eager">
            @endif
        @endif
        
        <div class="profile-avatar-wrapper">
            @if($admin->profile_photo)
                <img src="{{ Storage::url($admin->profile_photo) }}" alt="Profile Photo" class="profile-avatar">
            @elseif($admin->avatar)
                <img src="{{ Storage::url($admin->avatar) }}" alt="Avatar" class="profile-avatar">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($admin->nama_lengkap ?? 'Admin') }}&background=0D8ABC&color=fff&size=128" alt="Avatar" class="profile-avatar">
            @endif
            <div class="profile-avatar-icon">
                <span class="material-icons-outlined" style="font-size: 16px;">verified</span>
            </div>
        </div>
        <div class="profile-info">
            <h2>{{ $admin->nama_lengkap ?? 'Admin Utama' }}</h2>
            <p><span class="material-icons-outlined" style="font-size: 16px;">admin_panel_settings</span> System
                Administrator</p>
        </div>
        <a href="{{ route('admin.profil.edit') }}" class="btn-edit-profile" style="text-decoration: none;">
            <span class="material-icons-outlined" style="font-size: 18px;">edit</span>
            Edit Profil
        </a>
    </div>

    <div class="stats-grid-profile">
        <div class="stat-box">
            <div class="stat-box-icon"><span class="material-icons-outlined">verified_user</span></div>
            <div class="stat-box-title">Total Verifikasi</div>
            <div class="stat-box-value">{{ number_format($totalVerifikasi) }}</div>
            <div class="stat-box-trend"><span class="material-icons-outlined" style="font-size:14px;">trending_up</span>
                +12% dari bulan lalu</div>
        </div>
        <div class="stat-box">
            <div class="stat-box-icon" style="color:#d97706; background:#fef3c7;"><span
                    class="material-icons-outlined">domain</span></div>
            <div class="stat-box-title">Total Perusahaan</div>
            <div class="stat-box-value">{{ number_format($totalPerusahaan) }}</div>
            <div class="stat-box-trend" style="color:#d97706;"><span class="material-icons-outlined"
                    style="font-size:14px;">fiber_new</span> 5 Baru diverifikasi</div>
        </div>
        <div class="stat-box">
            <div class="stat-box-icon" style="color:#7c3aed; background:#ede9fe;"><span
                    class="material-icons-outlined">school</span></div>
            <div class="stat-box-title">Total Mahasiswa</div>
            <div class="stat-box-value">{{ number_format($totalMahasiswa) }}</div>
            <div class="stat-box-trend" style="color:#7c3aed;"><span class="material-icons-outlined"
                    style="font-size:14px;">sync</span> Angkatan 2024 Terintegrasi</div>
        </div>
        <div class="stat-box">
            <div class="stat-box-icon" style="color:#dc2626; background:#fee2e2;"><span
                    class="material-icons-outlined">pending_actions</span></div>
            <div class="stat-box-title">Pending Review</div>
            <div class="stat-box-value">{{ number_format($pendingReview) }}</div>
            <div class="stat-box-trend" style="color:#dc2626;"><span class="material-icons-outlined"
                    style="font-size:14px;">warning</span> Segera selesaikan</div>
        </div>
    </div>

    <div class="content-grid">
        <div class="left-col">
            <div class="info-card">
                <div class="info-card-header">
                    <span class="material-icons-outlined">badge</span>
                    Informasi Akun
                </div>
                <div class="info-card-body">
                    <div class="info-row">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">{{ $admin->nama_lengkap ?? 'Admin Utama' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Email Institusi</div>
                        <div class="info-value">{{ $admin->email ?? 'admin.utama@simakata.ac.id' }}</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Role Utama</div>
                        <div class="info-badge">System Administrator</div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">ID Administrator</div>
                        <div class="info-value"
                            style="background:#f3f4f6; padding:6px 10px; border-radius:6px; display:inline-block; font-family:monospace; margin-top:4px;">
                            {{ $admin->nim ?? 'ADM-2024-001' }}</div>
                    </div>
                </div>
            </div>

            <div class="info-card">
                <div class="info-card-header">
                    <span class="material-icons-outlined">security</span>
                    Keamanan Akun
                </div>
                <div class="info-card-body">
                    <div
                        style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #f3f4f6; padding-bottom:12px; margin-bottom:12px;">
                        <div>
                            <div style="font-weight:600; font-size:13px;">Ubah Password</div>
                            <div style="font-size:11px; color:#6b7280;">Update password secara berkala</div>
                        </div>
                        <a href="{{ route('admin.profil.edit') }}" style="color:#9ca3af; text-decoration:none;"><span class="material-icons-outlined">chevron_right</span></a>
                    </div>
                    <div
                        style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #f3f4f6; padding-bottom:12px; margin-bottom:12px;">
                        <div>
                            <div style="font-weight:600; font-size:13px;">Terakhir Login</div>
                            <div style="font-size:11px; color:#1a5fb4; font-weight:600;">
                                {{ $admin->last_login_at ? $admin->last_login_at->diffForHumans() : '2 Jam yang lalu' }}
                            </div>
                        </div>
                        <span class="material-icons-outlined" style="color:#9ca3af;">history</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <div style="font-weight:600; font-size:13px;">Status Akun</div>
                            <div
                                style="font-size:11px; color:#10b981; font-weight:600; display:flex; align-items:center; gap:4px;">
                                <span
                                    style="width:6px; height:6px; background:#10b981; border-radius:50%; display:inline-block;"></span>
                                Aktif
                            </div>
                        </div>
                        <span class="material-icons-outlined" style="color:#10b981;">check_circle</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-col">
            <div class="info-card">
                <div class="info-card-header" style="justify-content:space-between;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <span class="material-icons-outlined">history</span>
                        Riwayat Aktivitas Terbaru
                    </div>
                    <a href="#" style="font-size:12px; color:#1a5fb4; font-weight:600; text-decoration:none;">Lihat
                        Semua</a>
                </div>
                <div class="info-card-body">
                    <div class="activity-list">
                        @foreach($aktivitasTerbaru as $aktivitas)
                            <div class="activity-item">
                                <div class="activity-icon {{ $aktivitas['color'] }}">
                                    <span class="material-icons-outlined"
                                        style="font-size:20px;">{{ $aktivitas['icon'] }}</span>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">{{ $aktivitas['judul'] }}</div>
                                    <div class="activity-desc">{{ $aktivitas['deskripsi'] }}</div>
                                </div>
                                <div class="activity-meta">
                                    <div class="activity-time">{{ $aktivitas['waktu'] }}</div>
                                    @if($aktivitas['status'])
                                        <div
                                            class="activity-status {{ $aktivitas['status'] === 'BERHASIL' || $aktivitas['status'] === 'DITERIMA' ? 'status-success' : 'status-update' }}">
                                            {{ $aktivitas['status'] }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
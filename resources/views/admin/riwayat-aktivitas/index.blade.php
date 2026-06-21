@extends('layouts.admin')

@section('title', 'Riwayat Aktivitas Admin')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Riwayat Aktivitas Admin</h1>
        <p class="page-subtitle">Pantau semua tindakan yang dilakukan oleh admin sistem</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="stats-row mb-4">
    <div class="stat-card">
        <div class="stat-icon" style="background: #e8f2ff; color: #1a5fb4;">
            <span class="material-icons-outlined">receipt_long</span>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['total'] }}</h3>
            <p>Total Aktivitas</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background: #d1fae5; color: #059669;">
            <span class="material-icons-outlined">verified</span>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['verifikasi'] }}</h3>
            <p>Verifikasi</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
            <span class="material-icons-outlined">business</span>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['perusahaan'] }}</h3>
            <p>Kelola Perusahaan</p>
        </div>
    </div>
</div>

<!-- Timeline Card -->
<div class="card timeline-card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3 class="card-title">
            <span class="material-icons-outlined" style="vertical-align: middle;">timeline</span>
            Timeline Aktivitas
        </h3>
        <form method="GET" action="{{ route('admin.riwayat-aktivitas') }}">
            <select name="action" class="form-select" onchange="this.form.submit()" style="width: auto;">
                <option value="Semua Aktivitas" {{ $filterAction === 'Semua Aktivitas' ? 'selected' : '' }}>Semua Aktivitas</option>
                <option value="Verifikasi" {{ $filterAction === 'Verifikasi' ? 'selected' : '' }}>Verifikasi</option>
                <option value="Perusahaan" {{ $filterAction === 'Perusahaan' ? 'selected' : '' }}>Kelola Perusahaan</option>
            </select>
        </form>
    </div>

    <div class="card-body">
        @if($riwayatAktivitas->isEmpty())
            <div class="empty-state text-center py-5">
                <span class="material-icons-outlined" style="font-size: 64px; color: #cbd5e0; opacity: 0.5;">inbox</span>
                <h4 class="mt-3" style="color: #64748b;">Belum Ada Aktivitas</h4>
                <p style="color: #94a3b8;">Aktivitas admin akan tercatat di sini</p>
            </div>
        @else
            <div class="timeline-section">
                @php
                    $grouped = $riwayatAktivitas->groupBy(function($item) {
                        $date = \Carbon\Carbon::parse($item->created_at);
                        if ($date->isToday()) {
                            return 'Hari Ini';
                        } elseif ($date->isYesterday()) {
                            return 'Kemarin';
                        } else {
                            return $date->format('d M Y');
                        }
                    });
                @endphp

                @foreach($grouped as $dateLabel => $items)
                    <div class="timeline-date">• {{ $dateLabel }}</div>
                    
                    @foreach($items as $log)
                        @php
                            $iconClass = 'td-blue';
                            $icon = 'info';
                            
                            if (str_contains($log->action, 'approve')) {
                                $iconClass = 'td-green';
                                $icon = 'check_circle';
                            } elseif (str_contains($log->action, 'reject')) {
                                $iconClass = 'td-red';
                                $icon = 'cancel';
                            } elseif (str_contains($log->action, 'create')) {
                                $iconClass = 'td-blue';
                                $icon = 'add_circle';
                            } elseif (str_contains($log->action, 'update')) {
                                $iconClass = 'td-amber';
                                $icon = 'edit';
                            } elseif (str_contains($log->action, 'delete')) {
                                $iconClass = 'td-red';
                                $icon = 'delete';
                            }
                        @endphp
                        
                        <div class="timeline-item">
                            <div class="timeline-dot {{ $iconClass }}">
                                <span class="material-icons-outlined">{{ $icon }}</span>
                            </div>
                            <div class="timeline-content">
                                <h4>{{ $log->description }}</h4>
                                <p style="font-size: 12px; color: #64748b;">
                                    Oleh: {{ $log->admin->nama_lengkap ?? 'Admin' }}
                                </p>
                                <div class="timeline-meta">
                                    @php
                                        $actionLabel = match($log->action) {
                                            'approve_kp' => 'Approve KP',
                                            'reject_kp' => 'Reject KP',
                                            'approve_ta' => 'Approve TA',
                                            'reject_ta' => 'Reject TA',
                                            'create_perusahaan' => 'Tambah Perusahaan',
                                            'update_perusahaan' => 'Update Perusahaan',
                                            'delete_perusahaan' => 'Hapus Perusahaan',
                                            default => $log->action
                                        };
                                        
                                        $badgeClass = 'badge-blue';
                                        if (str_contains($log->action, 'approve')) {
                                            $badgeClass = 'badge-green';
                                        } elseif (str_contains($log->action, 'reject') || str_contains($log->action, 'delete')) {
                                            $badgeClass = 'badge-red';
                                        } elseif (str_contains($log->action, 'update')) {
                                            $badgeClass = 'badge-amber';
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $actionLabel }}</span>
                                    <span class="timeline-time">{{ \Carbon\Carbon::parse($log->created_at)->format('H:i') }} WIB</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $riwayatAktivitas->links() }}
            </div>
        @endif
    </div>
</div>

<style>
.stats-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}
.stat-card {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    padding: 20px 24px;
    display: flex;
    align-items: center;
    gap: 16px;
    /* Premium Enhancement */
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

/* Accent Line */
.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, currentColor, transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

/* Premium Hover Effect */
.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1), 0 2px 6px rgba(0, 0, 0, 0.06);
    border-color: #d1d5db;
}

.stat-card:hover::before {
    opacity: 1;
}

/* Set accent color per card */
.stat-card:nth-child(1)::before { color: #1a5fb4; }
.stat-card:nth-child(2)::before { color: #059669; }
.stat-card:nth-child(3)::before { color: #d97706; }
.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

/* Icon Animation on Hover */
.stat-card:hover .stat-icon {
    transform: scale(1.1);
}

.stat-icon .material-icons-outlined {
    font-size: 24px;
}
.stat-info h3 {
    font-size: 24px;
    font-weight: 700;
    color: #111827;
    margin: 0;
    transition: all 0.3s ease;
}

/* Number Emphasis on Hover */
.stat-card:hover .stat-info h3 {
    transform: scale(1.02);
    transform-origin: left;
}

.stat-info p {
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    color: #9ca3af;
    margin: 2px 0 0 0;
    transition: color 0.3s ease;
}

.stat-card:hover .stat-info p {
    color: #1a5fb4;
}
.timeline-section {
    padding: 20px 0;
}
.timeline-date {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #9ca3af;
    margin-bottom: 16px;
    margin-top: 24px;
}
.timeline-date:first-child {
    margin-top: 0;
}
.timeline-item {
    display: flex;
    gap: 16px;
    padding-bottom: 24px;
    border-left: 2px solid #e5e7eb;
    margin-left: 19px;
    position: relative;
}
.timeline-item:last-child {
    border-left-color: transparent;
}
.timeline-dot {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: absolute;
    left: -20px;
    border: 3px solid #fff;
}
.timeline-dot .material-icons-outlined {
    font-size: 20px;
}
.td-blue { background: #e8f2ff; color: #1a5fb4; }
.td-green { background: #d1fae5; color: #059669; }
.td-amber { background: #fef3c7; color: #d97706; }
.td-red { background: #fee2e2; color: #dc2626; }
.timeline-content {
    flex: 1;
    padding-left: 36px;
}
.timeline-content h4 {
    font-size: 14px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 4px 0;
}
.timeline-content p {
    font-size: 13px;
    color: #6b7280;
    line-height: 1.6;
    margin: 0;
}
.timeline-meta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 8px;
}
.badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.badge-blue { background: #e8f2ff; color: #1a5fb4; }
.badge-green { background: #d1fae5; color: #059669; }
.badge-amber { background: #fef3c7; color: #d97706; }
.badge-red { background: #fee2e2; color: #dc2626; }
.timeline-time {
    font-size: 11px;
    font-weight: 600;
    color: #9ca3af;
}

/* Premium Timeline Card Hover */
.timeline-card {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.timeline-card:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08), 0 2px 4px rgba(0, 0, 0, 0.04);
    border-color: #d1d5db;
}

/* Timeline Item Hover Effect */
.timeline-item {
    transition: all 0.2s ease;
    padding-left: 4px;
}

.timeline-item:hover {
    background: #f9fafb;
    border-radius: 8px;
    padding-left: 8px;
}
</style>
@endsection

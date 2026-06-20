@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('extra_styles')
<style>
    /* ===== STATS CARDS ===== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 24px;
    }
    .stat-card {
        padding: 22px 24px;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        animation: fade-up 0.4s ease both;
    }
    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.10);
    }
    .stat-card:nth-child(1) { animation-delay: 0.05s; }
    .stat-card:nth-child(2) { animation-delay: 0.10s; }
    .stat-card:nth-child(3) { animation-delay: 0.15s; }

    @keyframes fade-up {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .stat-info .stat-label {
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        color: #6b7280;
        margin-bottom: 6px;
    }
    .stat-info .stat-value {
        font-size: 32px;
        font-weight: 700;
        color: #111827;
        line-height: 1;
        margin-bottom: 8px;
    }
    .stat-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 99px;
    }
    .stat-badge.green { background: #dcfce7; color: #15803d; }
    .stat-badge.blue  { background: #dbeafe; color: #1d4ed8; }
    .stat-badge.red   { background: #fee2e2; color: #dc2626; }
    .stat-badge .material-icons-outlined { font-size: 13px; }

    .stat-icon-wrap {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .stat-icon-wrap .material-icons-outlined { font-size: 24px; }
    .stat-icon-wrap.blue   { background: #eff6ff; color: #1a5fb4; }
    .stat-icon-wrap.teal   { background: #f0fdf4; color: #15803d; }
    .stat-icon-wrap.orange { background: #fff7ed; color: #ea580c; }

    /* ===== MIDDLE ROW: Chart ===== */
    .mid-row {
        display: grid;
        grid-template-columns: 1fr;
        gap: 18px;
        margin-bottom: 24px;
    }

    /* Chart Card */
    .chart-card { padding: 22px 24px; animation: fade-up 0.5s ease 0.2s both; }
    .chart-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }
    .chart-header h2 { font-size: 16px; font-weight: 700; color: #111827; }
    .chart-filter {
        display: flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 5px 12px;
        font-size: 12px;
        font-weight: 600;
        color: #374151;
        cursor: pointer;
        background: #fff;
        transition: border-color 0.2s;
        user-select: none;
    }
    .chart-filter .material-icons-outlined { font-size: 16px; }
    .chart-filter:hover { border-color: #1a5fb4; color: #1a5fb4; }

    /* Bar chart */
    .chart-slider { overflow: hidden; position: relative; }
    .chart-slide { display: none; }
    .chart-slide.active { display: block; }
    .chart-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: #d1d5db;
        cursor: pointer;
        transition: background 0.2s;
    }
    .chart-dot.active { background: #1a5fb4; }
    .bar-chart-area {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        height: 160px;
    }
    .bar-group {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        height: 100%;
        justify-content: flex-end;
    }
    .bar-wrap {
        width: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        flex: 1;
        position: relative;
    }
    .bar {
        width: 100%;
        border-radius: 6px 6px 0 0;
        background: #bfdbfe;
        transition: background 0.2s, transform 0.2s;
        cursor: pointer;
        position: relative;
        min-height: 8px;
    }
    .bar:hover { background: #93c5fd; transform: scaleY(1.04); transform-origin: bottom; }
    .bar.active { background: #1a5fb4; }
    .bar.active:hover { background: #1e40af; }

    /* Tooltip */
    .bar::after {
        content: attr(data-value);
        position: absolute;
        bottom: calc(100% + 6px);
        left: 50%;
        transform: translateX(-50%);
        background: #111827;
        color: #fff;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.15s;
    }
    .bar:hover::after { opacity: 1; }

    .bar-label {
        font-size: 10px;
        font-weight: 600;
        color: #9ca3af;
        text-align: center;
        letter-spacing: 0.5px;
    }
    .bar-label.active-label { color: #1a5fb4; }

    /* ===== PENDING TABLE CARD ===== */
    .table-card { animation: fade-up 0.5s ease 0.3s both; }
    .table-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 24px 16px;
        border-bottom: 1px solid #f3f4f6;
        gap: 12px;
        flex-wrap: wrap;
    }
    .table-card-header h2 { font-size: 16px; font-weight: 700; color: #111827; }
    .table-search {
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 7px 14px;
        background: #fff;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .table-search:focus-within {
        border-color: #1a5fb4;
        box-shadow: 0 0 0 3px rgba(26,95,180,0.08);
    }
    .table-search input {
        border: none;
        outline: none;
        font-size: 13px;
        font-family: inherit;
        color: #374151;
        width: 180px;
        background: transparent;
    }
    .table-search input::placeholder { color: #9ca3af; }
    .table-search .material-icons-outlined { font-size: 18px; color: #9ca3af; }
    .table-filter-btn {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        border: 1px solid #e5e7eb;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #6b7280;
        transition: border-color 0.2s, color 0.2s;
    }
    .table-filter-btn:hover { border-color: #1a5fb4; color: #1a5fb4; }
    .table-filter-btn .material-icons-outlined { font-size: 18px; }

    .header-right { display: flex; align-items: center; gap: 10px; }

    /* Table */
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table thead tr {
        border-bottom: 1px solid #f3f4f6;
    }
    .data-table th {
        padding: 10px 24px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        color: #9ca3af;
        text-align: left;
        white-space: nowrap;
    }
    .data-table td {
        padding: 14px 24px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f9fafb;
        vertical-align: middle;
    }
    .data-table tbody tr { transition: background 0.15s; }
    .data-table tbody tr:hover { background: #f9fafb; }
    .data-table tbody tr:last-child td { border-bottom: none; }

    /* Entity avatar chip */
    .entity-cell { display: flex; align-items: center; gap: 12px; }
    .entity-avatar {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
        flex-shrink: 0;
    }
    .entity-avatar.blue   { background: #dbeafe; color: #1d4ed8; }
    .entity-avatar.teal   { background: #d1fae5; color: #065f46; }
    .entity-avatar.purple { background: #ede9fe; color: #6d28d9; }
    .entity-avatar.orange { background: #ffedd5; color: #c2410c; }
    .entity-name { font-size: 13px; font-weight: 600; color: #111827; }

    /* Status badge */
    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .status-badge.awaiting  { background: #fef3c7; color: #92400e; }
    .status-badge.approved  { background: #dcfce7; color: #15803d; }
    .status-badge.rejected  { background: #fee2e2; color: #b91c1c; }

    /* Table footer */
    .table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 24px;
        border-top: 1px solid #f3f4f6;
        flex-wrap: wrap;
        gap: 12px;
    }
    .table-info { font-size: 12px; color: #6b7280; }
    .table-info strong { color: #111827; }
    .pagination {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .btn-page {
        padding: 6px 16px;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        background: #fff;
        font-size: 12px;
        font-weight: 600;
        font-family: inherit;
        color: #374151;
        cursor: pointer;
        transition: all 0.18s;
    }
    .btn-page:hover:not(:disabled) { border-color: #1a5fb4; color: #1a5fb4; }
    .btn-page:disabled { opacity: 0.4; cursor: not-allowed; }
    .btn-page.primary {
        background: #1a5fb4;
        border-color: #1a5fb4;
        color: #fff;
    }
    .btn-page.primary:hover { background: #1e40af; border-color: #1e40af; }

    /* Export button */
    .btn-export {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        border-radius: 10px;
        border: 1.5px solid #1a5fb4;
        background: #fff;
        color: #1a5fb4;
        font-size: 13px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s;
    }
    .btn-export:hover {
        background: #1a5fb4;
        color: #fff;
    }
    .btn-export .material-icons-outlined { font-size: 18px; }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 48px 24px;
        color: #9ca3af;
    }
    .empty-state .material-icons-outlined { font-size: 40px; margin-bottom: 12px; display: block; }
    .empty-state p { font-size: 13px; }

    @media (max-width: 900px) {
        .stats-grid { grid-template-columns: 1fr 1fr; }
        .mid-row { grid-template-columns: 1fr; }
    }
    @media (max-width: 600px) {
        .stats-grid { grid-template-columns: 1fr; }
        .table-search input { width: 120px; }
        .table-footer { flex-direction: column; align-items: flex-start; }
    }
</style>
@endsection

@section('content')
{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1>Dashboard Overview</h1>
        <p class="subtitle">Welcome back, Administrator. Here's what's happening today.</p>
    </div>
    <a href="{{ route('admin.dashboard.export') }}" class="btn-export" id="btn-export-pdf">
        <span class="material-icons-outlined">file_download</span>
        Export Report
    </a>
</div>

{{-- ===== STATS CARDS ===== --}}
<div class="stats-grid">
    {{-- Total Perusahaan --}}
    <div class="card stat-card">
        <div class="stat-info">
            <div class="stat-label">Total Companies</div>
            <div class="stat-value">{{ $totalPerusahaan }}</div>
            <span class="stat-badge green">
                <span class="material-icons-outlined">trending_up</span>
                +12% this month
            </span>
        </div>
        <div class="stat-icon-wrap blue">
            <span class="material-icons-outlined">corporate_fare</span>
        </div>
    </div>

    {{-- Total Students --}}
    <div class="card stat-card">
        <div class="stat-info">
            <div class="stat-label">Total Students</div>
            <div class="stat-value">{{ $totalUserAktif }}</div>
            <span class="stat-badge blue">
                <span class="material-icons-outlined">trending_up</span>
                +5.2% this year
            </span>
        </div>
        <div class="stat-icon-wrap teal">
            <span class="material-icons-outlined">groups</span>
        </div>
    </div>

    {{-- Pending Verifications --}}
    <div class="card stat-card">
        <div class="stat-info">
            <div class="stat-label">Pending Verifications</div>
            <div class="stat-value" style="color: #dc2626;">{{ $menungguVerifikasi }}</div>
            <span class="stat-badge red">
                <span class="material-icons-outlined">schedule</span>
                Needs immediate attention
            </span>
        </div>
        <div class="stat-icon-wrap orange">
            <span class="material-icons-outlined">verified_user</span>
        </div>
    </div>
</div>

{{-- ===== MIDDLE ROW: Charts ===== --}}
<div class="mid-row">
    {{-- Sebaran Bar Charts (auto-slide) --}}
    <div class="card chart-card">
        <div class="chart-header">
            <h2 id="chart-title">Sebaran Tempat Kerja Praktik</h2>
        </div>
        <div class="chart-slider" id="chartSlider">
            {{-- Slide 1: KP --}}
            <div class="chart-slide active" id="slide-kp">
                @php $sebaranKPArr = $sebaranKP ?? []; $maxKP = $sebaranKPArr ? max(array_values($sebaranKPArr)) : 1; @endphp
                <div class="bar-chart-area">
                    @forelse($sebaranKPArr as $nama => $jumlah)
                        @php $pct = $maxKP > 0 ? round(($jumlah/$maxKP)*100) : 10; @endphp
                        <div class="bar-group">
                            <div class="bar-wrap">
                                <div class="bar active" style="height:{{ max($pct,6) }}%" data-value="{{ $jumlah }} mahasiswa"></div>
                            </div>
                            <span class="bar-label" title="{{ $nama }}">{{ Str::limit($nama,10,'') }}</span>
                        </div>
                    @empty
                        <div style="color:#9ca3af;font-size:13px;margin:auto;">Belum ada data KP.</div>
                    @endforelse
                </div>
            </div>
            {{-- Slide 2: Magang --}}
            <div class="chart-slide" id="slide-magang">
                @php $sebaranMagangArr = $sebaranMagang ?? []; $maxMag = $sebaranMagangArr ? max(array_values($sebaranMagangArr)) : 1; @endphp
                <div class="bar-chart-area">
                    @forelse($sebaranMagangArr as $nama => $jumlah)
                        @php $pct2 = $maxMag > 0 ? round(($jumlah/$maxMag)*100) : 10; @endphp
                        <div class="bar-group">
                            <div class="bar-wrap">
                                <div class="bar" style="height:{{ max($pct2,6) }}%;background:#10b981;" data-value="{{ $jumlah }} mahasiswa"></div>
                            </div>
                            <span class="bar-label" title="{{ $nama }}">{{ Str::limit($nama,10,'') }}</span>
                        </div>
                    @empty
                        <div style="color:#9ca3af;font-size:13px;margin:auto;">Belum ada data Magang.</div>
                    @endforelse
                </div>
            </div>
        </div>
        {{-- Dots --}}
        <div style="display:flex;gap:6px;justify-content:center;margin-top:14px;">
            <span class="chart-dot active" id="dot-kp" onclick="showSlide('kp')"></span>
            <span class="chart-dot" id="dot-magang" onclick="showSlide('magang')"></span>
        </div>
    </div>
</div>

{{-- ===== PENDING VERIFICATIONS TABLE ===== --}}
<div class="card table-card">
    <div class="table-card-header">
        <h2>Pending Verifications</h2>
        <div class="header-right">
            <div class="table-search">
                <span class="material-icons-outlined">search</span>
                <input type="text" id="searchInput" placeholder="Search entries..." aria-label="Search entries">
            </div>
            <button class="table-filter-btn" title="Filter" id="btnFilter">
                <span class="material-icons-outlined">tune</span>
            </button>
        </div>
    </div>

    <table class="data-table" id="pendingTable">
        <thead>
            <tr>
                <th>Entity Name</th>
                <th>Category</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @forelse($pendingMahasiswa as $item)
                <tr>
                    <td>
                        <div class="entity-cell">
                            @php
                                $initials = strtoupper(substr($item->nim ?? 'U', 0, 2));
                                $colors = ['blue','teal','purple','orange'];
                                $color = $colors[$loop->index % count($colors)];
                            @endphp
                            <div class="entity-avatar {{ $color }}">{{ $initials }}</div>
                            <div class="entity-name">
                                {{ $item->nim ?? 'Unknown' }} (Student)
                            </div>
                        </div>
                    </td>
                    <td>{{ $item->kegiatan }}</td>
                    <td>
                        {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('M d, Y') : '-' }}
                    </td>
                    <td>
                        @if($item->status === 'pending')
                            <span class="status-badge awaiting">Awaiting Review</span>
                        @elseif($item->status === 'approved')
                            <span class="status-badge approved">Approved</span>
                        @else
                            <span class="status-badge rejected">Rejected</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn-page" title="Review" style="font-size:11px; padding:5px 12px;">
                            Review
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <span class="material-icons-outlined">check_circle</span>
                            <p>Tidak ada pending verification saat ini.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="table-footer">
        <div class="table-info">
            Showing <strong>{{ $pendingMahasiswa->count() }}</strong> of
            <strong>{{ $menungguVerifikasi }}</strong> pending requests
        </div>
        <div class="pagination">
            <button class="btn-page" id="btnPrev" disabled>Previous</button>
            <button class="btn-page primary" id="btnNext"
                {{ $pendingMahasiswa->count() >= $menungguVerifikasi ? 'disabled' : '' }}>
                Next
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // ===== Live Search =====
    const searchInput = document.getElementById('searchInput');
    const tableBody   = document.getElementById('tableBody');

    if (searchInput && tableBody) {
        searchInput.addEventListener('input', function () {
            const q = this.value.toLowerCase().trim();
            tableBody.querySelectorAll('tr').forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = (!q || text.includes(q)) ? '' : 'none';
            });
        });
    }

    // ===== Chart Autoplay =====
    const slides = ['kp', 'magang'];
    const titles = { kp: 'Sebaran Tempat Kerja Praktik', magang: 'Sebaran Tempat Magang' };
    let currentSlide = 0;
    let autoplayTimer = null;

    function showSlide(name) {
        slides.forEach(s => {
            const el = document.getElementById('slide-' + s);
            const dot = document.getElementById('dot-' + s);
            if (el) el.classList.toggle('active', s === name);
            if (dot) dot.classList.toggle('active', s === name);
        });
        const title = document.getElementById('chart-title');
        if (title) title.textContent = titles[name] || '';
        currentSlide = slides.indexOf(name);
    }

    function startAutoplay() {
        autoplayTimer = setInterval(() => {
            const next = slides[(currentSlide + 1) % slides.length];
            showSlide(next);
        }, 4000);
    }

    function stopAutoplay() { clearInterval(autoplayTimer); }

    const chartCard = document.querySelector('.chart-card');
    if (chartCard) {
        chartCard.addEventListener('mouseenter', stopAutoplay);
        chartCard.addEventListener('mouseleave', startAutoplay);
    }
    startAutoplay();
</script>
@endsection

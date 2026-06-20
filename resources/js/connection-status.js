/**
 * SIMAKATA — Real-time Connection Status Indicator
 *
 * Menampilkan indikator visual status koneksi WebSocket di pojok
 * kanan bawah halaman. Klik untuk toggle visibilitas.
 */

/**
 * Inisialisasi indikator status koneksi WebSocket.
 * Dipanggil dari app.js setelah DOM ready.
 */
export function initConnectionStatus() {
    if (!window.Echo || !window.Echo.connector) {
        console.warn('[SIMAKATA Realtime] Echo belum diinisialisasi, melewati status indicator.');
        return;
    }

    const indicator = _createIndicator();

    const pusher = window.Echo.connector.pusher;

    // Status awal
    _updateStatus(indicator, pusher.connection.state === 'connected');

    // Pantau perubahan state
    pusher.connection.bind('state_change', ({ current }) => {
        console.log('[WS] State →', current);
        _updateStatus(indicator, current === 'connected');
    });

    pusher.connection.bind('connected', () => {
        console.log('[WS] ✅ Terhubung ke Reverb');
        _updateStatus(indicator, true);
    });

    pusher.connection.bind('disconnected', () => {
        console.log('[WS] ❌ Koneksi terputus');
        _updateStatus(indicator, false);
    });

    pusher.connection.bind('unavailable', () => {
        console.log('[WS] ⚠ Reverb server tidak tersedia');
        _updateStatus(indicator, false);
    });

    pusher.connection.bind('failed', () => {
        console.log('[WS] ✕ Koneksi gagal');
        _updateStatus(indicator, false);
    });

    // Auto-redup setelah 6 detik jika sudah terhubung
    setTimeout(() => {
        if (pusher.connection.state === 'connected') {
            indicator.style.opacity = '0.25';
        }
    }, 6000);
}

// ─────────────────────────────────────────
// Private helpers
// ─────────────────────────────────────────

function _createIndicator() {
    const existing = document.getElementById('realtime-status');
    if (existing) existing.remove();

    const indicator = document.createElement('div');
    indicator.id = 'realtime-status';
    indicator.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
        z-index: 99998;
        display: flex;
        align-items: center;
        gap: 7px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        transition: opacity 0.4s ease, background 0.4s ease;
        cursor: pointer;
        user-select: none;
        letter-spacing: 0.3px;
    `;

    const dot = document.createElement('span');
    dot.id = 'realtime-dot';
    dot.style.cssText = `
        width: 7px;
        height: 7px;
        border-radius: 50%;
        display: inline-block;
        flex-shrink: 0;
    `;

    const label = document.createElement('span');
    label.id = 'realtime-label';

    indicator.appendChild(dot);
    indicator.appendChild(label);
    document.body.appendChild(indicator);

    // Klik untuk toggle opacity
    let dimmed = false;
    indicator.addEventListener('click', () => {
        dimmed = !dimmed;
        indicator.style.opacity = dimmed ? '0.15' : '1';
    });

    return indicator;
}

function _updateStatus(indicator, connected) {
    const dot   = document.getElementById('realtime-dot');
    const label = document.getElementById('realtime-label');

    if (!dot || !label) return;

    if (connected) {
        indicator.style.background = 'rgba(16,185,129,0.92)';
        indicator.style.color      = '#fff';
        dot.style.background       = 'rgba(255,255,255,0.9)';
        dot.style.boxShadow        = '0 0 0 3px rgba(255,255,255,0.3)';
        label.textContent          = 'Real-time Aktif';
        indicator.title            = 'WebSocket terhubung ke Reverb (ws://localhost:8080)';
    } else {
        indicator.style.background = 'rgba(100,116,139,0.88)';
        indicator.style.color      = '#fff';
        dot.style.background       = 'rgba(255,255,255,0.7)';
        dot.style.boxShadow        = 'none';
        label.textContent          = 'Real-time Offline';
        indicator.title            = 'Real-time tidak aktif. Jalankan: php artisan reverb:start';
    }
}

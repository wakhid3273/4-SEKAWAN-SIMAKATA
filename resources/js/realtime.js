/**
 * ============================================================
 * SIMAKATA — Real-time Data Synchronization Service
 * ============================================================
 *
 * Mengelola sinkronisasi data real-time untuk seluruh aplikasi
 * menggunakan Laravel Echo + Laravel Reverb (WebSocket).
 *
 * Channel yang didengarkan:
 *   • perusahaan      → CRUD data perusahaan mitra
 *   • mahasiswa-magang → CRUD pengajuan KP/Magang
 *   • final-project   → CRUD & status Tugas Akhir
 *   • mahasiswa-data  → CRUD data mahasiswa
 *
 * Setiap perubahan langsung di-update di DOM tanpa page reload.
 * Page reload hanya sebagai fallback terakhir jika elemen DOM
 * tidak ditemukan dan halaman yang relevan sedang aktif.
 * ============================================================
 */

// ============================================================
// ENTRY POINT
// ============================================================

export function initializeRealtime() {
    if (!window.Echo) {
        console.warn('[SIMAKATA Realtime] Laravel Echo belum tersedia.');
        return;
    }

    _subscribePerusahaan();
    _subscribeMahasiswaMagang();
    _subscribeFinalProject();
    _subscribeMahasiswaData();

    console.log('[SIMAKATA Realtime] ✅ Semua channel aktif.');
}

// ============================================================
// CHANNEL: perusahaan
// ============================================================

function _subscribePerusahaan() {
    window.Echo.channel('perusahaan')
        .listen('.perusahaan.created', (e) => {
            console.log('[RT] Perusahaan Created:', e);
            _handlePerusahaanCreated(e);
        })
        .listen('.perusahaan.updated', (e) => {
            console.log('[RT] Perusahaan Updated:', e);
            _handlePerusahaanUpdated(e);
        })
        .listen('.perusahaan.deleted', (e) => {
            console.log('[RT] Perusahaan Deleted:', e);
            _handlePerusahaanDeleted(e);
        });
}

function _handlePerusahaanCreated(data) {
    const grid = document.querySelector('.companies-grid');

    if (grid) {
        // Tambahkan card baru ke grid
        const cardHtml = _buildPerusahaanCardHtml(data);
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = cardHtml;
        const newCard = tempDiv.firstElementChild;

        // Animasi masuk
        newCard.style.opacity = '0';
        newCard.style.transform = 'scale(0.95)';
        grid.prepend(newCard);

        requestAnimationFrame(() => {
            newCard.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            newCard.style.opacity = '1';
            newCard.style.transform = 'scale(1)';
        });

        showNotification('Perusahaan baru ditambahkan: ' + data.nama, 'success');
    } else if (_isOnPage(['/perusahaan', '/admin/perusahaan'])) {
        // Halaman relevan tapi struktur DOM tidak ditemukan, fallback reload
        showNotification('Perusahaan baru ditambahkan', 'success');
        _softReload(1800);
    }
}

function _handlePerusahaanUpdated(data) {
    // Cari card berdasarkan data-perusahaan-id atau data-id
    const card = document.querySelector(`[data-perusahaan-id="${data.id}"], [data-id="${data.id}"]`);

    if (card) {
        _updatePerusahaanCard(card, data);
        showNotification('Data perusahaan diperbarui: ' + data.nama, 'info');
    } else if (_isOnPage(['/perusahaan', '/admin/perusahaan'])) {
        _softReload(1200);
    }
}

function _handlePerusahaanDeleted(data) {
    const card = document.querySelector(`[data-perusahaan-id="${data.id}"], [data-id="${data.id}"]`);

    if (card) {
        card.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
        card.style.opacity = '0';
        card.style.transform = 'scale(0.95)';
        setTimeout(() => {
            card.remove();
            showNotification('Perusahaan telah dihapus', 'warning');
        }, 380);
    } else if (_isOnPage(['/perusahaan', '/admin/perusahaan'])) {
        _softReload(1200);
    }
}

function _updatePerusahaanCard(card, data) {
    const set = (sel, val) => {
        const el = card.querySelector(sel);
        if (el) el.textContent = val;
    };

    // Update teks
    set('.company-name, .perusahaan-nama', data.nama);
    set('.perusahaan-tentang, .company-description', data.tentang ?? 'Tidak ada deskripsi.');
    set('.perusahaan-jumlah', data.jumlah_mahasiswa ?? '');

    // Update lokasi (perlu preserve icon)
    const lokasiEl = card.querySelector('.company-location, .perusahaan-lokasi');
    if (lokasiEl) {
        const icon = lokasiEl.querySelector('.material-icons-outlined');
        lokasiEl.textContent = data.lokasi ?? 'Lokasi tidak tersedia';
        if (icon) lokasiEl.prepend(icon);
    }

    // Highlight card
    card.style.transition = 'box-shadow 0.3s ease, outline 0.3s ease';
    card.style.outline = '2px solid #1a5fb4';
    setTimeout(() => { card.style.outline = ''; }, 1800);
}

/**
 * Build HTML string untuk card perusahaan baru
 */
function _buildPerusahaanCardHtml(data) {
    const initials = data.nama.substring(0, 2).toUpperCase();
    const desc = data.tentang
        ? (data.tentang.length > 120 ? data.tentang.substring(0, 120) + '...' : data.tentang)
        : 'Tidak ada deskripsi.';
    const lokasi = data.lokasi ?? 'Lokasi tidak tersedia';
    const url = `/perusahaan/${data.id}`;
    const jumlah = data.jumlah_mahasiswa ?? 0;

    const badgeMap = {
        'Magang'       : '<span class="badge badge-magang"><span class="material-icons-outlined" style="font-size:14px">work</span> Magang</span>',
        'Kerja Praktik': '<span class="badge badge-kp"><span class="material-icons-outlined" style="font-size:14px">business_center</span> Kerja Praktik</span>',
        'Tugas Akhir'  : '<span class="badge badge-ta"><span class="material-icons-outlined" style="font-size:14px">school</span> Tugas Akhir</span>',
    };
    const jenisBadge = data.jenis_kegiatan ? (badgeMap[data.jenis_kegiatan] ?? '') : '';
    const openBadge = '<span class="badge badge-open"><span class="material-icons-outlined" style="font-size:14px">check_circle</span> Terbuka</span>';

    return `
    <div class="company-card" data-perusahaan-id="${data.id}" data-id="${data.id}">
        <div class="company-header">
            <div class="company-logo">${initials}</div>
            <div class="company-info">
                <h3 class="company-name perusahaan-nama">${_escHtml(data.nama)}</h3>
                <div class="company-location perusahaan-lokasi">
                    <span class="material-icons-outlined">location_on</span>
                    ${_escHtml(lokasi)}
                </div>
            </div>
        </div>
        <div class="company-badges">
            ${jenisBadge}
            ${openBadge}
        </div>
        <p class="company-description perusahaan-tentang">${_escHtml(desc)}</p>
        <div class="company-stats">
            <span class="material-icons-outlined">groups</span>
            <strong class="perusahaan-jumlah">${jumlah}</strong> Alumni
        </div>
        <div class="company-footer">
            <a href="${url}" class="btn-detail">
                Lihat Detail
                <span class="material-icons-outlined" style="font-size:18px">arrow_forward</span>
            </a>
        </div>
    </div>`;
}

// ============================================================
// CHANNEL: mahasiswa-magang
// ============================================================

function _subscribeMahasiswaMagang() {
    window.Echo.channel('mahasiswa-magang')
        .listen('.mahasiswa.created', (e) => {
            console.log('[RT] Mahasiswa Magang Created:', e);
            _handleMahasiswaMagangCreated(e);
        })
        .listen('.mahasiswa.updated', (e) => {
            console.log('[RT] Mahasiswa Magang Updated:', e);
            _handleMahasiswaMagangUpdated(e);
        })
        .listen('.mahasiswa.deleted', (e) => {
            console.log('[RT] Mahasiswa Magang Deleted:', e);
            _handleMahasiswaMagangDeleted(e);
        });
}

function _handleMahasiswaMagangCreated(data) {
    if (_isOnPage(['/admin/verifikasi', '/riwayat'])) {
        showNotification('Pengajuan baru diterima dari ' + (data.nama ?? 'mahasiswa'), 'success');
        _softReload(2000);
    }
}

function _handleMahasiswaMagangUpdated(data) {
    // Coba update baris di tabel verifikasi
    const row = document.querySelector(`[data-mahasiswa-id="${data.id}"]`);

    if (row) {
        _updateMahasiswaRow(row, data);
        showNotification('Status pengajuan diperbarui: ' + (data.nama ?? ''), 'info');
    } else if (_isOnPage(['/admin/verifikasi', '/riwayat'])) {
        _softReload(1200);
    }
}

function _handleMahasiswaMagangDeleted(data) {
    const row = document.querySelector(`[data-mahasiswa-id="${data.id}"]`);

    if (row) {
        row.style.transition = 'opacity 0.35s ease';
        row.style.opacity = '0';
        setTimeout(() => {
            row.remove();
            showNotification('Data pengajuan telah dihapus', 'warning');
        }, 380);
    } else if (_isOnPage(['/admin/verifikasi', '/riwayat'])) {
        _softReload(1200);
    }
}

function _updateMahasiswaRow(row, data) {
    const statusBadge = row.querySelector('.status-badge, [class*="status"]');
    if (statusBadge && data.status) {
        statusBadge.textContent = data.status;

        // Reset dan terapkan kelas badge
        statusBadge.className = '';
        const statusClass = {
            'Disetujui': 'status-badge status-approved',
            'Ditolak'  : 'status-badge status-rejected',
        }[data.status] ?? 'status-badge status-pending';
        statusBadge.className = statusClass;
    }

    // Highlight baris
    row.style.transition = 'background-color 0.4s ease';
    row.style.backgroundColor = '#fef9c3';
    setTimeout(() => { row.style.backgroundColor = ''; }, 2000);
}

// ============================================================
// CHANNEL: final-project (Judul TA)
// ============================================================

function _subscribeFinalProject() {
    window.Echo.channel('final-project')
        .listen('.finalproject.created', (e) => {
            console.log('[RT] Final Project Created:', e);
            _handleFinalProjectCreated(e);
        })
        .listen('.finalproject.updated', (e) => {
            console.log('[RT] Final Project Updated:', e);
            _handleFinalProjectUpdated(e);
        })
        .listen('.finalproject.deleted', (e) => {
            console.log('[RT] Final Project Deleted:', e);
            _handleFinalProjectDeleted(e);
        });
}

function _handleFinalProjectCreated(data) {
    if (_isOnPage(['/judul-ta', '/admin/verifikasi'])) {
        showNotification('Judul TA baru diajukan: ' + _truncate(data.title, 50), 'success');
        _softReload(2000);
    }
}

function _handleFinalProjectUpdated(data) {
    // Coba update baris di tabel Judul TA
    const row = document.querySelector(`[data-project-id="${data.id}"]`);

    if (row) {
        _updateFinalProjectRow(row, data);
        showNotification('Status Tugas Akhir diperbarui', 'info');
    } else if (_isOnPage(['/judul-ta', '/admin/verifikasi'])) {
        _softReload(1200);
    }
}

function _handleFinalProjectDeleted(data) {
    const row = document.querySelector(`[data-project-id="${data.id}"]`);

    if (row) {
        row.style.transition = 'opacity 0.35s ease';
        row.style.opacity = '0';
        setTimeout(() => {
            row.remove();
            showNotification('Judul TA telah dihapus', 'warning');
        }, 380);
    } else if (_isOnPage(['/judul-ta', '/admin/verifikasi'])) {
        _softReload(1200);
    }
}

function _updateFinalProjectRow(row, data) {
    // Update status text & badge
    const statusEl = row.querySelector('.status-badge, [class*="status"], td[data-col="status"]');
    if (statusEl && data.status) {
        const statusMap = {
            'approved': 'Disetujui',
            'rejected': 'Ditolak',
            'pending' : 'Pending Review',
        };
        statusEl.textContent = statusMap[data.status] ?? data.status;
        statusEl.className = '';
        const badgeClass = {
            'approved': 'badge badge-success',
            'rejected': 'badge badge-danger',
            'pending' : 'badge badge-warning',
        }[data.status] ?? 'badge';
        statusEl.className = badgeClass;
    }

    // Highlight baris
    row.style.transition = 'background-color 0.4s ease';
    row.style.backgroundColor = '#fef9c3';
    setTimeout(() => { row.style.backgroundColor = ''; }, 2000);
}

// ============================================================
// CHANNEL: mahasiswa-data
// ============================================================

function _subscribeMahasiswaData() {
    window.Echo.channel('mahasiswa-data')
        .listen('.mahasiswa.data.created', (e) => {
            console.log('[RT] Mahasiswa Data Created:', e);
            if (_isOnPage(['/admin/mahasiswa'])) {
                showNotification('Mahasiswa baru ditambahkan: ' + e.nim, 'success');
                _softReload(1800);
            }
        })
        .listen('.mahasiswa.data.updated', (e) => {
            console.log('[RT] Mahasiswa Data Updated:', e);
            const row = document.querySelector(`[data-user-id="${e.id}"]`);
            if (row) {
                _updateMahasiswaDataRow(row, e);
                showNotification('Data mahasiswa diperbarui: ' + e.nim, 'info');
            } else if (_isOnPage(['/admin/mahasiswa'])) {
                _softReload(1200);
            }
        })
        .listen('.mahasiswa.data.deleted', (e) => {
            console.log('[RT] Mahasiswa Data Deleted:', e);
            const row = document.querySelector(`[data-user-id="${e.id}"]`);
            if (row) {
                row.style.transition = 'opacity 0.35s ease';
                row.style.opacity = '0';
                setTimeout(() => {
                    row.remove();
                    showNotification('Data mahasiswa telah dihapus', 'warning');
                }, 380);
            } else if (_isOnPage(['/admin/mahasiswa'])) {
                _softReload(1200);
            }
        });
}

function _updateMahasiswaDataRow(row, data) {
    const set = (sel, val) => {
        const el = row.querySelector(sel);
        if (el && val !== undefined) el.textContent = val;
    };

    set('[data-col="nim"]', data.nim);
    set('[data-col="nama"]', data.nama_lengkap);
    set('[data-col="angkatan"]', data.angkatan);
    set('[data-col="prodi"]', data.program_studi);
    set('[data-col="status"]', data.status_akademik);

    // Highlight
    row.style.transition = 'background-color 0.4s ease';
    row.style.backgroundColor = '#fef9c3';
    setTimeout(() => { row.style.backgroundColor = ''; }, 2000);
}

// ============================================================
// UTILITIES
// ============================================================

/**
 * Cek apakah URL saat ini mengandung salah satu path yang diberikan.
 * @param {string[]} paths
 */
function _isOnPage(paths) {
    const currentPath = window.location.pathname;
    return paths.some(p => currentPath.includes(p));
}

/**
 * Soft reload dengan animasi fade
 * @param {number} delay  ms sebelum reload
 */
function _softReload(delay = 1200) {
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.3s ease';
        document.body.style.opacity = '0.4';
        setTimeout(() => window.location.reload(), 350);
    }, delay);
}

/** Escape HTML untuk mencegah XSS */
function _escHtml(str) {
    if (!str) return '';
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');
}

/** Potong string */
function _truncate(str, len) {
    if (!str) return '';
    return str.length > len ? str.substring(0, len) + '...' : str;
}

// ============================================================
// NOTIFICATION HELPER (Global Toast)
// ============================================================

/**
 * Tampilkan toast notification di pojok kanan atas
 * @param {string} message
 * @param {'success'|'info'|'warning'|'error'} type
 */
export function showNotification(message, type = 'info') {
    // Hapus notifikasi yang ada
    const existing = document.getElementById('rt-notification');
    if (existing) existing.remove();

    const colors = {
        success: { bg: '#10b981', icon: '✓' },
        info   : { bg: '#3b82f6', icon: 'ℹ' },
        warning: { bg: '#f59e0b', icon: '⚠' },
        error  : { bg: '#ef4444', icon: '✕' },
    };
    const { bg, icon } = colors[type] ?? colors.info;

    const toast = document.createElement('div');
    toast.id = 'rt-notification';
    toast.setAttribute('role', 'alert');
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 99999;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px 20px;
        background: ${bg};
        color: #fff;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        font-family: 'Inter', sans-serif;
        box-shadow: 0 8px 32px rgba(0,0,0,0.18);
        transform: translateX(120%);
        transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
        max-width: 340px;
        line-height: 1.4;
        cursor: pointer;
    `;
    toast.innerHTML = `<span style="font-size:16px;font-weight:700">${icon}</span><span>${_escHtml(message)}</span>`;
    toast.addEventListener('click', () => _dismissToast(toast));

    document.body.appendChild(toast);

    // Animasi masuk
    requestAnimationFrame(() => {
        toast.style.transform = 'translateX(0)';
    });

    // Auto-dismiss setelah 4 detik
    setTimeout(() => _dismissToast(toast), 4000);
}

function _dismissToast(toast) {
    if (!toast || !toast.parentNode) return;
    toast.style.transform = 'translateX(120%)';
    setTimeout(() => toast.remove(), 380);
}

// ============================================================
// HELPER: Reload dengan animasi (untuk backward compat)
// ============================================================

export function reloadWithAnimation() {
    document.body.style.transition = 'opacity 0.3s ease';
    document.body.style.opacity = '0.4';
    setTimeout(() => window.location.reload(), 350);
}

/**
 * Real-time Data Synchronization
 * 
 * File ini menangani sinkronisasi data real-time untuk seluruh aplikasi.
 * Data akan ter-update secara otomatis tanpa perlu refresh halaman.
 */

// Setup Real-time Listeners
export function initializeRealtime() {
    // Channel untuk Perusahaan
    window.Echo.channel('perusahaan')
        .listen('.perusahaan.created', (e) => {
            console.log('Perusahaan Created:', e);
            handlePerusahaanCreated(e);
        })
        .listen('.perusahaan.updated', (e) => {
            console.log('Perusahaan Updated:', e);
            handlePerusahaanUpdated(e);
        })
        .listen('.perusahaan.deleted', (e) => {
            console.log('Perusahaan Deleted:', e);
            handlePerusahaanDeleted(e);
        });

    // Channel untuk Mahasiswa Magang
    window.Echo.channel('mahasiswa-magang')
        .listen('.mahasiswa.created', (e) => {
            console.log('Mahasiswa Created:', e);
            handleMahasiswaCreated(e);
        })
        .listen('.mahasiswa.updated', (e) => {
            console.log('Mahasiswa Updated:', e);
            handleMahasiswaUpdated(e);
        })
        .listen('.mahasiswa.deleted', (e) => {
            console.log('Mahasiswa Deleted:', e);
            handleMahasiswaDeleted(e);
        });
}

// ========== PERUSAHAAN HANDLERS ==========

function handlePerusahaanCreated(data) {
    // Reload halaman jika sedang di halaman perusahaan
    if (window.location.pathname.includes('/perusahaan') || 
        window.location.pathname.includes('/admin/perusahaan')) {
        showNotification('Data perusahaan baru ditambahkan', 'success');
        setTimeout(() => window.location.reload(), 1500);
    }
}

function handlePerusahaanUpdated(data) {
    // Update card jika ada
    const card = document.querySelector(`[data-perusahaan-id="${data.id}"]`);
    if (card) {
        updatePerusahaanCard(card, data);
        showNotification('Data perusahaan diperbarui', 'info');
    } else if (window.location.pathname.includes('/perusahaan')) {
        // Jika tidak menemukan card, reload halaman
        setTimeout(() => window.location.reload(), 1000);
    }
}

function handlePerusahaanDeleted(data) {
    const card = document.querySelector(`[data-perusahaan-id="${data.id}"]`);
    if (card) {
        card.style.transition = 'opacity 0.3s';
        card.style.opacity = '0';
        setTimeout(() => {
            card.remove();
            showNotification('Data perusahaan dihapus', 'warning');
        }, 300);
    } else if (window.location.pathname.includes('/perusahaan')) {
        setTimeout(() => window.location.reload(), 1000);
    }
}

function updatePerusahaanCard(card, data) {
    // Update nama perusahaan
    const namaEl = card.querySelector('.perusahaan-nama');
    if (namaEl) namaEl.textContent = data.nama;

    // Update lokasi
    const lokasiEl = card.querySelector('.perusahaan-lokasi');
    if (lokasiEl) lokasiEl.textContent = data.lokasi;

    // Update jenis kegiatan
    const jenisEl = card.querySelector('.perusahaan-jenis');
    if (jenisEl) jenisEl.textContent = data.jenis_kegiatan;

    // Update jumlah mahasiswa
    const jumlahEl = card.querySelector('.perusahaan-jumlah');
    if (jumlahEl) jumlahEl.textContent = `${data.jumlah_mahasiswa} Mahasiswa`;

    // Update tentang
    const tentangEl = card.querySelector('.perusahaan-tentang');
    if (tentangEl) tentangEl.textContent = data.tentang;

    // Add highlight effect
    card.style.transition = 'background-color 0.5s';
    card.style.backgroundColor = '#fef3c7';
    setTimeout(() => {
        card.style.backgroundColor = '';
    }, 1500);
}

// ========== MAHASISWA MAGANG HANDLERS ==========

function handleMahasiswaCreated(data) {
    if (window.location.pathname.includes('/verifikasi') || 
        window.location.pathname.includes('/riwayat')) {
        showNotification('Pengajuan baru diterima', 'success');
        setTimeout(() => window.location.reload(), 1500);
    }
}

function handleMahasiswaUpdated(data) {
    // Update status badge di halaman verifikasi
    const row = document.querySelector(`[data-mahasiswa-id="${data.id}"]`);
    if (row) {
        updateMahasiswaRow(row, data);
        showNotification('Status pengajuan diperbarui', 'info');
    } else if (window.location.pathname.includes('/verifikasi') || 
               window.location.pathname.includes('/riwayat')) {
        setTimeout(() => window.location.reload(), 1000);
    }
}

function handleMahasiswaDeleted(data) {
    const row = document.querySelector(`[data-mahasiswa-id="${data.id}"]`);
    if (row) {
        row.style.transition = 'opacity 0.3s';
        row.style.opacity = '0';
        setTimeout(() => {
            row.remove();
            showNotification('Data mahasiswa dihapus', 'warning');
        }, 300);
    }
}

function updateMahasiswaRow(row, data) {
    // Update status badge
    const statusBadge = row.querySelector('.status-badge');
    if (statusBadge && data.status) {
        statusBadge.textContent = data.status;
        
        // Update badge color
        statusBadge.className = 'status-badge px-3 py-1 rounded-full text-xs font-semibold';
        if (data.status === 'Disetujui') {
            statusBadge.classList.add('bg-green-100', 'text-green-800');
        } else if (data.status === 'Ditolak') {
            statusBadge.classList.add('bg-red-100', 'text-red-800');
        } else {
            statusBadge.classList.add('bg-yellow-100', 'text-yellow-800');
        }
    }

    // Add highlight effect
    row.style.transition = 'background-color 0.5s';
    row.style.backgroundColor = '#fef3c7';
    setTimeout(() => {
        row.style.backgroundColor = '';
    }, 1500);
}

// ========== NOTIFICATION HELPER ==========

function showNotification(message, type = 'info') {
    // Remove existing notification
    const existing = document.getElementById('realtime-notification');
    if (existing) existing.remove();

    // Create notification
    const notification = document.createElement('div');
    notification.id = 'realtime-notification';
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300 ${getNotificationColor(type)}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 10);

    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

function getNotificationColor(type) {
    switch(type) {
        case 'success': return 'bg-green-500';
        case 'warning': return 'bg-yellow-500';
        case 'error': return 'bg-red-500';
        case 'info': 
        default: return 'bg-blue-500';
    }
}

// ========== HELPER: Reload dengan animasi ==========

export function reloadWithAnimation() {
    document.body.style.opacity = '0.5';
    setTimeout(() => window.location.reload(), 300);
}

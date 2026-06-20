/**
 * Real-time Connection Status Indicator
 * 
 * Menampilkan indikator visual status koneksi WebSocket
 */

export function initConnectionStatus() {
    // Create status indicator element
    const indicator = document.createElement('div');
    indicator.id = 'realtime-status';
    indicator.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        transition: all 0.3s;
        cursor: pointer;
    `;

    // Status dot
    const dot = document.createElement('span');
    dot.style.cssText = `
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
    `;

    const text = document.createElement('span');
    
    indicator.appendChild(dot);
    indicator.appendChild(text);
    document.body.appendChild(indicator);

    // Function to update status
    function updateStatus(connected) {
        if (connected) {
            indicator.style.background = '#10b981';
            indicator.style.color = 'white';
            dot.style.background = 'white';
            text.textContent = 'Real-time Active';
            indicator.title = 'WebSocket connected to ws://localhost:8080';
        } else {
            indicator.style.background = '#64748b';
            indicator.style.color = 'white';
            dot.style.background = 'white';
            text.textContent = 'Real-time Offline';
            indicator.title = 'Real-time features disabled. Start Reverb server to enable.';
        }
    }

    // Check connection status
    if (window.Echo && window.Echo.connector) {
        const pusher = window.Echo.connector.pusher;
        
        // Initial status
        updateStatus(pusher.connection.state === 'connected');

        // Listen for state changes
        pusher.connection.bind('state_change', (states) => {
            console.log('WebSocket state changed:', states.previous, '→', states.current);
            updateStatus(states.current === 'connected');
        });

        pusher.connection.bind('connected', () => {
            console.log('✅ WebSocket connected successfully');
            updateStatus(true);
        });

        pusher.connection.bind('disconnected', () => {
            console.log('❌ WebSocket disconnected');
            updateStatus(false);
        });

        pusher.connection.bind('unavailable', () => {
            console.log('⚠️ WebSocket unavailable (Reverb server not running)');
            updateStatus(false);
        });

        pusher.connection.bind('failed', () => {
            console.log('❌ WebSocket connection failed');
            updateStatus(false);
        });
    } else {
        console.warn('Laravel Echo not initialized');
        updateStatus(false);
    }

    // Click to toggle visibility
    indicator.addEventListener('click', () => {
        indicator.style.opacity = indicator.style.opacity === '0.3' ? '1' : '0.3';
    });

    // Auto-hide after 5 seconds if connected
    setTimeout(() => {
        if (indicator.textContent.includes('Active')) {
            indicator.style.opacity = '0.3';
        }
    }, 5000);
}

// Auto-init when DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(initConnectionStatus, 1000);
    });
} else {
    setTimeout(initConnectionStatus, 1000);
}

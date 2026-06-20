//

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './echo';

/**
 * Initialize Real-time Data Synchronization
 */
import { initializeRealtime } from './realtime';

/**
 * Initialize Connection Status Indicator
 */
import './connection-status';

// Wait for DOM and Echo to be ready
document.addEventListener('DOMContentLoaded', () => {
    // Give Echo a moment to establish connection
    setTimeout(() => {
        initializeRealtime();
        console.log('Real-time synchronization initialized');
    }, 500);
});

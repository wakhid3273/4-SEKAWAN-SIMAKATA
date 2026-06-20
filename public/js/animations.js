/**
 * SIMAKATA - Advanced Animations & Interactions
 * Features: Number Counter, Scroll Animations, Toast Notifications, Progress Bars
 */

// ============================================
// 1. NUMBER COUNTER ANIMATION
// ============================================
class CountUp {
    constructor(element, target, duration = 2000) {
        this.element = element;
        this.target = parseInt(target);
        this.duration = duration;
        this.startValue = 0;
        this.startTime = null;
    }

    easeOutQuad(t) {
        return t * (2 - t);
    }

    animate(currentTime) {
        if (!this.startTime) this.startTime = currentTime;
        const elapsed = currentTime - this.startTime;
        const progress = Math.min(elapsed / this.duration, 1);
        
        const easedProgress = this.easeOutQuad(progress);
        const currentValue = Math.floor(this.startValue + (this.target - this.startValue) * easedProgress);
        
        this.element.textContent = currentValue.toLocaleString('id-ID');
        
        if (progress < 1) {
            requestAnimationFrame((time) => this.animate(time));
        } else {
            this.element.textContent = this.target.toLocaleString('id-ID');
        }
    }

    start() {
        requestAnimationFrame((time) => this.animate(time));
    }
}

// Initialize number counters
function initCounters() {
    const counters = document.querySelectorAll('[data-count]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.dataset.counted) {
                const target = entry.target.dataset.count;
                const duration = parseInt(entry.target.dataset.duration) || 2000;
                const counter = new CountUp(entry.target, target, duration);
                counter.start();
                entry.target.dataset.counted = 'true';
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
}

// ============================================
// 2. SCROLL-TRIGGERED ANIMATIONS
// ============================================
function initScrollAnimations() {
    const elements = document.querySelectorAll('.fade-in-scroll, [data-animate]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    elements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(element);
    });
}

// ============================================
// 3. TOAST NOTIFICATION SYSTEM
// ============================================
class ToastNotification {
    constructor() {
        this.container = this.createContainer();
        document.body.appendChild(this.container);
    }

    createContainer() {
        const container = document.createElement('div');
        container.className = 'toast-container';
        container.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 12px;
            max-width: 400px;
        `;
        return container;
    }

    show(message, type = 'info', duration = 3000) {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        
        const icons = {
            success: '✓',
            error: '✕',
            warning: '⚠',
            info: 'ℹ'
        };
        
        const colors = {
            success: '#10b981',
            error: '#ef4444',
            warning: '#f59e0b',
            info: '#3b82f6'
        };
        
        toast.innerHTML = `
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="
                    width: 24px; 
                    height: 24px; 
                    border-radius: 50%; 
                    background: ${colors[type]}; 
                    color: white; 
                    display: flex; 
                    align-items: center; 
                    justify-content: center;
                    font-weight: bold;
                    font-size: 14px;
                ">${icons[type]}</div>
                <span style="flex: 1; font-size: 14px; color: #374151;">${message}</span>
            </div>
            <div class="toast-progress" style="
                position: absolute;
                bottom: 0;
                left: 0;
                height: 3px;
                background: ${colors[type]};
                width: 100%;
                animation: toastProgress ${duration}ms linear;
            "></div>
        `;
        
        toast.style.cssText = `
            background: white;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-left: 4px solid ${colors[type]};
            position: relative;
            overflow: hidden;
            animation: slideInRight 0.4s ease-out;
            cursor: pointer;
        `;
        
        // Close on click
        toast.addEventListener('click', () => {
            this.hide(toast);
        });
        
        this.container.appendChild(toast);
        
        // Auto remove
        setTimeout(() => {
            this.hide(toast);
        }, duration);
        
        return toast;
    }

    hide(toast) {
        toast.style.animation = 'slideOutRight 0.4s ease-out';
        setTimeout(() => {
            toast.remove();
        }, 400);
    }
}

// Add toast progress animation to CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes toastProgress {
        from { width: 100%; }
        to { width: 0%; }
    }
    
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Global toast instance
window.toast = new ToastNotification();

// ============================================
// 4. PROGRESS BAR ANIMATION
// ============================================
function initProgressBars() {
    const progressBars = document.querySelectorAll('[data-progress]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.dataset.animated) {
                const percentage = entry.target.dataset.progress;
                const bar = entry.target.querySelector('.progress-fill');
                
                if (bar) {
                    setTimeout(() => {
                        bar.style.width = percentage + '%';
                    }, 100);
                    entry.target.dataset.animated = 'true';
                }
            }
        });
    }, { threshold: 0.5 });
    
    progressBars.forEach(bar => observer.observe(bar));
}

// ============================================
// 5. 3D CARD TILT EFFECT
// ============================================
function init3DTilt() {
    const cards = document.querySelectorAll('[data-tilt]');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
        });
        
        card.style.transition = 'transform 0.1s ease-out';
    });
}

// ============================================
// 6. COPY TO CLIPBOARD WITH FEEDBACK
// ============================================
function initCopyButtons() {
    const copyButtons = document.querySelectorAll('[data-copy]');
    
    copyButtons.forEach(button => {
        button.addEventListener('click', async () => {
            const text = button.dataset.copy;
            
            try {
                await navigator.clipboard.writeText(text);
                
                // Visual feedback
                const originalText = button.textContent;
                button.textContent = '✓ Copied!';
                button.style.background = '#10b981';
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.style.background = '';
                }, 2000);
                
                // Toast notification
                if (window.toast) {
                    window.toast.show('Text copied to clipboard!', 'success', 2000);
                }
            } catch (err) {
                if (window.toast) {
                    window.toast.show('Failed to copy text', 'error', 2000);
                }
            }
        });
    });
}

// ============================================
// 7. SMOOTH SCROLL TO TOP
// ============================================
function initScrollToTop() {
    const scrollBtn = document.createElement('button');
    scrollBtn.innerHTML = '<span class="material-icons-outlined">arrow_upward</span>';
    scrollBtn.className = 'scroll-to-top';
    scrollBtn.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #1a5fb4;
        color: white;
        border: none;
        box-shadow: 0 4px 12px rgba(26, 95, 180, 0.3);
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9998;
        transition: all 0.3s ease;
    `;
    
    scrollBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    scrollBtn.addEventListener('mouseenter', () => {
        scrollBtn.style.transform = 'translateY(-5px)';
        scrollBtn.style.boxShadow = '0 8px 20px rgba(26, 95, 180, 0.4)';
    });
    
    scrollBtn.addEventListener('mouseleave', () => {
        scrollBtn.style.transform = 'translateY(0)';
        scrollBtn.style.boxShadow = '0 4px 12px rgba(26, 95, 180, 0.3)';
    });
    
    // Show/hide on scroll
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollBtn.style.display = 'flex';
            scrollBtn.style.animation = 'fadeInUp 0.3s ease-out';
        } else {
            scrollBtn.style.display = 'none';
        }
    });
    
    document.body.appendChild(scrollBtn);
}

// ============================================
// 8. IMAGE LAZY LOAD WITH BLUR
// ============================================
function initLazyImages() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => {
        img.style.filter = 'blur(10px)';
        img.style.transition = 'filter 0.3s ease';
        
        img.addEventListener('load', () => {
            img.style.filter = 'blur(0)';
        });
        
        imageObserver.observe(img);
    });
}

// ============================================
// INITIALIZE ALL ON DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    initCounters();
    initScrollAnimations();
    initProgressBars();
    init3DTilt();
    initCopyButtons();
    initScrollToTop();
    initLazyImages();
    
    console.log('✨ SIMAKATA Animations Loaded!');
});

// Export for external use
window.SIMakataAnimations = {
    CountUp,
    ToastNotification,
    initCounters,
    initScrollAnimations,
    initProgressBars,
    init3DTilt,
    initCopyButtons,
    initScrollToTop,
    initLazyImages
};

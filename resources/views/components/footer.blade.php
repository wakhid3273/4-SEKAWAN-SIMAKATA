<style>
    /* Footer specific styles */
    .site-footer {
        background: #f8fafc;
        padding: 60px 40px 20px;
        border-top: 1px solid var(--border, #e2e8f0);
    }
    .footer-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 60px;
        margin-bottom: 40px;
    }
    .footer-brand-name {
        font-size: 20px;
        font-weight: 800;
        color: var(--blue-main, #1a5fb4);
        margin-bottom: 16px;
        letter-spacing: 1px;
    }
    .footer-brand-desc {
        font-size: 14px;
        color: var(--text-gray, #64748b);
        line-height: 1.7;
        margin-bottom: 24px;
        max-width: 320px;
    }
    .footer-copy-small {
        font-size: 13px;
        color: var(--text-light, #94a3b8);
    }
    .footer-col h4 {
        font-size: 15px;
        font-weight: 700;
        color: var(--text-dark, #0f172a);
        margin-bottom: 20px;
    }
    .footer-col a {
        display: block;
        font-size: 14px;
        color: var(--text-gray, #64748b);
        margin-bottom: 12px;
        transition: color 0.2s;
        text-decoration: none;
    }
    .footer-col a:hover { color: var(--blue-main, #1a5fb4); }

    .footer-social-icons {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .social-icon {
        width: 36px; height: 36px;
        border-radius: 50%;
        background: var(--white, #ffffff);
        border: 1px solid var(--border, #e2e8f0);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-gray, #64748b);
        transition: all 0.2s;
        text-decoration: none;
    }
    .social-icon:hover {
        background: var(--blue-pale, #eff6ff);
        color: var(--blue-main, #1a5fb4);
        border-color: rgba(37,99,235,0.2);
    }

    .footer-bottom {
        max-width: 1200px;
        margin: 0 auto;
        padding-top: 24px;
        border-top: 1px solid var(--border, #e2e8f0);
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 13px;
        color: var(--text-light, #94a3b8);
    }
    .footer-bottom-links {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .footer-bottom-links a { color: var(--text-gray, #64748b); text-decoration: none; }
    .footer-bottom-links a:hover { color: var(--blue-main, #1a5fb4); }

    @media (max-width: 900px) {
        .footer-grid { grid-template-columns: 1fr; gap: 32px; }
        .footer-bottom { flex-direction: column; text-align: center; gap: 16px; }
    }
</style>

<footer class="site-footer">
    <div class="footer-grid">
        {{-- Brand col --}}
        <div>
            <div class="footer-brand-name">SIMAKATA</div>
            <p class="footer-brand-desc">Sistem informasi terpadu untuk mendukung perjalanan akademik mahasiswa Informatika dalam mengejar masa depan profesional.</p>
        </div>

        {{-- Follow Us --}}
        <div class="footer-col">
            <h4>Hubungi Kami</h4>
            <div class="footer-social-icons">
                <a href="#" class="social-icon" title="Instagram" id="social-instagram">
                    <span class="material-icons-outlined">photo_camera</span>
                </a>
                <a href="#" class="social-icon" title="WhatsApp" id="social-whatsapp">
                    <span class="material-icons-outlined">chat</span>
                </a>
                <a href="{{ route('admin.login.form') }}" class="social-icon" title="Settings / Admin" id="social-admin">
                    <span class="material-icons-outlined">settings</span>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} HMIF Informatics SIMAKATA. Managed by Informatics Department.</p>
        <div class="footer-bottom-links">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#">Help</a>
        </div>
    </div>
</footer>

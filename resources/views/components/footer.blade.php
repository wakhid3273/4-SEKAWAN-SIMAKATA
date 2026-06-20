<style>
    .site-footer {
        background: #f8fafc;
        padding: 40px 40px 20px;
        border-top: 1px solid var(--border, #e2e8f0);
    }
    .footer-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        flex-wrap: wrap;
    }
    .footer-brand-name {
        font-size: 18px;
        font-weight: 800;
        color: var(--blue-main, #1a5fb4);
        letter-spacing: 1px;
        margin-bottom: 6px;
    }
    .footer-brand-desc {
        font-size: 13px;
        color: var(--text-gray, #64748b);
        line-height: 1.6;
    }
    .footer-contact {
        display: flex;
        align-items: center;
        gap: 10px;
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
        margin: 20px auto 0;
        padding-top: 16px;
        border-top: 1px solid var(--border, #e2e8f0);
        font-size: 12px;
        color: var(--text-light, #94a3b8);
        text-align: center;
    }
    @media (max-width: 700px) {
        .footer-inner { flex-direction: column; align-items: flex-start; }
    }
</style>

<footer class="site-footer">
    <div class="footer-inner">
        <div>
            <div class="footer-brand-name">SIMAKATA</div>
            <p class="footer-brand-desc">Managed by 4 Sekawan</p>
        </div>
        <div class="footer-contact">
            <a href="https://wa.me/6281234567890" target="_blank" class="social-icon" title="Hubungi Admin via WhatsApp" id="social-whatsapp">
                <span class="material-icons-outlined">chat</span>
            </a>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2026 4 Sekawan
    </div>
</footer>

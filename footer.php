<?php // footer.php — shared across all pages ?>

    <footer style="background:var(--purple-dark,#6c3483);color:rgba(255,255,255,0.88);padding:48px 0 24px;">
        <div class="container">
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:2.5rem;margin-bottom:2.5rem;">

                <div>
                    <div style="font-family:var(--font-display,'Georgia',serif);font-size:1.4rem;font-weight:700;color:white;margin-bottom:0.75rem;">NIDUS EXIM Pvt. Ltd.</div>
                    <p style="font-size:0.9rem;line-height:1.8;opacity:0.75;">Premier Operating Theatre Construction &amp; Design Solutions since 2000.</p>
                </div>

                <div>
                    <div style="font-size:0.75rem;letter-spacing:2.5px;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:1rem;">Quick Links</div>
                    <div style="display:flex;flex-direction:column;gap:8px;font-size:0.9rem;">
                        <a href="index.php"     style="opacity:0.8;transition:opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.8">Home</a>
                        <a href="services.php"  style="opacity:0.8;transition:opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.8">Services</a>
                        <a href="about.php"     style="opacity:0.8;transition:opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.8">About Us</a>
                        <a href="contact.php"   style="opacity:0.8;transition:opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.8">Contact Us</a>
                    </div>
                </div>

                <div>
                    <div style="font-size:0.75rem;letter-spacing:2.5px;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:1rem;">Contact</div>
                    <p style="font-size:0.88rem;line-height:1.9;opacity:0.78;">
                        63/2 B, Flat No. 36, 4th Floor,<br>
                        Indralok Apts., Pune Satara Road,<br>
                        Parvati, Pune 411009, Maharashtra<br><br>
                        🌐 www.niduseximpvtltd.com
                    </p>
                </div>

                <div>
                    <div style="font-size:0.75rem;letter-spacing:2.5px;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:1rem;">Business Hours</div>
                    <p style="font-size:0.88rem;line-height:2;opacity:0.78;">
                        Mon – Fri: 9:00 AM – 6:00 PM<br>
                        Saturday: 10:00 AM – 4:00 PM<br>
                        Sunday: Emergency Only
                    </p>
                </div>

            </div>

            <div style="border-top:1px solid rgba(255,255,255,0.12);padding-top:20px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;">
                <p style="font-size:0.82rem;opacity:0.55;">&copy; 2025 NIDUS EXIM Pvt. Ltd. All rights reserved. | Building Tomorrow's Medical Facilities Today</p>
                <!-- Hidden admin trigger: click 5 times quickly -->
                <span id="admin-dots" style="font-size:0.6rem;opacity:0.2;cursor:default;letter-spacing:4px;user-select:none;" onclick="adminDotClick()" title="">&#9679;&#9679;&#9679;</span>
            </div>
        </div>
    </footer>

    <script>
    let _adminClicks = 0, _adminTimer = null;
    function adminDotClick() {
        _adminClicks++;
        clearTimeout(_adminTimer);
        _adminTimer = setTimeout(() => { _adminClicks = 0; }, 2500);
        if (_adminClicks >= 5) {
            _adminClicks = 0;
            window.location.href = 'view_messages.php';
        }
    }
    </script>
</body>
</html>

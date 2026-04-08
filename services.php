<?php
$page_title  = 'Services';
$active_page = 'services';
include 'header.php';
?>

<style>
.service-card { padding: 2.5rem; }
.service-icon {
    width: 64px; height: 64px;
    background: var(--purple);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.7rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(142,68,173,0.3);
}
.service-card h3 {
    font-family: var(--font-display);
    font-size: 1.5rem;
    color: var(--purple);
    margin-bottom: 0.75rem;
}
.service-card p { color: var(--gray-600); line-height: 1.8; font-size: 0.97rem; }
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

/* Additional services list */
.add-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.25rem;
    margin-top: 2rem;
}
.add-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    background: white;
    border-radius: var(--radius-md);
    padding: 1.25rem 1.5rem;
    box-shadow: var(--shadow-sm);
    border: 1.5px solid var(--gray-100);
    transition: var(--transition);
}
.add-item:hover { border-color: var(--purple-light); transform: translateY(-4px); }
.add-dot {
    width: 10px; height: 10px; min-width: 10px;
    border-radius: 50%;
    background: var(--purple);
    margin-top: 6px;
}
.add-item span { font-size: 0.92rem; color: var(--gray-900); line-height: 1.6; }
</style>

<!-- PAGE HERO -->
<div class="page-hero" style="background-image:none;">
    <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=1920&q=85');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content fade-up">
        <div class="breadcrumb"><a href="index.php" style="color:inherit;">Home</a> / <span>Services</span></div>
        <h1>Our Services</h1>
        <p>Complete end-to-end OT construction &amp; design solutions for healthcare excellence</p>
    </div>
</div>

<!-- CORE SERVICES -->
<section class="section section-bg-light">
    <div class="container">
        <div class="section-label">What We Offer</div>
        <h2 class="section-title">Core Services</h2>
        <div class="section-title-bar"></div>

        <div class="services-grid">
            <div class="card service-card fade-up">
                <div class="service-icon">🏥</div>
                <h3>OT Construction</h3>
                <p>Complete operating theatre construction services with state-of-the-art infrastructure, sterile environments, and compliance with international medical standards and regulations.</p>
            </div>
            <div class="card service-card fade-up" style="transition-delay:0.1s;">
                <div class="service-icon">🎨</div>
                <h3>OT Design &amp; Planning</h3>
                <p>Expert architectural design and space planning for operating theatres, ensuring optimal workflow, sterile zones, and integration of advanced medical equipment systems.</p>
            </div>
            <div class="card service-card fade-up" style="transition-delay:0.2s;">
                <div class="service-icon">⚙️</div>
                <h3>Medical Equipment Integration</h3>
                <p>Seamless integration of surgical equipment, HVAC systems, electrical infrastructure, and medical gas systems to create fully functional operating environments.</p>
            </div>
        </div>
    </div>
</section>

<!-- PHOTO BACKGROUND SECTION -->
<section class="photo-section section" style="background-image:url('https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=1920&q=80');background-size:cover;background-position:center;">
    <div style="position:absolute;inset:0;background:rgba(255,255,255,0.91);"></div>
    <div class="container">
        <div class="section-label">Full Scope</div>
        <h2 class="section-title">Manufacturing &amp; Trading Activities</h2>
        <div class="section-title-bar"></div>
        <p class="section-intro">NIDUS EXIM operates in both Domestic and International markets across Pharmaceuticals, Surgical, Medical &amp; Laboratory equipment setups and Turnkey Project Setups.</p>

        <div class="add-grid">
            <?php
            $items = [
                'Pharmaceuticals — Manufacturing &amp; Trading',
                'Surgical Equipment Supply',
                'Medical Equipment &amp; Setups',
                'Laboratory Equipment',
                'Turnkey Project Setups — Domestic',
                'Turnkey Project Setups — International',
                'HVAC Systems for OT',
                'Medical Gas Pipeline Systems',
                'Sterile Environment Engineering',
                'Electrical Infrastructure for OT',
                'Government Supply &amp; Tendering',
                'Post-Commissioning Support',
            ];
            foreach ($items as $i => $item):
            ?>
            <div class="add-item fade-up" style="transition-delay:<?= ($i % 4) * 0.07 ?>s;">
                <div class="add-dot"></div>
                <span><?= $item ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

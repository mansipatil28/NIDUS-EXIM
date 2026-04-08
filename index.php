<?php
$page_title  = 'Home';
$active_page = 'home';
include 'header.php';
?>

<style>
/* ── HOME-SPECIFIC STYLES ─────────────────────────────────────────── */
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    background: var(--purple);
}
.hero-bg {
    position: absolute; inset: 0;
    background-image: url('https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=1920&q=85');
    background-size: cover;
    background-position: center;
    opacity: 0.35;
    transform: scale(1.05);
    transition: transform 12s ease;
}
.hero:hover .hero-bg { transform: scale(1.0); }
.hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(160deg, rgba(100,30,130,0.72) 0%, rgba(40,0,60,0.60) 100%);
}
.hero-content {
    position: relative; z-index: 2;
    text-align: center;
    max-width: 860px;
    padding: 0 28px;
    animation: heroIn 1s ease both;
}
@keyframes heroIn {
    from { opacity:0; transform:translateY(40px); }
    to   { opacity:1; transform:none; }
}
.hero-eyebrow {
    display: inline-block;
    font-size: 0.78rem;
    letter-spacing: 3.5px;
    text-transform: uppercase;
    color: var(--purple-light);
    border: 1px solid rgba(210,180,222,0.4);
    border-radius: 40px;
    padding: 6px 18px;
    margin-bottom: 1.5rem;
    font-weight: 500;
}
.hero h1 {
    font-family: var(--font-display);
    font-size: clamp(2.8rem, 7vw, 5.2rem);
    font-weight: 700;
    color: white;
    line-height: 1.1;
    margin-bottom: 1.25rem;
    text-shadow: 0 3px 24px rgba(0,0,0,0.3);
}
.hero-tagline {
    font-size: clamp(1rem, 2.2vw, 1.3rem);
    color: rgba(255,255,255,0.85);
    font-weight: 300;
    margin-bottom: 2.5rem;
    letter-spacing: 0.3px;
}
.hero-actions { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }

/* Stats bar */
.stats-bar {
    background: white;
    box-shadow: var(--shadow-lg);
    border-radius: var(--radius-lg);
    padding: 2rem 2.5rem;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 1rem;
    text-align: center;
    margin-top: -50px;
    position: relative;
    z-index: 10;
}
.stat-num {
    font-family: var(--font-display);
    font-size: 2.4rem;
    font-weight: 700;
    color: var(--purple);
    line-height: 1;
}
.stat-label {
    font-size: 0.82rem;
    color: var(--gray-600);
    margin-top: 4px;
    font-weight: 400;
}

/* Quick-link cards */
.quick-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.75rem;
    margin-top: 3rem;
}
.quick-card {
    display: flex;
    flex-direction: column;
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1.5px solid var(--gray-100);
    transition: var(--transition);
    text-decoration: none;
    color: inherit;
}
.quick-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
    border-color: var(--purple-light);
}
.quick-card-img {
    height: 180px;
    background-size: cover;
    background-position: center;
    position: relative;
    overflow: hidden;
}
.quick-card-img-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(110,40,140,0.55) 0%, transparent 60%);
}
.quick-card-body {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.quick-card-icon {
    font-size: 2rem;
    margin-bottom: 0.75rem;
}
.quick-card-title {
    font-family: var(--font-display);
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--purple);
    margin-bottom: 0.5rem;
}
.quick-card-desc {
    font-size: 0.9rem;
    color: var(--gray-600);
    line-height: 1.7;
    flex: 1;
}
.quick-card-link {
    margin-top: 1rem;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--purple);
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Photo strip */
.photo-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    height: 220px;
    overflow: hidden;
}
.photo-row-cell {
    overflow: hidden;
    position: relative;
}
.photo-row-cell img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.photo-row-cell:hover img { transform: scale(1.08); }

/* CTA strip */
.cta-strip {
    background: var(--purple);
    padding: 70px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.cta-strip-bg {
    position: absolute; inset: 0;
    background-image: url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1920&q=80');
    background-size: cover;
    background-position: center;
    opacity: 0.18;
}
.cta-strip-content { position: relative; z-index: 1; }
.cta-strip h2 {
    font-family: var(--font-display);
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    color: white;
    margin-bottom: 0.75rem;
}
.cta-strip p { color: rgba(255,255,255,0.82); margin-bottom: 2rem; font-size: 1.05rem; font-weight: 300; }

@media (max-width:768px) {
    .photo-row { grid-template-columns: repeat(2,1fr); height:280px; }
    .stats-bar { margin-top: 0; border-radius: 0; }
}
</style>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-eyebrow">Est. 2000 &nbsp;•&nbsp; Pune, India</div>
        <h1>NIDUS EXIM<br>Pvt. Ltd.</h1>
        <p class="hero-tagline">Premier Operating Theatre Construction &amp; Design Solutions</p>
        <div class="hero-actions">
            <a href="services.php" class="btn btn-white">Explore Services</a>
            <a href="contact.php"  class="btn btn-outline" style="border-color:rgba(255,255,255,0.6);color:white;">Get In Touch</a>
        </div>
    </div>
</section>

<!-- STATS BAR -->
<section style="padding:0 28px;max-width:1200px;margin:0 auto;">
    <div class="stats-bar fade-up">
        <div><div class="stat-num">24+</div><div class="stat-label">Years Experience</div></div>
        <div><div class="stat-num">20</div><div class="stat-label">Marketing Personnel</div></div>
        <div><div class="stat-num">2</div><div class="stat-label">State Governments Served</div></div>
        <div><div class="stat-num">2000</div><div class="stat-label">Year Incorporated</div></div>
    </div>
</section>

<!-- QUICK LINKS / SECTIONS -->
<section class="section section-bg-light">
    <div class="container">
        <div class="section-label">What We Do</div>
        <h2 class="section-title">Explore Our Expertise</h2>
        <div class="section-title-bar"></div>

        <div class="quick-grid">
            <a href="services.php" class="quick-card fade-up">
                <div class="quick-card-img" style="background-image:url('https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=600&q=80');">
                    <div class="quick-card-img-overlay"></div>
                </div>
                <div class="quick-card-body">
                    <div class="quick-card-icon">🏥</div>
                    <div class="quick-card-title">Our Services</div>
                    <p class="quick-card-desc">OT Construction, Design &amp; Planning, and Medical Equipment Integration — all under one roof.</p>
                    <span class="quick-card-link">View Services →</span>
                </div>
            </a>

            <a href="about.php" class="quick-card fade-up" style="transition-delay:0.1s;">
                <div class="quick-card-img" style="background-image:url('https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=600&q=80');">
                    <div class="quick-card-img-overlay"></div>
                </div>
                <div class="quick-card-body">
                    <div class="quick-card-icon">🏢</div>
                    <div class="quick-card-title">About Us</div>
                    <p class="quick-card-desc">Specialized in world-class OT facilities with expert architects, engineers, and medical facility specialists.</p>
                    <span class="quick-card-link">Learn More →</span>
                </div>
            </a>

            <a href="mission.php" class="quick-card fade-up" style="transition-delay:0.2s;">
                <div class="quick-card-img" style="background-image:url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=600&q=80');">
                    <div class="quick-card-img-overlay"></div>
                </div>
                <div class="quick-card-body">
                    <div class="quick-card-icon">🎯</div>
                    <div class="quick-card-title">Mission &amp; Vision</div>
                    <p class="quick-card-desc">Committed to excellence in approach, quality service, and long-term relationships in healthcare worldwide.</p>
                    <span class="quick-card-link">Our Vision →</span>
                </div>
            </a>

            <a href="directors.php" class="quick-card fade-up" style="transition-delay:0.1s;">
                <div class="quick-card-img" style="background-image:url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&q=80');">
                    <div class="quick-card-img-overlay"></div>
                </div>
                <div class="quick-card-body">
                    <div class="quick-card-icon">👤</div>
                    <div class="quick-card-title">Our Directors</div>
                    <p class="quick-card-desc">Meet Mr. Vishwambar Shedge &amp; Mrs. Supriya Shedge — the leadership driving NIDUS forward.</p>
                    <span class="quick-card-link">Meet the Team →</span>
                </div>
            </a>

            <a href="company.php" class="quick-card fade-up" style="transition-delay:0.2s;">
                <div class="quick-card-img" style="background-image:url('https://images.unsplash.com/photo-1585842378054-ee2e52f94ba2?w=600&q=80');">
                    <div class="quick-card-img-overlay"></div>
                </div>
                <div class="quick-card-body">
                    <div class="quick-card-icon">📋</div>
                    <div class="quick-card-title">Company Details</div>
                    <p class="quick-card-desc">Incorporated in 2000 as a Private Limited company; supplying Maharashtra &amp; Madhya Pradesh Governments.</p>
                    <span class="quick-card-link">Company Info →</span>
                </div>
            </a>

            <a href="contact.php" class="quick-card fade-up" style="transition-delay:0.3s;">
                <div class="quick-card-img" style="background-image:url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=600&q=80');">
                    <div class="quick-card-img-overlay"></div>
                </div>
                <div class="quick-card-body">
                    <div class="quick-card-icon">📬</div>
                    <div class="quick-card-title">Contact Us</div>
                    <p class="quick-card-desc">Send us an enquiry and our team will get back to you promptly. We'd love to work with you.</p>
                    <span class="quick-card-link">Send Enquiry →</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- PHOTO ROW -->
<div class="photo-row">
    <div class="photo-row-cell"><img src="https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=500&q=80" alt="Operating Theatre" loading="lazy"></div>
    <div class="photo-row-cell"><img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=500&q=80" alt="Medical Equipment" loading="lazy"></div>
    <div class="photo-row-cell"><img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=500&q=80" alt="Hospital" loading="lazy"></div>
    <div class="photo-row-cell"><img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=500&q=80" alt="Surgical Suite" loading="lazy"></div>
</div>

<!-- CTA STRIP -->
<div class="cta-strip">
    <div class="cta-strip-bg"></div>
    <div class="container cta-strip-content">
        <h2>Ready to Build Your World-Class OT Facility?</h2>
        <p>From design to commissioning — we handle every detail with precision and care.</p>
        <a href="contact.php" class="btn btn-white">Send Us an Enquiry</a>
    </div>
</div>

<?php include 'footer.php'; ?>

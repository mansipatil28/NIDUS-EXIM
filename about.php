<?php
$page_title  = 'About Us';
$active_page = 'about';
include 'header.php';
?>

<style>
.about-photo {
    border-radius: var(--radius-lg);
    overflow: hidden;
    height: 420px;
    position: relative;
    box-shadow: var(--shadow-lg);
}
.about-photo img { width:100%; height:100%; object-fit:cover; }
.about-photo-badge {
    position: absolute;
    bottom: 24px; left: 24px;
    background: var(--purple);
    color: white;
    border-radius: var(--radius-md);
    padding: 14px 20px;
    font-family: var(--font-display);
}
.about-photo-badge strong { font-size: 2rem; display:block; line-height:1; }
.about-photo-badge span { font-size: 0.82rem; opacity: 0.85; }

.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}
.about-text p {
    color: var(--gray-600);
    font-size: 1.02rem;
    line-height: 1.85;
    margin-bottom: 1.25rem;
}

.why-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.5rem;
    margin-top: 2.5rem;
}
.why-card {
    background: white;
    border-radius: var(--radius-md);
    padding: 1.75rem;
    box-shadow: var(--shadow-sm);
    border: 1.5px solid var(--gray-100);
    transition: var(--transition);
    text-align: center;
}
.why-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); border-color: var(--purple-light); }
.why-icon { font-size: 2.2rem; margin-bottom: 0.75rem; }
.why-card h4 { font-family: var(--font-display); color: var(--purple); font-size: 1.15rem; margin-bottom: 0.5rem; }
.why-card p { font-size: 0.88rem; color: var(--gray-600); line-height: 1.7; }

@media(max-width:768px) {
    .about-grid { grid-template-columns:1fr; gap:2rem; }
}
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=1920&q=85');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content fade-up">
        <div class="breadcrumb"><a href="index.php" style="color:inherit;">Home</a> / <span>About Us</span></div>
        <h1>About Us</h1>
        <p>Specialized construction &amp; design — delivering world-class OT facilities since 2000</p>
    </div>
</div>

<!-- ABOUT SECTION -->
<section class="section section-bg-white">
    <div class="container">
        <div class="about-grid">
            <div class="about-photo fade-up">
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&q=85" alt="NIDUS Medical Facility" loading="lazy">
                <div class="about-photo-badge">
                    <strong>25+</strong>
                    <span>Years of Excellence</span>
                </div>
            </div>
            <div class="about-text fade-up" style="transition-delay:0.15s;">
                <div class="section-label" style="text-align:left;">Who We Are</div>
                <h2 class="section-title" style="text-align:left;margin-bottom:1.5rem;">NIDUS EXIM Pvt. Ltd.</h2>
                <p>NIDUS EXIM Pvt. Ltd. is a specialized construction and design company dedicated to creating world-class operating theatre facilities. With extensive experience in medical infrastructure development, we understand the critical importance of precision, sterility, and functionality in surgical environments.</p>
                <p>Our team of expert architects, engineers, and medical facility specialists work collaboratively to deliver operating theatres that meet the highest international standards. From initial design concepts to final commissioning, we ensure every aspect of your OT construction project is executed with meticulous attention to detail.</p>
                <p>We have successfully completed numerous OT projects for hospitals, surgical centers, and medical institutions, earning a reputation for excellence in medical facility construction and innovative design solutions.</p>
                <div style="margin-top:2rem;">
                    <a href="contact.php" class="btn btn-primary">Get In Touch</a>
                    &nbsp;&nbsp;
                    <a href="services.php" class="btn btn-outline">Our Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PHOTO BG — WHY NIDUS -->
<section class="section photo-section" style="background-image:url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1920&q=80');background-size:cover;background-position:center;background-attachment:fixed;">
    <div style="position:absolute;inset:0;background:rgba(255,255,255,0.90);"></div>
    <div class="container">
        <div class="section-label">Why Choose Us</div>
        <h2 class="section-title">The NIDUS Advantage</h2>
        <div class="section-title-bar"></div>

        <div class="why-grid">
            <div class="why-card fade-up">
                <div class="why-icon">🏆</div>
                <h4>Proven Track Record</h4>
                <p>Over two decades of successful OT projects across hospitals, surgical centers, and medical institutions.</p>
            </div>
            <div class="why-card fade-up" style="transition-delay:0.1s;">
                <div class="why-icon">🔬</div>
                <h4>International Standards</h4>
                <p>Every project complies with Indian FDA standards and leading international medical facility benchmarks.</p>
            </div>
            <div class="why-card fade-up" style="transition-delay:0.2s;">
                <div class="why-icon">👥</div>
                <h4>Expert Team</h4>
                <p>20 qualified young professionals in marketing, supported by specialized architects and engineers.</p>
            </div>
            <div class="why-card fade-up" style="transition-delay:0.3s;">
                <div class="why-icon">🌐</div>
                <h4>Domestic &amp; International</h4>
                <p>Active in both Indian and international markets, supplying Maharashtra and Madhya Pradesh Governments.</p>
            </div>
            <div class="why-card fade-up" style="transition-delay:0.1s;">
                <div class="why-icon">📦</div>
                <h4>Ample Storage</h4>
                <p>Godown facilities that maintain stock in well condition as per Indian FDA compliance standards.</p>
            </div>
            <div class="why-card fade-up" style="transition-delay:0.2s;">
                <div class="why-icon">📈</div>
                <h4>Steady Growth</h4>
                <p>Consistent growth in turnover and expanding customer base since our incorporation in 2000.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<?php
$page_title  = 'Directors';
$active_page = 'directors';
include 'header.php';
?>

<style>
.directors-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
    gap: 2.5rem;
    margin-top: 3rem;
}
.director-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    border: 1.5px solid var(--gray-100);
    transition: var(--transition);
    position: relative;
}
.director-card::before {
    content: '';
    position: absolute; top:0; left:0; right:0;
    height: 5px;
    background: var(--purple);
}
.director-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); border-color: var(--purple-light); }

.director-header {
    background: var(--purple);
    padding: 2.5rem 2rem 1.5rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}
.director-header-bg {
    position: absolute; inset: 0;
    background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&q=70');
    background-size: cover;
    background-position: center;
    opacity: 0.18;
}
.director-avatar {
    width: 110px; height: 110px;
    border-radius: 50%;
    background: rgba(255,255,255,0.18);
    border: 3px solid rgba(255,255,255,0.5);
    margin: 0 auto 1rem;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display);
    font-size: 2.4rem;
    font-weight: 700;
    color: white;
    position: relative;
    z-index: 1;
}
.director-name {
    font-family: var(--font-display);
    font-size: 1.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 0.3rem;
    position: relative; z-index: 1;
}
.director-role {
    font-size: 0.8rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.75);
    position: relative; z-index: 1;
}
.director-body { padding: 2rem; }
.director-body p { color: var(--gray-600); line-height: 1.85; font-size: 0.97rem; }
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1920&q=85');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content fade-up">
        <div class="breadcrumb"><a href="index.php" style="color:inherit;">Home</a> / <span>Directors</span></div>
        <h1>Our Directors</h1>
        <p>Visionary leadership committed to excellence in healthcare infrastructure</p>
    </div>
</div>

<!-- DIRECTORS -->
<section class="section photo-section" style="background-image:url('https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1920&q=80');background-size:cover;background-attachment:fixed;">
    <div style="position:absolute;inset:0;background:rgba(250,248,252,0.93);"></div>
    <div class="container">
        <div class="section-label">Leadership</div>
        <h2 class="section-title">Meet Our Directors</h2>
        <div class="section-title-bar"></div>

        <div class="directors-grid">
            <div class="director-card fade-up">
                <div class="director-header">
                    <div class="director-header-bg"></div>
                    <div class="director-avatar">VS</div>
                    <div class="director-name">Mr. Vishwambar Shedge</div>
                    <div class="director-role">Managing Director</div>
                </div>
                <div class="director-body">
                    <p>With extensive experience in medical infrastructure development, Mr. Vishwambar Shedge leads NIDUS EXIM Pvt. Ltd. with a vision to create world-class healthcare facilities. His leadership ensures every OT construction project meets the highest standards of quality, safety, and functionality.</p>
                </div>
            </div>

            <div class="director-card fade-up" style="transition-delay:0.15s;">
                <div class="director-header">
                    <div class="director-header-bg"></div>
                    <div class="director-avatar">SS</div>
                    <div class="director-name">Mrs. Supriya Vishwambar Shedge</div>
                    <div class="director-role">Director</div>
                </div>
                <div class="director-body">
                    <p>Mrs. Supriya Vishwambar Shedge plays a vital role in NIDUS EXIM Pvt. Ltd.'s operations and strategic planning. Her expertise and dedication contribute significantly to the company's success in delivering exceptional OT construction and design solutions to healthcare facilities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STRENGTH STRIP -->
<section class="section section-bg-white">
    <div class="container" style="text-align:center;">
        <div class="section-label">Our Strength</div>
        <h2 class="section-title">Young, Experienced &amp; Committed</h2>
        <div class="section-title-bar"></div>
        <p class="section-intro">Young experienced and committed professionals as Director with an ambition to achieve higher goals.</p>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1.5rem;max-width:680px;margin:0 auto;">
            <div style="background:var(--purple-fade);border:1.5px solid var(--purple-light);border-radius:var(--radius-md);padding:2rem;transition:var(--transition);" class="fade-up">
                <div style="font-family:var(--font-display);font-size:3rem;font-weight:700;color:var(--purple);line-height:1;">20</div>
                <div style="font-size:0.88rem;color:var(--gray-600);margin-top:6px;">Marketing Personnel</div>
            </div>
            <div style="background:var(--purple-fade);border:1.5px solid var(--purple-light);border-radius:var(--radius-md);padding:2rem;transition:var(--transition);" class="fade-up" style="transition-delay:0.1s;">
                <div style="font-family:var(--font-display);font-size:3rem;font-weight:700;color:var(--purple);line-height:1;">24+</div>
                <div style="font-size:0.88rem;color:var(--gray-600);margin-top:6px;">Years Experience</div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<?php
$page_title  = 'Mission & Vision';
$active_page = 'mission';
include 'header.php';
?>

<style>
.mv-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2.5rem;
    margin-top: 3rem;
}
.mv-card {
    background: white;
    border-radius: var(--radius-lg);
    padding: 3rem 2.5rem;
    box-shadow: var(--shadow-md);
    border: 1.5px solid var(--gray-100);
    position: relative;
    overflow: hidden;
    transition: var(--transition);
}
.mv-card::before {
    content: '';
    position: absolute; top:0; left:0; right:0;
    height: 5px;
    background: var(--purple);
}
.mv-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); }
.mv-icon {
    width: 72px; height: 72px;
    background: var(--purple);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 8px 24px rgba(142,68,173,0.28);
}
.mv-card h3 {
    font-family: var(--font-display);
    font-size: 1.8rem;
    color: var(--purple);
    font-weight: 700;
    margin-bottom: 1.25rem;
}
.mv-card p { color: var(--gray-600); font-size: 0.97rem; line-height: 1.85; margin-bottom: 1rem; }

.vision-list { list-style: none; padding: 0; }
.vision-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 0.9rem 0;
    border-bottom: 1px solid var(--gray-100);
    color: var(--gray-600);
    font-size: 0.97rem;
    line-height: 1.7;
}
.vision-list li:last-child { border: none; }
.vision-arrow {
    color: var(--purple);
    font-size: 1.1rem;
    font-weight: 700;
    min-width: 20px;
    margin-top: 2px;
}

/* Values grid */
.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-top: 3rem;
}
.value-card {
    text-align: center;
    padding: 2rem 1.5rem;
    background: var(--purple-fade);
    border-radius: var(--radius-md);
    border: 1.5px solid var(--purple-light);
    transition: var(--transition);
}
.value-card:hover { background: var(--purple); }
.value-card:hover .value-title,
.value-card:hover .value-desc { color: white; }
.value-icon { font-size: 2.2rem; margin-bottom: 0.75rem; }
.value-title { font-family: var(--font-display); font-size: 1.2rem; font-weight: 700; color: var(--purple); margin-bottom: 0.5rem; transition: var(--transition); }
.value-desc { font-size: 0.85rem; color: var(--gray-600); line-height: 1.6; transition: var(--transition); }

@media(max-width:768px) {
    .mv-grid { grid-template-columns: 1fr; }
}
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1585842378054-ee2e52f94ba2?w=1920&q=85');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content fade-up">
        <div class="breadcrumb"><a href="index.php" style="color:inherit;">Home</a> / <span>Mission &amp; Vision</span></div>
        <h1>Our Mission &amp; Vision</h1>
        <p>The guiding principles that drive every project and every relationship</p>
    </div>
</div>

<!-- MISSION & VISION CARDS -->
<section class="section section-bg-light photo-section" style="background-image:url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1920&q=80');background-size:cover;background-attachment:fixed;">
    <div style="position:absolute;inset:0;background:rgba(250,248,252,0.93);"></div>
    <div class="container">
        <div class="section-label">Purpose &amp; Direction</div>
        <h2 class="section-title">Mission &amp; Vision</h2>
        <div class="section-title-bar"></div>

        <div class="mv-grid">
            <div class="mv-card fade-up">
                <div class="mv-icon">🎯</div>
                <h3>Our Mission</h3>
                <p>We aim to please our customers through excellence in approach, efficient and quality service, and by maintaining long-term relationships in the fields of healthcare, education, research and industry both within India and Internationally.</p>
                <p>This we shall achieve by understanding customer needs and wants, procuring quality products from cost efficient manufacturers, maintaining continuous edge over competitors and by executing all aspects of work with excellence.</p>
            </div>

            <div class="mv-card fade-up" style="transition-delay:0.15s;">
                <div class="mv-icon">🔭</div>
                <h3>Our Vision</h3>
                <ul class="vision-list">
                    <li>
                        <span class="vision-arrow">→</span>
                        To provide with all range of high quality products from a single contact.
                    </li>
                    <li>
                        <span class="vision-arrow">→</span>
                        Cost effective options in product range by serving multiple companies.
                    </li>
                    <li>
                        <span class="vision-arrow">→</span>
                        Keep our customers updated in new products and happenings.
                    </li>
                    <li>
                        <span class="vision-arrow">→</span>
                        Import quality products to meet the critical requirements of our customers in different regions.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CORE VALUES -->
<section class="section section-bg-white">
    <div class="container">
        <div class="section-label">What Drives Us</div>
        <h2 class="section-title">Our Core Values</h2>
        <div class="section-title-bar"></div>

        <div class="values-grid">
            <div class="value-card fade-up">
                <div class="value-icon">⭐</div>
                <div class="value-title">Excellence</div>
                <div class="value-desc">Every project executed with meticulous attention to detail and uncompromising standards.</div>
            </div>
            <div class="value-card fade-up" style="transition-delay:0.1s;">
                <div class="value-icon">🤝</div>
                <div class="value-title">Relationships</div>
                <div class="value-desc">Long-term partnerships built on trust, transparency, and consistent delivery.</div>
            </div>
            <div class="value-card fade-up" style="transition-delay:0.2s;">
                <div class="value-icon">💡</div>
                <div class="value-title">Innovation</div>
                <div class="value-desc">Staying ahead of competitors through continuous learning and adoption of best practices.</div>
            </div>
            <div class="value-card fade-up" style="transition-delay:0.3s;">
                <div class="value-icon">🌱</div>
                <div class="value-title">Growth</div>
                <div class="value-desc">Steady expansion of customer base and turnover since incorporation in 2000.</div>
            </div>
            <div class="value-card fade-up" style="transition-delay:0.1s;">
                <div class="value-icon">✅</div>
                <div class="value-title">Quality</div>
                <div class="value-desc">Products procured from cost-efficient manufacturers without ever compromising on quality.</div>
            </div>
            <div class="value-card fade-up" style="transition-delay:0.2s;">
                <div class="value-icon">🌐</div>
                <div class="value-title">Global Reach</div>
                <div class="value-desc">Serving both domestic and international markets with tailored solutions.</div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

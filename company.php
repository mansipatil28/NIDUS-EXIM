<?php
$page_title  = 'Company Details';
$active_page = 'company';
include 'header.php';
?>

<style>
.detail-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}
.detail-card {
    background: white;
    border-radius: var(--radius-lg);
    padding: 2rem;
    box-shadow: var(--shadow-sm);
    border: 1.5px solid var(--gray-100);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}
.detail-card::before {
    content: '';
    position: absolute; top:0; left:0; right:0;
    height: 4px;
    background: var(--purple);
}
.detail-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); border-color: var(--purple-light); }
.detail-icon {
    width: 52px; height: 52px;
    background: var(--purple);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.4rem;
    margin-bottom: 1rem;
    box-shadow: 0 6px 18px rgba(142,68,173,0.25);
}
.detail-card h3 {
    font-family: var(--font-display);
    font-size: 1.3rem;
    color: var(--purple);
    margin-bottom: 1rem;
    font-weight: 700;
}
.detail-card p, .detail-card li {
    font-size: 0.92rem;
    color: var(--gray-600);
    line-height: 1.8;
    margin-bottom: 0.6rem;
}
.detail-card strong { color: var(--gray-900); font-weight: 600; }
.detail-card ul { padding-left: 1.25rem; }
.address-box {
    background: var(--purple-fade);
    border-left: 4px solid var(--purple);
    border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
    padding: 1rem 1.25rem;
    margin: 0.75rem 0;
    font-size: 0.9rem;
    color: var(--gray-900);
    line-height: 1.9;
}
.stat-pair {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-top: 1rem;
}
.stat-box {
    text-align: center;
    background: var(--purple-fade);
    border-radius: var(--radius-sm);
    padding: 1rem;
}
.stat-box .num {
    font-family: var(--font-display);
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--purple);
    display: block;
}
.stat-box .lbl { font-size: 0.78rem; color: var(--gray-600); margin-top: 2px; }
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1585842378054-ee2e52f94ba2?w=1920&q=85');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content fade-up">
        <div class="breadcrumb"><a href="index.php" style="color:inherit;">Home</a> / <span>Company Details</span></div>
        <h1>Company Details</h1>
        <p>Transparent information about who we are and how we operate</p>
    </div>
</div>

<!-- DETAILS GRID -->
<section class="section photo-section" style="background-image:url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1920&q=80');background-size:cover;">
    <div style="position:absolute;inset:0;background:rgba(250,248,252,0.93);"></div>
    <div class="container">
        <div class="section-label">At a Glance</div>
        <h2 class="section-title">Company Information</h2>
        <div class="section-title-bar"></div>

        <div class="detail-grid">

            <div class="detail-card fade-up">
                <div class="detail-icon">🏢</div>
                <h3>Company Information</h3>
                <p><strong>Incorporation:</strong> 18th April 2000 as a Private Limited company</p>
                <p><strong>Nature of Business:</strong> Manufacturing &amp; Trading activities in Pharmaceuticals, Surgical, Medical &amp; Laboratory equipments &amp; Setups, Turnkey Project Setups Both in Domestic and International market.</p>
                <p><strong>Key Personnel:</strong> Mr. Vishwambhar Shedge (Managing Director)</p>
            </div>

            <div class="detail-card fade-up" style="transition-delay:0.1s;">
                <div class="detail-icon">📍</div>
                <h3>Office Location</h3>
                <p><strong>Registered &amp; Admin Office:</strong></p>
                <div class="address-box">
                    63/2 B, FLAT NO. 36, 4TH FLOOR,<br>
                    INDRALOK APTS., PUNE SATARA ROAD,<br>
                    ABOVE BANK OF BARODA, NEAR D'MART,<br>
                    PARVATI, PUNE 411009,<br>
                    MAHARASHTRA - INDIA
                </div>
            </div>

            <div class="detail-card fade-up" style="transition-delay:0.2s;">
                <div class="detail-icon">💪</div>
                <h3>Our Strength</h3>
                <div class="highlight-box">
                    <p><strong>Young experienced and committed professionals as Director with an ambition to achieve higher goals.</strong></p>
                </div>
                <div class="stat-pair">
                    <div class="stat-box"><span class="num">20</span><span class="lbl">Marketing Personnel</span></div>
                    <div class="stat-box"><span class="num">24+</span><span class="lbl">Years Experience</span></div>
                </div>
            </div>

            <div class="detail-card fade-up" style="transition-delay:0.1s;">
                <div class="detail-icon">🏭</div>
                <h3>Infrastructure</h3>
                <p><strong>Godown:</strong> Ample space of Godown for keeping stock in well condition as per Indian FDA standards.</p>
                <p><strong>Field Staff:</strong> 20 young qualified personnel for marketing operations.</p>
                <div class="highlight-box">
                    <p><strong>Quality Assurance:</strong> All storage facilities maintain FDA compliance standards.</p>
                </div>
            </div>

            <div class="detail-card fade-up" style="transition-delay:0.2s;">
                <div class="detail-icon">🌐</div>
                <h3>Distribution Network</h3>
                <p><strong>Major Government Supplier:</strong></p>
                <ul>
                    <li>Government of Maharashtra</li>
                    <li>Government of Madhya Pradesh</li>
                </ul>
                <div class="highlight-box">
                    <p><strong>Growth:</strong> Since incorporation we have maintained a steady growth in turnover and expansion of customer base.</p>
                </div>
            </div>

            <div class="detail-card fade-up" style="transition-delay:0.3s;">
                <div class="detail-icon">📈</div>
                <h3>Track Record</h3>
                <p><strong>Established:</strong> Since 2000</p>
                <p><strong>Market Presence:</strong> Both Domestic and International markets</p>
                <p><strong>Specialization:</strong> Turnkey Project Setups for Healthcare facilities</p>
                <div class="highlight-box">
                    <p><strong>Consistent Performance:</strong> Steady growth and expanding customer base since inception.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

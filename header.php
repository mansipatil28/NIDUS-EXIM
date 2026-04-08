<?php
// header.php — shared across all pages
// Usage: include 'header.php'; at top of each page
// $page_title and $active_page should be set before including this file.
$page_title  = $page_title  ?? 'NIDUS EXIM Pvt. Ltd.';
$active_page = $active_page ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?> — NIDUS EXIM Pvt. Ltd.</title>

    <!-- Google Fonts: Cormorant Garamond (display) + DM Sans (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
    /* ── DESIGN TOKENS ─────────────────────────────────────────────── */
    :root {
        --purple:       #8e44ad;
        --purple-dark:  #6c3483;
        --purple-light: #d2b4de;
        --purple-fade:  rgba(142,68,173,0.08);
        --white:        #ffffff;
        --off-white:    #faf8fc;
        --gray-100:     #f4f0f8;
        --gray-300:     #d5cade;
        --gray-600:     #7a6a8a;
        --gray-900:     #1e1428;
        --radius-sm:    8px;
        --radius-md:    14px;
        --radius-lg:    22px;
        --shadow-sm:    0 4px 16px rgba(142,68,173,0.10);
        --shadow-md:    0 10px 32px rgba(142,68,173,0.18);
        --shadow-lg:    0 20px 56px rgba(142,68,173,0.22);
        --transition:   all 0.3s cubic-bezier(.4,0,.2,1);
        --font-display: 'Cormorant Garamond', Georgia, serif;
        --font-body:    'DM Sans', system-ui, sans-serif;
    }

    /* ── RESET ─────────────────────────────────────────────────────── */
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    html { scroll-behavior: smooth; }
    body {
        font-family: var(--font-body);
        color: var(--gray-900);
        background: var(--off-white);
        line-height: 1.7;
        -webkit-font-smoothing: antialiased;
    }
    img { display: block; max-width: 100%; }
    a { color: inherit; text-decoration: none; }

    /* ── HEADER / NAV ──────────────────────────────────────────────── */
    .site-header {
        position: fixed;
        top: 0; left: 0; right: 0;
        z-index: 1000;
        background: rgba(142,68,173,0.97);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 2px 24px rgba(110,40,140,0.25);
        transition: var(--transition);
    }
    .nav-wrap {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 70px;
    }
    .logo {
        display: flex;
        align-items: center;
        gap: 12px;
        font-family: var(--font-display);
        font-size: 1.45rem;
        font-weight: 700;
        color: white;
        letter-spacing: 0.3px;
    }
    .logo-badge {
        width: 40px; height: 40px;
        background: white;
        border-radius: var(--radius-sm);
        display: flex; align-items: center; justify-content: center;
        font-weight: 900;
        font-size: 0.75rem;
        color: var(--purple);
        letter-spacing: 0.5px;
        line-height: 1.1;
        text-align: center;
        padding: 4px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    .nav-links {
        display: flex;
        list-style: none;
        gap: 2px;
        align-items: center;
    }
    .nav-links a {
        display: block;
        padding: 8px 14px;
        border-radius: 30px;
        color: rgba(255,255,255,0.88);
        font-size: 0.875rem;
        font-weight: 500;
        letter-spacing: 0.2px;
        transition: var(--transition);
        white-space: nowrap;
    }
    .nav-links a:hover,
    .nav-links a.active {
        background: rgba(255,255,255,0.15);
        color: white;
    }
    .nav-links .nav-cta a {
        background: rgba(255,255,255,0.18);
        border: 1px solid rgba(255,255,255,0.35);
        color: white;
    }
    .nav-links .nav-cta a:hover {
        background: white;
        color: var(--purple);
    }

    /* Mobile hamburger */
    .hamburger {
        display: none;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
        padding: 6px;
        background: none;
        border: none;
    }
    .hamburger span {
        display: block;
        width: 24px; height: 2px;
        background: white;
        border-radius: 2px;
        transition: var(--transition);
    }
    .mobile-menu {
        display: none;
        background: var(--purple-dark);
        padding: 16px 28px 24px;
    }
    .mobile-menu.open { display: block; }
    .mobile-menu a {
        display: block;
        padding: 12px 0;
        color: rgba(255,255,255,0.9);
        font-size: 1rem;
        border-bottom: 1px solid rgba(255,255,255,0.12);
        transition: var(--transition);
    }
    .mobile-menu a:last-child { border: none; }
    .mobile-menu a:hover, .mobile-menu a.active { color: white; padding-left: 8px; }

    /* ── SHARED PAGE HERO BANNER ───────────────────────────────────── */
    .page-hero {
        padding: 130px 0 70px;
        position: relative;
        overflow: hidden;
        text-align: center;
        background: var(--purple);
    }
    .page-hero-bg {
        position: absolute; inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0.28;
        transition: transform 8s ease;
    }
    .page-hero:hover .page-hero-bg { transform: scale(1.04); }
    .page-hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(160deg, rgba(110,40,140,0.65) 0%, rgba(52,1,75,0.55) 100%);
    }
    .page-hero-content {
        position: relative; z-index: 2;
        max-width: 780px; margin: 0 auto; padding: 0 28px;
    }
    .page-hero h1 {
        font-family: var(--font-display);
        font-size: clamp(2.2rem, 5vw, 3.6rem);
        font-weight: 700;
        color: white;
        line-height: 1.15;
        margin-bottom: 1rem;
        text-shadow: 0 2px 12px rgba(0,0,0,0.25);
    }
    .page-hero p {
        font-size: 1.15rem;
        color: rgba(255,255,255,0.88);
        font-weight: 300;
    }
    .breadcrumb {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.82rem;
        color: rgba(255,255,255,0.65);
        margin-bottom: 1rem;
    }
    .breadcrumb span { color: rgba(255,255,255,0.9); }

    /* ── SECTION BASE ──────────────────────────────────────────────── */
    .section { padding: 90px 0; position: relative; }
    .section-bg-light { background: var(--off-white); }
    .section-bg-white { background: white; }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 28px;
        position: relative;
        z-index: 1;
    }
    .section-label {
        text-align: center;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--purple);
        margin-bottom: 0.75rem;
    }
    .section-title {
        text-align: center;
        font-family: var(--font-display);
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 1rem;
    }
    .section-title-bar {
        width: 56px; height: 4px;
        background: var(--purple);
        border-radius: 2px;
        margin: 0 auto 3rem;
    }
    .section-intro {
        text-align: center;
        max-width: 640px;
        margin: 0 auto 3rem;
        color: var(--gray-600);
        font-size: 1.05rem;
        font-weight: 300;
        line-height: 1.8;
    }

    /* ── CARDS ─────────────────────────────────────────────────────── */
    .card {
        background: white;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        border: 1.5px solid var(--gray-100);
        transition: var(--transition);
        overflow: hidden;
        position: relative;
    }
    .card::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0;
        height: 4px;
        background: var(--purple);
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--purple-light);
    }
    .card-body { padding: 2rem 2rem 2rem; }

    /* ── PHOTO BACKGROUND SECTIONS ─────────────────────────────────── */
    .photo-section {
        position: relative;
        overflow: hidden;
    }
    .photo-section-bg {
        position: absolute; inset: 0;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    .photo-section-overlay {
        position: absolute; inset: 0;
        background: rgba(255,255,255,0.91);
    }

    /* ── FADE IN ANIMATION ─────────────────────────────────────────── */
    .fade-up {
        opacity: 0;
        transform: translateY(36px);
        transition: opacity 0.65s ease, transform 0.65s ease;
    }
    .fade-up.visible {
        opacity: 1;
        transform: none;
    }

    /* ── BUTTONS ───────────────────────────────────────────────────── */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 30px;
        border-radius: 40px;
        font-family: var(--font-body);
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        border: 2px solid transparent;
        white-space: nowrap;
    }
    .btn-primary {
        background: var(--purple);
        color: white;
    }
    .btn-primary:hover {
        background: var(--purple-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    .btn-outline {
        background: transparent;
        color: var(--purple);
        border-color: var(--purple);
    }
    .btn-outline:hover {
        background: var(--purple);
        color: white;
        transform: translateY(-2px);
    }
    .btn-white {
        background: white;
        color: var(--purple);
    }
    .btn-white:hover {
        background: var(--purple);
        color: white;
    }

    /* ── HIGHLIGHT BOX ─────────────────────────────────────────────── */
    .highlight-box {
        background: var(--purple-fade);
        border-left: 4px solid var(--purple);
        border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
        padding: 1rem 1.25rem;
        margin: 1rem 0;
        color: var(--gray-900);
        font-size: 0.95rem;
    }

    /* ── RESPONSIVE ────────────────────────────────────────────────── */
    @media (max-width: 900px) {
        .nav-links { display: none; }
        .hamburger { display: flex; }
    }
    @media (max-width: 600px) {
        .section { padding: 64px 0; }
        .container { padding: 0 18px; }
    }
    </style>
</head>
<body>

<header class="site-header" id="site-header">
    <div class="nav-wrap">
        <a href="index.php" class="logo">
            <div class="logo-badge">NIDUS<br>EXIM</div>
            <span>NIDUS EXIM Pvt. Ltd.</span>
        </a>

        <nav>
            <ul class="nav-links">
                <li><a href="index.php"       class="<?= $active_page==='home'      ?'active':'' ?>">Home</a></li>
                <li><a href="services.php"    class="<?= $active_page==='services'  ?'active':'' ?>">Services</a></li>
                <li><a href="about.php"       class="<?= $active_page==='about'     ?'active':'' ?>">About</a></li>
                <li><a href="mission.php"     class="<?= $active_page==='mission'   ?'active':'' ?>">Mission &amp; Vision</a></li>
                <li><a href="directors.php"   class="<?= $active_page==='directors' ?'active':'' ?>">Directors</a></li>
                <li><a href="company.php"     class="<?= $active_page==='company'   ?'active':'' ?>">Company Details</a></li>
                <li class="nav-cta"><a href="contact.php" class="<?= $active_page==='contact'  ?'active':'' ?>">Contact Us</a></li>
            </ul>
            <button class="hamburger" id="hamburger" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </nav>
    </div>

    <!-- Mobile menu -->
    <div class="mobile-menu" id="mobile-menu">
        <a href="index.php"     class="<?= $active_page==='home'      ?'active':'' ?>">Home</a>
        <a href="services.php"  class="<?= $active_page==='services'  ?'active':'' ?>">Services</a>
        <a href="about.php"     class="<?= $active_page==='about'     ?'active':'' ?>">About Us</a>
        <a href="mission.php"   class="<?= $active_page==='mission'   ?'active':'' ?>">Mission &amp; Vision</a>
        <a href="directors.php" class="<?= $active_page==='directors' ?'active':'' ?>">Directors</a>
        <a href="company.php"   class="<?= $active_page==='company'   ?'active':'' ?>">Company Details</a>
        <a href="contact.php"   class="<?= $active_page==='contact'   ?'active':'' ?>">Contact Us</a>
    </div>
</header>

<script>
// Mobile menu toggle
document.getElementById('hamburger').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('open');
});
// Fade-up on scroll
const _observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1, rootMargin: '0px 0px -48px 0px' });
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.fade-up').forEach(el => _observer.observe(el));
});
</script>

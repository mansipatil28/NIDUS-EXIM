<?php
$page_title  = 'Contact Us';
$active_page = 'contact';
include 'header.php';

// Flash message from redirect
$success = $_GET['success'] ?? null;
$error   = $_GET['error']   ?? null;
?>

<style>
.contact-layout {
    display: grid;
    grid-template-columns: 1fr 1.4fr;
    gap: 4rem;
    align-items: flex-start;
    margin-top: 3rem;
}
.contact-info-card {
    background: var(--purple);
    border-radius: var(--radius-lg);
    padding: 2.5rem;
    color: white;
    position: relative;
    overflow: hidden;
}
.contact-info-card-bg {
    position: absolute; inset: 0;
    background-image: url('https://images.unsplash.com/photo-1581093196867-ca0956a3b4eb?w=600&q=75');
    background-size: cover;
    background-position: center;
    opacity: 0.18;
}
.contact-info-card > * { position: relative; z-index: 1; }
.contact-info-card h3 {
    font-family: var(--font-display);
    font-size: 1.7rem;
    margin-bottom: 1.5rem;
    font-weight: 700;
}
.contact-detail {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 1rem 0;
    border-bottom: 1px solid rgba(255,255,255,0.15);
}
.contact-detail:last-of-type { border: none; }
.contact-icon-wrap {
    width: 40px; height: 40px; min-width: 40px;
    background: rgba(255,255,255,0.15);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem;
}
.contact-detail-text { font-size: 0.9rem; line-height: 1.7; opacity: 0.9; }
.contact-detail-title { font-weight: 600; font-size: 0.78rem; letter-spacing: 1px; text-transform: uppercase; opacity: 0.65; margin-bottom: 2px; }

/* Form */
.form-card {
    background: white;
    border-radius: var(--radius-lg);
    padding: 2.5rem;
    box-shadow: var(--shadow-md);
    border: 1.5px solid var(--gray-100);
}
.form-card h3 {
    font-family: var(--font-display);
    font-size: 1.6rem;
    color: var(--purple);
    margin-bottom: 0.5rem;
    font-weight: 700;
}
.form-card p { color: var(--gray-600); font-size: 0.92rem; margin-bottom: 1.75rem; }

.form-group { margin-bottom: 1.25rem; }
.form-group label {
    display: block;
    font-size: 0.82rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    color: var(--gray-900);
    margin-bottom: 6px;
}
.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid var(--gray-300);
    border-radius: var(--radius-sm);
    font-family: var(--font-body);
    font-size: 0.95rem;
    color: var(--gray-900);
    background: var(--off-white);
    transition: var(--transition);
    outline: none;
}
.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--purple);
    background: white;
    box-shadow: 0 0 0 3px rgba(142,68,173,0.1);
}
.form-group textarea { min-height: 130px; resize: vertical; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

.submit-btn {
    width: 100%;
    padding: 14px;
    background: var(--purple);
    color: white;
    border: none;
    border-radius: 40px;
    font-family: var(--font-body);
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    margin-top: 0.5rem;
}
.submit-btn:hover {
    background: var(--purple-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Alert messages */
.alert {
    padding: 14px 18px;
    border-radius: var(--radius-sm);
    font-size: 0.93rem;
    margin-bottom: 1.25rem;
    display: flex;
    align-items: center;
    gap: 10px;
}
.alert-success { background: #e8f5e9; border: 1px solid #a5d6a7; color: #1b5e20; }
.alert-error   { background: #ffebee; border: 1px solid #ef9a9a; color: #b71c1c; }

@media(max-width:768px) {
    .contact-layout { grid-template-columns:1fr; gap:2rem; }
    .form-row { grid-template-columns:1fr; }
}
</style>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="page-hero-bg" style="background-image:url('https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=1920&q=85');"></div>
    <div class="page-hero-overlay"></div>
    <div class="page-hero-content fade-up">
        <div class="breadcrumb"><a href="index.php" style="color:inherit;">Home</a> / <span>Contact</span></div>
        <h1>Get In Touch</h1>
        <p>We'd love to hear from you. Send us an enquiry and we'll respond promptly.</p>
    </div>
</div>

<!-- CONTACT SECTION -->
<section class="section photo-section" style="background-image:url('https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=1920&q=80');background-size:cover;">
    <div style="position:absolute;inset:0;background:rgba(250,248,252,0.93);"></div>
    <div class="container">
        <div class="contact-layout">

            <!-- Info Panel -->
            <div class="contact-info-card fade-up">
                <div class="contact-info-card-bg"></div>
                <h3>Contact Information</h3>

                <div class="contact-detail">
                    <div class="contact-icon-wrap">📍</div>
                    <div class="contact-detail-text">
                        <div class="contact-detail-title">Address</div>
                        63/2 B, Flat No. 36, 4th Floor,
                        Indralok Apts., Pune Satara Road,
                        Parvati, Pune 411009, Maharashtra, India
                    </div>
                </div>
                <div class="contact-detail">
                    <div class="contact-icon-wrap">📞</div>
                    <div class="contact-detail-text">
                        <div class="contact-detail-title">Phone</div>
                        +91 (XXX) XXX-XXXX
                    </div>
                </div>
                <div class="contact-detail">
                    <div class="contact-icon-wrap">✉️</div>
                    <div class="contact-detail-text">
                        <div class="contact-detail-title">Email</div>
                        info@niduseximpvtltd.com
                    </div>
                </div>
                <div class="contact-detail">
                    <div class="contact-icon-wrap">🌐</div>
                    <div class="contact-detail-text">
                        <div class="contact-detail-title">Website</div>
                        www.niduseximpvtltd.com
                    </div>
                </div>

                <div style="margin-top:2rem;">
                    <div style="font-size:0.75rem;letter-spacing:2px;text-transform:uppercase;opacity:0.65;margin-bottom:1rem;">Business Hours</div>
                    <p style="font-size:0.88rem;opacity:0.9;line-height:2;">
                        Monday – Friday: 9:00 AM – 6:00 PM<br>
                        Saturday: 10:00 AM – 4:00 PM<br>
                        Sunday: Closed
                    </p>
                </div>
            </div>

            <!-- Form Panel -->
            <div class="form-card fade-up" style="transition-delay:0.15s;">
                <h3>Send Us a Message</h3>
                <p>Fill in the form below and our team will get back to you shortly.</p>

                <?php if ($success): ?>
                <div class="alert alert-success">✅ Thank you! Your message has been received. We'll get back to you soon.</div>
                <?php elseif ($error): ?>
                <div class="alert alert-error">❌ <?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form action="submit_contact.php" method="POST" id="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" placeholder="Your full name" required maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" placeholder="your@email.com" required maxlength="150">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" placeholder="Describe your project or enquiry..." required maxlength="2000"></textarea>
                    </div>
                    <button type="submit" class="submit-btn" id="submit-btn">
                        Send Message ✉️
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<script>
document.getElementById('contact-form').addEventListener('submit', function() {
    const btn = document.getElementById('submit-btn');
    btn.textContent = 'Sending…';
    btn.disabled = true;
});
</script>

<?php include 'footer.php'; ?>

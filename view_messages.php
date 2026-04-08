<?php
// view_messages.php — password-protected admin panel for enquiries
session_start();
require 'db.php';

// ── Simple session-based auth ────────────────────────────────────────────────
define('ADMIN_PASSWORD', 'admin@nidus123');   // Change this in production!

$logout = $_GET['logout'] ?? false;
if ($logout) { session_destroy(); header('Location: view_messages.php'); exit; }

$login_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_pass'])) {
    if ($_POST['admin_pass'] === ADMIN_PASSWORD) {
        $_SESSION['nidus_admin'] = true;
        header('Location: view_messages.php');
        exit;
    } else {
        $login_error = 'Incorrect password.';
    }
}

$is_auth = $_SESSION['nidus_admin'] ?? false;

// ── Actions (only when authenticated) ───────────────────────────────────────
if ($is_auth) {
    if (isset($_GET['mark_read'])) {
        $stmt = $pdo->prepare('UPDATE contact_messages SET status="read" WHERE id=:id');
        $stmt->execute([':id' => (int)$_GET['mark_read']]);
        header('Location: view_messages.php');
        exit;
    }
    if (isset($_GET['delete'])) {
        $stmt = $pdo->prepare('DELETE FROM contact_messages WHERE id=:id');
        $stmt->execute([':id' => (int)$_GET['delete']]);
        header('Location: view_messages.php');
        exit;
    }
    if (isset($_GET['delete_all'])) {
        $pdo->exec('DELETE FROM contact_messages');
        header('Location: view_messages.php');
        exit;
    }

    // Fetch stats
    $total   = $pdo->query('SELECT COUNT(*) FROM contact_messages')->fetchColumn();
    $new_cnt = $pdo->query('SELECT COUNT(*) FROM contact_messages WHERE status="new"')->fetchColumn();
    $read_cnt= $pdo->query('SELECT COUNT(*) FROM contact_messages WHERE status="read"')->fetchColumn();

    // Search / filter
    $search  = trim($_GET['search'] ?? '');
    $filter  = $_GET['filter'] ?? 'all';
    $page    = max(1, (int)($_GET['page'] ?? 1));
    $per     = 10;
    $offset  = ($page - 1) * $per;

    $where = '1=1';
    $params = [];
    if ($search) {
        $where  .= ' AND (name LIKE :s OR email LIKE :s2 OR message LIKE :s3)';
        $params[':s'] = $params[':s2'] = $params[':s3'] = '%' . $search . '%';
    }
    if ($filter === 'new')  { $where .= ' AND status="new"'; }
    if ($filter === 'read') { $where .= ' AND status="read"'; }

    $count_stmt = $pdo->prepare("SELECT COUNT(*) FROM contact_messages WHERE $where");
    $count_stmt->execute($params);
    $filtered_total = $count_stmt->fetchColumn();
    $pages = max(1, ceil($filtered_total / $per));

    $stmt = $pdo->prepare("SELECT * FROM contact_messages WHERE $where ORDER BY submitted_at DESC LIMIT :lim OFFSET :off");
    foreach ($params as $k => $v) $stmt->bindValue($k, $v);
    $stmt->bindValue(':lim', $per, PDO::PARAM_INT);
    $stmt->bindValue(':off', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — NIDUS EXIM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
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
        --font-display: 'Cormorant Garamond', Georgia, serif;
        --font-body:    'DM Sans', system-ui, sans-serif;
    }
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    body {
        font-family: var(--font-body);
        background: var(--off-white);
        color: var(--gray-900);
        min-height: 100vh;
        -webkit-font-smoothing: antialiased;
    }

    /* ── TOP BAR ── */
    .topbar {
        background: var(--purple);
        color: white;
        padding: 16px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 16px rgba(110,40,140,0.3);
    }
    .topbar-brand {
        display: flex; align-items: center; gap: 12px;
        font-family: var(--font-display); font-size: 1.35rem; font-weight: 700;
    }
    .topbar-badge {
        background: rgba(255,255,255,0.18);
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 6px;
        padding: 6px 10px;
        font-size: 0.72rem;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    .topbar-actions { display: flex; gap: 10px; align-items: center; }
    .btn-sm {
        padding: 7px 18px;
        border-radius: 20px;
        font-size: 0.82rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .btn-white-sm { background: white; color: var(--purple); border: none; }
    .btn-white-sm:hover { background: var(--gray-100); }
    .btn-ghost-sm { background: rgba(255,255,255,0.15); color: white; border: 1px solid rgba(255,255,255,0.3); }
    .btn-ghost-sm:hover { background: rgba(255,255,255,0.25); }
    .btn-danger-sm { background: #c0392b; color: white; border: none; }
    .btn-danger-sm:hover { background: #a93226; }

    /* ── LOGIN ── */
    .login-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url('https://images.unsplash.com/photo-1551190822-a9333d879b1f?w=1920&q=80');
        background-size: cover;
        background-position: center;
    }
    .login-overlay {
        position: fixed; inset: 0;
        background: rgba(40,0,60,0.78);
        z-index: 0;
    }
    .login-box {
        position: relative; z-index: 1;
        background: white;
        border-radius: var(--radius-lg);
        padding: 3rem 2.5rem;
        width: 100%; max-width: 420px;
        box-shadow: 0 30px 80px rgba(0,0,0,0.3);
        text-align: center;
    }
    .login-logo {
        width: 64px; height: 64px;
        background: var(--purple);
        border-radius: 16px;
        margin: 0 auto 1.5rem;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem;
    }
    .login-box h2 {
        font-family: var(--font-display);
        font-size: 1.9rem; color: var(--purple); margin-bottom: 0.4rem;
    }
    .login-box p { font-size: 0.88rem; color: var(--gray-600); margin-bottom: 2rem; }
    .login-box input {
        width: 100%; padding: 12px 16px;
        border: 1.5px solid var(--gray-300);
        border-radius: var(--radius-sm);
        font-family: var(--font-body); font-size: 1rem;
        margin-bottom: 1rem; outline: none;
        transition: all 0.2s;
    }
    .login-box input:focus { border-color: var(--purple); box-shadow: 0 0 0 3px rgba(142,68,173,0.12); }
    .login-box button {
        width: 100%; padding: 13px;
        background: var(--purple); color: white; border: none;
        border-radius: 40px; font-family: var(--font-body);
        font-size: 1rem; font-weight: 600; cursor: pointer;
        transition: all 0.2s;
    }
    .login-box button:hover { background: var(--purple-dark); }
    .login-error { color: #c0392b; font-size: 0.88rem; margin-bottom: 1rem; }
    .login-hint { font-size: 0.78rem; color: var(--gray-600); margin-top: 1.25rem; }

    /* ── DASHBOARD LAYOUT ── */
    .dashboard { display: grid; grid-template-columns: 240px 1fr; min-height: calc(100vh - 60px); }
    .sidebar {
        background: white;
        border-right: 1px solid var(--gray-100);
        padding: 1.5rem 1rem;
    }
    .sidebar-label {
        font-size: 0.7rem; letter-spacing: 2px; text-transform: uppercase;
        color: var(--gray-600); padding: 0 0.75rem; margin-bottom: 0.5rem;
        margin-top: 1.5rem;
    }
    .sidebar-label:first-child { margin-top: 0; }
    .sidebar-link {
        display: flex; align-items: center; gap: 10px;
        padding: 10px 12px; border-radius: var(--radius-sm);
        color: var(--gray-600); font-size: 0.9rem; font-weight: 500;
        text-decoration: none; transition: all 0.2s; cursor: pointer;
        border: none; background: none; width: 100%; text-align: left;
    }
    .sidebar-link:hover { background: var(--purple-fade); color: var(--purple); }
    .sidebar-link.active { background: var(--purple-fade); color: var(--purple); font-weight: 600; }
    .sidebar-link .badge {
        margin-left: auto; background: var(--purple); color: white;
        border-radius: 10px; font-size: 0.7rem; padding: 2px 7px; font-weight: 600;
    }

    /* ── MAIN CONTENT ── */
    .main { padding: 2rem; overflow-x: hidden; }
    .page-heading {
        font-family: var(--font-display); font-size: 1.9rem; font-weight: 700;
        color: var(--gray-900); margin-bottom: 0.3rem;
    }
    .page-sub { font-size: 0.88rem; color: var(--gray-600); margin-bottom: 2rem; }

    /* Stats */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 1.25rem;
        margin-bottom: 2rem;
    }
    .stat-card {
        background: white;
        border-radius: var(--radius-md);
        padding: 1.5rem 1.25rem;
        box-shadow: var(--shadow-sm);
        border: 1.5px solid var(--gray-100);
        text-align: center;
    }
    .stat-num { font-family: var(--font-display); font-size: 2.4rem; font-weight: 700; color: var(--purple); display: block; }
    .stat-label { font-size: 0.8rem; color: var(--gray-600); margin-top: 4px; }

    /* Search & Filter bar */
    .toolbar {
        display: flex; gap: 12px; align-items: center;
        flex-wrap: wrap; margin-bottom: 1.5rem;
    }
    .toolbar input {
        padding: 9px 14px;
        border: 1.5px solid var(--gray-300);
        border-radius: 40px; font-family: var(--font-body);
        font-size: 0.88rem; outline: none; flex: 1; min-width: 180px;
    }
    .toolbar input:focus { border-color: var(--purple); }
    .filter-tabs { display: flex; gap: 6px; }
    .filter-tab {
        padding: 8px 18px;
        border-radius: 40px; font-size: 0.82rem; font-weight: 600;
        cursor: pointer; transition: all 0.2s;
        text-decoration: none;
        border: 1.5px solid var(--gray-300);
        color: var(--gray-600);
    }
    .filter-tab.active, .filter-tab:hover {
        background: var(--purple); color: white; border-color: var(--purple);
    }

    /* Table */
    .table-wrap { background: white; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1.5px solid var(--gray-100); overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    thead th {
        background: var(--purple); color: white;
        padding: 13px 16px; text-align: left;
        font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px;
    }
    tbody tr { border-bottom: 1px solid var(--gray-100); transition: background 0.15s; }
    tbody tr:last-child { border: none; }
    tbody tr:hover { background: var(--purple-fade); }
    td { padding: 14px 16px; font-size: 0.88rem; color: var(--gray-900); vertical-align: top; }
    .td-truncate { max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .td-sub { font-size: 0.78rem; color: var(--gray-600); margin-top: 2px; }

    .badge-new  { display:inline-block; padding:3px 10px; border-radius:10px; font-size:0.72rem; font-weight:600; background:#e8f5e9; color:#1b5e20; }
    .badge-read { display:inline-block; padding:3px 10px; border-radius:10px; font-size:0.72rem; font-weight:600; background:#f3e5f5; color:#4a148c; }

    .action-link {
        display: inline-flex; align-items: center; gap: 4px;
        padding: 5px 12px; border-radius: 20px; font-size: 0.78rem; font-weight: 600;
        text-decoration: none; transition: all 0.2s; border: 1px solid;
    }
    .action-read  { color: var(--purple); border-color: var(--purple-light); }
    .action-read:hover  { background: var(--purple); color: white; border-color: var(--purple); }
    .action-delete { color: #c0392b; border-color: #f1a1a1; }
    .action-delete:hover { background: #c0392b; color: white; border-color: #c0392b; }

    /* Pagination */
    .pagination { display: flex; gap: 6px; justify-content: center; padding: 1.5rem; flex-wrap: wrap; }
    .pg-btn {
        padding: 7px 14px; border-radius: 8px;
        font-size: 0.85rem; font-weight: 500;
        text-decoration: none; color: var(--gray-600);
        border: 1.5px solid var(--gray-300);
        transition: all 0.2s;
    }
    .pg-btn:hover, .pg-btn.active { background: var(--purple); color: white; border-color: var(--purple); }

    .empty-state {
        text-align: center; padding: 4rem 2rem; color: var(--gray-600);
    }
    .empty-state-icon { font-size: 3rem; margin-bottom: 1rem; }

    @media(max-width:768px) {
        .dashboard { grid-template-columns: 1fr; }
        .sidebar { display: none; }
        .topbar { padding: 14px 18px; }
        .main { padding: 1.25rem; }
        td { padding: 10px 10px; }
    }
    </style>
</head>
<body>

<?php if (!$is_auth): ?>
<!-- ══ LOGIN PAGE ══════════════════════════════════════════════════════════ -->
<div class="login-page">
    <div class="login-overlay"></div>
    <div class="login-box">
        <div class="login-logo">🔐</div>
        <h2>Admin Login</h2>
        <p>NIDUS EXIM — Enquiry Management Portal</p>
        <?php if ($login_error): ?>
        <div class="login-error">⚠ <?= htmlspecialchars($login_error) ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="password" name="admin_pass" placeholder="Enter admin password" autofocus required>
            <button type="submit">Login →</button>
        </form>
        <div class="login-hint">Default password: <code>admin@nidus123</code></div>
    </div>
</div>

<?php else: ?>
<!-- ══ DASHBOARD ═══════════════════════════════════════════════════════════ -->

<!-- Top Bar -->
<div class="topbar">
    <div class="topbar-brand">
        <span>⚙️</span> NIDUS Admin Panel
        <span class="topbar-badge">Enquiry Management</span>
    </div>
    <div class="topbar-actions">
        <a href="index.php" class="btn-sm btn-ghost-sm">🌐 View Site</a>
        <a href="view_messages.php?logout=1" class="btn-sm btn-white-sm">Logout</a>
    </div>
</div>

<div class="dashboard">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-label">Menu</div>
        <a href="index.php"       class="sidebar-link">🏠 Back to Site</a>
        <a href="view_messages.php" class="sidebar-link active">
            📬 Enquiries
            <?php if ($new_cnt > 0): ?><span class="badge"><?= $new_cnt ?></span><?php endif; ?>
        </a>
        <a href="contact.php"     class="sidebar-link">✉️ Contact Page</a>

        <div class="sidebar-label">Filters</div>
        <a href="view_messages.php?filter=all"  class="sidebar-link <?= $filter==='all'  ?'active':'' ?>">📋 All (<?= $total ?>)</a>
        <a href="view_messages.php?filter=new"  class="sidebar-link <?= $filter==='new'  ?'active':'' ?>">🟢 New (<?= $new_cnt ?>)</a>
        <a href="view_messages.php?filter=read" class="sidebar-link <?= $filter==='read' ?'active':'' ?>">👁 Read (<?= $read_cnt ?>)</a>

        <div class="sidebar-label">Actions</div>
        <a href="view_messages.php?delete_all=1"
           class="sidebar-link"
           onclick="return confirm('Delete ALL enquiries? This cannot be undone.')"
           style="color:#c0392b;">🗑 Clear All</a>
    </aside>

    <!-- Main -->
    <main class="main">
        <div class="page-heading">📬 All Enquiries</div>
        <div class="page-sub">Manage and review contact form submissions from your website visitors.</div>

        <!-- Stats -->
        <div class="stats-row">
            <div class="stat-card">
                <span class="stat-num"><?= $total ?></span>
                <div class="stat-label">Total Enquiries</div>
            </div>
            <div class="stat-card">
                <span class="stat-num" style="color:#1b5e20;"><?= $new_cnt ?></span>
                <div class="stat-label">New / Unread</div>
            </div>
            <div class="stat-card">
                <span class="stat-num"><?= $read_cnt ?></span>
                <div class="stat-label">Read</div>
            </div>
            <div class="stat-card">
                <span class="stat-num"><?= $filtered_total ?></span>
                <div class="stat-label">Showing (filtered)</div>
            </div>
        </div>

        <!-- Search & Filter -->
        <form method="GET" class="toolbar">
            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="🔍 Search by name, email or message…">
            <input type="hidden" name="filter" value="<?= htmlspecialchars($filter) ?>">
            <button class="btn-sm btn-white-sm" type="submit" style="color:var(--purple);border:1.5px solid var(--purple-light);background:white;border-radius:40px;cursor:pointer;">Search</button>
            <?php if ($search): ?>
            <a href="view_messages.php" class="btn-sm btn-ghost-sm" style="color:var(--gray-600);border:1.5px solid var(--gray-300);border-radius:40px;text-decoration:none;">Clear</a>
            <?php endif; ?>
        </form>

        <!-- Table -->
        <div class="table-wrap">
            <?php if (empty($rows)): ?>
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <p>No enquiries found<?= $search ? ' matching "<strong>'.htmlspecialchars($search).'</strong>"' : '' ?>.</p>
            </div>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th style="width:40px;">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                    <tr>
                        <td style="color:var(--gray-600);"><?= $row['id'] ?></td>
                        <td>
                            <strong><?= htmlspecialchars($row['name']) ?></strong>
                        </td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td>
                            <div class="td-truncate" title="<?= htmlspecialchars($row['message']) ?>">
                                <?= htmlspecialchars(mb_strimwidth($row['message'], 0, 90, '…')) ?>
                            </div>
                        </td>
                        <td>
                            <div><?= date('d M Y', strtotime($row['submitted_at'])) ?></div>
                            <div class="td-sub"><?= date('H:i', strtotime($row['submitted_at'])) ?></div>
                        </td>
                        <td>
                            <span class="badge-<?= $row['status'] ?>"><?= ucfirst($row['status']) ?></span>
                        </td>
                        <td style="white-space:nowrap;">
                            <?php if ($row['status'] === 'new'): ?>
                            <a href="view_messages.php?mark_read=<?= $row['id'] ?>&filter=<?= $filter ?>&search=<?= urlencode($search) ?>"
                               class="action-link action-read">✓ Mark Read</a>
                            &nbsp;
                            <?php endif; ?>
                            <a href="view_messages.php?delete=<?= $row['id'] ?>&filter=<?= $filter ?>&search=<?= urlencode($search) ?>"
                               class="action-link action-delete"
                               onclick="return confirm('Delete this enquiry?')">🗑</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php if ($pages > 1): ?>
            <div class="pagination">
                <?php for ($p = 1; $p <= $pages; $p++): ?>
                <a href="?page=<?= $p ?>&filter=<?= $filter ?>&search=<?= urlencode($search) ?>"
                   class="pg-btn <?= $p === $page ? 'active' : '' ?>"><?= $p ?></a>
                <?php endfor; ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>

</div><!-- /dashboard -->

<?php endif; ?>

</body>
</html>

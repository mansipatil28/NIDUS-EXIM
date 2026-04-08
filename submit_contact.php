<?php
// submit_contact.php — handles POST from contact.php
// Uses PDO prepared statements to prevent SQL injection

require 'db.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// Sanitize & validate input
$name    = trim(strip_tags($_POST['name']    ?? ''));
$email   = trim(strip_tags($_POST['email']   ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

if (empty($name) || empty($email) || empty($message)) {
    header('Location: contact.php?error=' . urlencode('All fields are required.'));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contact.php?error=' . urlencode('Please enter a valid email address.'));
    exit;
}

if (strlen($name) > 100 || strlen($email) > 150 || strlen($message) > 2000) {
    header('Location: contact.php?error=' . urlencode('Input exceeds maximum length.'));
    exit;
}

// Insert using prepared statement (safe from SQL injection)
try {
    $stmt = $pdo->prepare(
        'INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)'
    );
    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':message' => $message,
    ]);
    header('Location: contact.php?success=1');
} catch (PDOException $e) {
    error_log('Insert failed: ' . $e->getMessage());
    header('Location: contact.php?error=' . urlencode('Could not save your message. Please try again.'));
}
exit;
?>

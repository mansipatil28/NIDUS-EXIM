-- NIDUS EXIM Pvt. Ltd. — Database Setup
-- Run this file once in phpMyAdmin or MySQL CLI: source nidus_exim_db.sql

CREATE DATABASE IF NOT EXISTS nidus_exim_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE nidus_exim_db;

CREATE TABLE IF NOT EXISTS contact_messages (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100)  NOT NULL,
    email       VARCHAR(150)  NOT NULL,
    message     TEXT          NOT NULL,
    status      ENUM('new','read') DEFAULT 'new',
    submitted_at DATETIME     DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Optional: seed one demo row so the admin view is never empty
INSERT INTO contact_messages (name, email, message, status)
VALUES ('Demo User', 'demo@example.com', 'This is a sample enquiry.', 'read');

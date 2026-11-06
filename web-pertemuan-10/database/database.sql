-- Web Programming 1 - Sesi 10 (CRUD Media)
-- Jalankan di phpMyAdmin (tab SQL).

CREATE DATABASE IF NOT EXISTS web_programming_1;
USE web_programming_1;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    program_studi VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    angkatan YEAR NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sesi 10 - Step 3: kolom referensi media (nullable agar data lama tetap valid)
ALTER TABLE mahasiswa
ADD foto VARCHAR(255) NULL,
ADD audio VARCHAR(255) NULL,
ADD dokumen VARCHAR(255) NULL;

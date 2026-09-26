-- Modul 3B - Jalankan di phpMyAdmin (tab SQL)

-- Step 6 - Buat database dan tabel
CREATE DATABASE IF NOT EXISTS web_programming_1;
USE web_programming_1;

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    program_studi VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    angkatan YEAR NOT NULL
);

-- Jika tabel sudah terlanjur dibuat tanpa kolom angkatan (Level 2), jalankan ini saja:
-- ALTER TABLE mahasiswa ADD angkatan YEAR NOT NULL DEFAULT 2023;

-- Step 7 + Level 2 - Data dummy (minimal 5 data)
INSERT INTO mahasiswa (nim, nama, program_studi, email, angkatan) VALUES
('230001', 'Andi', 'Informatika', 'andi@email.com', 2023),
('230002', 'Budi', 'Sistem Informasi', 'budi@email.com', 2023),
('230003', 'Citra', 'Informatika', 'citra@email.com', 2023),
('240005', 'Eka', 'Sistem Informasi', 'eka@email.com', 2024),
('240006', 'Fajar', 'Informatika', 'fajar@email.com', 2024),
('240007', 'Gita', 'Sistem Informasi', 'gita@email.com', 2024);

-- Cek data
SELECT * FROM mahasiswa;

-- Step 12 - Eksperimen: jalankan terpisah SETELAH halaman menampilkan data,
-- lalu refresh data_mahasiswa.php dan amati Dina muncul.
-- INSERT INTO mahasiswa (nim, nama, program_studi, email, angkatan)
-- VALUES ('230004', 'Dina', 'Informatika', 'dina@email.com', 2023);

<?php
// PHP 8.1+ melempar exception saat koneksi gagal; dimatikan agar pengecekan
// connect_error di bawah (sesuai modul) tetap menampilkan pesan yang jelas.
mysqli_report(MYSQLI_REPORT_OFF);

$conn = new mysqli("localhost", "root", "", "web_programming_1");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

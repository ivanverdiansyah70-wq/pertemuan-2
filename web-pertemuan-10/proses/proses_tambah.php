<?php
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../pages/form_mahasiswa.php");
    exit;
}

function kembali($pesan)
{
    header("Location: ../pages/form_mahasiswa.php?error=" . urlencode($pesan));
    exit;
}

$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$program_studi = trim($_POST["program_studi"] ?? "");
$email = trim($_POST["email"] ?? "");
$angkatan = (int) ($_POST["angkatan"] ?? 0);

if (
    $nim === "" ||
    $nama === "" ||
    $program_studi === "" ||
    $email === "" ||
    $angkatan === 0
) {
    kembali("Semua field wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    kembali("Format email tidak valid.");
}

$stmt = $conn->prepare(
    "INSERT INTO mahasiswa
    (nim, nama, program_studi, email, angkatan)
    VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssssi",
    $nim,
    $nama,
    $program_studi,
    $email,
    $angkatan
);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../pages/data_mahasiswa.php?status=sukses");
exit;

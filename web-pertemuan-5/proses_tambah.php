<?php

require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: form_mahasiswa.php");
    exit;
}

$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$program_studi = trim($_POST["program_studi"] ?? "");
$email = trim($_POST["email"] ?? "");
$angkatan = (int) trim($_POST["angkatan"] ?? "");

if (
    $nim === "" ||
    $nama === "" ||
    $program_studi === "" ||
    $email === "" ||
    $angkatan === 0
) {
    die("Semua field wajib diisi.");
}

$stmt = $conn->prepare(
    "INSERT INTO mahasiswa
    (nim, nama, program_studi, email, angkatan)
    VALUES (?, ?, ?, ?, ?)"
);

if (!$stmt) {
    die("Query gagal: " . $conn->error);
}

$stmt->bind_param(
    "ssssi",
    $nim,
    $nama,
    $program_studi,
    $email,
    $angkatan
);

if (!$stmt->execute()) {
    die("Gagal menyimpan data: " . $stmt->error);
}

$stmt->close();
$conn->close();

header("Location: data_mahasiswa.php?status=sukses");
exit;

?>

<?php
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../crud/index.php");
    exit;
}

$id = (int) ($_POST["id"] ?? 0);
$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$program_studi = trim($_POST["program_studi"] ?? "");
$email = trim($_POST["email"] ?? "");
$angkatan = (int) ($_POST["angkatan"] ?? 0);

function kembali($id, $pesan)
{
    header("Location: ../crud/edit.php?id=" . $id . "&error=" . urlencode($pesan));
    exit;
}

if ($id <= 0) {
    die("ID tidak valid.");
}

if ($nim === "" || $nama === "" || $program_studi === "" || $email === "" || $angkatan === 0) {
    kembali($id, "Semua field wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    kembali($id, "Format email tidak valid.");
}

$stmt = $conn->prepare(
    "UPDATE mahasiswa
     SET nim = ?, nama = ?, program_studi = ?, email = ?, angkatan = ?
     WHERE id = ?"
);
$stmt->bind_param("ssssii", $nim, $nama, $program_studi, $email, $angkatan, $id);

if (!$stmt->execute()) {
    kembali($id, "Data gagal diperbarui.");
}

$stmt->close();
$conn->close();

header("Location: ../crud/index.php?status=update");
exit;

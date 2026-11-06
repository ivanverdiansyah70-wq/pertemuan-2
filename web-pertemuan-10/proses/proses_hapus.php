<?php
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../config/koneksi.php";
require_once __DIR__ . "/../config/media_helper.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../crud/index.php");
    exit;
}

$id = (int) ($_POST["id"] ?? 0);
if ($id <= 0) {
    die("ID tidak valid.");
}

// Ambil nama file media dulu agar tidak ada orphan file jika record punya media.
// Kolom media baru ada setelah ALTER TABLE Sesi 10, jadi dicek dulu.
$adaMedia = $conn->query("SHOW COLUMNS FROM mahasiswa LIKE 'foto'")->num_rows > 0;
$kolom = $adaMedia ? "foto, audio, dokumen" : "id";

$stmtSelect = $conn->prepare("SELECT $kolom FROM mahasiswa WHERE id = ? LIMIT 1");
$stmtSelect->bind_param("i", $id);
$stmtSelect->execute();
$data = $stmtSelect->get_result()->fetch_assoc();
$stmtSelect->close();

if (!$data) {
    die("Data tidak ditemukan.");
}

$data += ["foto" => null, "audio" => null, "dokumen" => null];

$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    die("Data gagal dihapus dari database.");
}

$stmt->close();
$conn->close();

$rootUpload = __DIR__ . "/../uploads";
hapusMediaJikaAda($data["foto"], $rootUpload . "/images");
hapusMediaJikaAda($data["audio"], $rootUpload . "/audio");
hapusMediaJikaAda($data["dokumen"], $rootUpload . "/documents");

header("Location: ../crud/index.php?status=hapus");
exit;

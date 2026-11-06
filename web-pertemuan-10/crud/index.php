<?php
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../config/koneksi.php";

$result = $conn->query(
    "SELECT id, nim, nama, program_studi, email, angkatan
     FROM mahasiswa
     ORDER BY id DESC"
);

if (!$result) {
    die("Query gagal: " . $conn->error);
}

$status = $_GET["status"] ?? "";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
    <h1>CRUD Mahasiswa</h1>
    <p>Web Programming 1</p>
</header>

<nav>
    <a href="../pages/dashboard.php">Dashboard</a>
    <a href="../pages/index.php">Biodata</a>
    <a href="../pages/layout.php">Layout Lab</a>
    <a href="../pages/data_mahasiswa.php">Data Mahasiswa</a>
    <a href="../pages/form_mahasiswa.php">Tambah Mahasiswa</a>
    <a href="index.php">CRUD Mahasiswa</a>
    <a href="../crud-media/index.php">CRUD Media</a>
    <a href="../proses/logout.php">Logout</a>
</nav>

<main>
<section>
    <?php if ($status === "tambah"): ?>
        <div class="alert-success">Data mahasiswa berhasil ditambahkan.</div>
    <?php elseif ($status === "update"): ?>
        <div class="alert-success">Data mahasiswa berhasil diperbarui.</div>
    <?php elseif ($status === "hapus"): ?>
        <div class="alert-success">Data mahasiswa berhasil dihapus.</div>
    <?php endif; ?>

    <div class="crud-toolbar">
        <a class="btn" href="tambah.php">+ Tambah Mahasiswa</a>
    </div>

    <div class="table-scroll">
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Email</th>
                <th>Angkatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row["nim"]); ?></td>
                <td><?= htmlspecialchars($row["nama"]); ?></td>
                <td><?= htmlspecialchars($row["program_studi"]); ?></td>
                <td><?= htmlspecialchars($row["email"]); ?></td>
                <td><?= htmlspecialchars($row["angkatan"]); ?></td>
                <td class="actions">
                    <a href="edit.php?id=<?= (int) $row["id"]; ?>">Edit</a>
                    <form action="../proses/proses_hapus.php" method="POST"
                          onsubmit="return confirm('Data mahasiswa akan dihapus. Lanjutkan?');">
                        <input type="hidden" name="id" value="<?= (int) $row["id"]; ?>">
                        <button type="submit" class="btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    </div>
</section>
</main>
</body>
</html>

<?php
require_once __DIR__ . "/../config/auth.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah CRUD Mahasiswa</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/crud.js" defer></script>
</head>
<body>
<header>
    <h1>Tambah Mahasiswa</h1>
    <p>CRUD Mahasiswa</p>
</header>

<nav>
    <a href="../pages/dashboard.php">Dashboard</a>
    <a href="index.php">CRUD Mahasiswa</a>
    <a href="../crud-media/index.php">CRUD Media</a>
    <a href="../proses/logout.php">Logout</a>
</nav>

<main>
<section>
    <?php if (!empty($_GET["error"])): ?>
        <div class="alert-error"><?= htmlspecialchars($_GET["error"]); ?></div>
    <?php endif; ?>

    <form id="formMahasiswa" class="student-form" action="../proses/proses_crud_tambah.php" method="POST" novalidate>
        <label for="nim">NIM</label>
        <input id="nim" name="nim" type="text">
        <small class="form-error" id="errornim"></small>

        <label for="nama">Nama</label>
        <input id="nama" name="nama" type="text">
        <small class="form-error" id="errornama"></small>

        <label for="program_studi">Program Studi</label>
        <input id="program_studi" name="program_studi" type="text">
        <small class="form-error" id="errorprogram_studi"></small>

        <label for="email">Email</label>
        <input id="email" name="email" type="email">
        <small class="form-error" id="erroremail"></small>

        <label for="angkatan">Angkatan</label>
        <input id="angkatan" name="angkatan" type="number" min="2000" max="2100">
        <small class="form-error" id="errorangkatan"></small>

        <button type="submit">Simpan Data</button>
        <a href="index.php">Batal</a>
    </form>
</section>
</main>
</body>
</html>

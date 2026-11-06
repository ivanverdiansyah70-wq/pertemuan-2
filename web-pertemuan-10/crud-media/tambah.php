<?php
require_once __DIR__ . "/../config/auth.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah CRUD Media</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
    <h1>Tambah Data Media</h1>
    <p>PHP File Upload + JavaScript DOM Preview</p>
</header>

<nav>
    <a href="../pages/dashboard.php">Dashboard</a>
    <a href="../crud/index.php">CRUD Mahasiswa</a>
    <a href="index.php">CRUD Media</a>
    <a href="../proses/logout.php">Logout</a>
</nav>

<main>
<section>
<form
    class="crud-form"
    data-media-form
    data-require-foto="true"
    action="../proses/crud-media/tambah.php"
    method="POST"
    enctype="multipart/form-data"
    novalidate
>
    <label for="nim">NIM</label>
    <input id="nim" name="nim" type="text" required>
    <small class="form-error" id="errorNim"></small>

    <label for="nama">Nama</label>
    <input id="nama" name="nama" type="text" required>
    <small class="form-error" id="errorNama"></small>

    <label for="program_studi">Program Studi</label>
    <input id="program_studi" name="program_studi" type="text" required>
    <small class="form-error" id="errorProdi"></small>

    <label for="email">Email</label>
    <input id="email" name="email" type="email" required>
    <small class="form-error" id="errorEmail"></small>

    <label for="angkatan">Angkatan</label>
    <input id="angkatan" name="angkatan" type="number" min="2000" max="2100" required>
    <small class="form-error" id="errorAngkatan"></small>

    <label for="foto">Foto (wajib, JPG/PNG/WEBP, maks. 2 MB)</label>
    <input
        id="foto"
        name="foto"
        type="file"
        accept="image/jpeg,image/png,image/webp"
        required
    >
    <small class="form-error" id="errorFoto"></small>

    <div class="media-preview-box">
        <strong>Preview Foto</strong>
        <img
            id="previewFoto"
            class="media-preview-image"
            alt="Preview foto"
            hidden
        >
    </div>

    <label for="audio">Audio (optional, MP3/WAV, maks. 2 MB)</label>
    <input
        id="audio"
        name="audio"
        type="file"
        accept="audio/mpeg,audio/wav"
    >

    <div class="media-preview-box">
        <strong>Preview Audio</strong>
        <audio
            id="previewAudio"
            class="media-preview-audio"
            controls
            hidden
        ></audio>
    </div>

    <label for="dokumen">Dokumen (optional, PDF, maks. 2 MB)</label>
    <input
        id="dokumen"
        name="dokumen"
        type="file"
        accept="application/pdf"
    >
    <p id="previewDokumen">Belum ada dokumen dipilih.</p>

    <button type="submit">Simpan Data Media</button>
    <a href="index.php">Batal</a>
</form>
</section>
</main>

<script src="../assets/js/media.js"></script>
</body>
</html>

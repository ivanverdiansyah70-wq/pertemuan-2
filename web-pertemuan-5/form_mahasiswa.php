<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Tambah Mahasiswa</h1>
    <p>Web Programming 1</p>
</header>

<nav>
    <a href="index.html">Biodata</a>
    <a href="layout.html">Layout Lab</a>
    <a href="data_mahasiswa.php">Data Mahasiswa</a>
    <a href="form_mahasiswa.php">Tambah Mahasiswa</a>
</nav>

<main>
    <section>
        <h2>Form Data Mahasiswa</h2>

        <form action="proses_tambah.php" method="POST" class="student-form">
            <label for="nim">NIM</label>
            <input id="nim" name="nim" type="text" required>

            <label for="nama">Nama</label>
            <input id="nama" name="nama" type="text" required>

            <label for="program_studi">Program Studi</label>
            <input id="program_studi" name="program_studi" type="text" required>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" required>

            <label for="angkatan">Angkatan</label>
            <input id="angkatan" name="angkatan" type="number" min="2000" max="2100" required>

            <button type="submit">Simpan Data</button>
        </form>
    </section>
</main>

<footer>
    <p>Web Programming 1</p>
</footer>

</body>
</html>

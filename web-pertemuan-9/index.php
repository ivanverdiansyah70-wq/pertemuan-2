<?php
require_once "auth.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Saya</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>BIODATA SAYA</h1>
        <p>Website Biodata Sederhana</p>
        <p>Mata Kuliah Web Programming 1</p>
    </header>

    <nav id="main-navigation" class="top-nav">
        <a href="index.php">Biodata</a>
        <a href="layout.php">Layout Lab</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="data_mahasiswa.php">Data Mahasiswa</a>
        <a href="form_mahasiswa.php">Tambah Mahasiswa</a>
        <a href="logout.php">Logout</a>
        <a href="#tentang">Tentang Saya</a>
        <a href="#pendidikan">Pendidikan</a>
        <a href="#hobi">Hobi</a>
        <a href="#skill">Skill</a>
        <a href="#sosial-media">Social Media</a>
    </nav>

    <main>

        <section id="biodata">
            <h2>Data Pribadi</h2>

            <img src="foto.jpg" alt="Foto Profil Saya" width="150">

            <table>
                <tr>
                    <td><b>Nama</b></td>
                    <td>Xingqiu</td>
                </tr>
                <tr>
                    <td><b>NIM</b></td>
                    <td>12345678</td>
                </tr>
                <tr>
                    <td><b>Program Studi</b></td>
                    <td>Informatika</td>
                </tr>
                <tr>
                    <td><b>Fakultas</b></td>
                    <td>Fakultas Ilmu Komputer</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>Xingqiu@email.com</td>
                </tr>
                <tr>
                    <td><b>Tempat Lahir</b></td>
                    <td>Jakarta</td>
                </tr>
            </table>
        </section>

        <section id="tentang">
            <h2>Tentang Saya</h2>
            <p>
                Pokoknya gitu weh.
            </p>
        </section>

        <section id="pendidikan">
            <h2>Riwayat Pendidikan</h2>
            <ol>
                <li>SD </li>
                <li>SMP </li>
                <li>SMA </li>
                <li>S1 Informatika</li>
            </ol>
        </section>

        <section id="hobi">
            <h2>Hobi</h2>
            <ul>
                <li>Badminton</li>
                <li>Mendengarkan Musik</li>
                <li>Coding</li>
                <li>Membaca</li>
                <li>Traveling</li>
            </ul>
        </section>

        <section id="skill">
            <h2>Skill</h2>
            <ul>
                <li>HTML</li>
                <li>Python</li>
                <li>Microsoft Office</li>
                <li>Public Speaking</li>
            </ul>
        </section>

        <section id="sosial-media">
            <h2>Social Media</h2>
            <p>
                Instagram:
                <a href="https://www.instagram.com/" target="_blank">
                    Instagram Saya
                </a>
            </p>
            <p>
                LinkedIn:
                <a href="https://www.linkedin.com/" target="_blank">
                    LinkedIn Saya
                </a>
            </p>
            <p>
                GitHub:
                <a href="https://github.com/" target="_blank">
                    GitHub Saya
                </a>
            </p>
        </section>

    </main>

    <footer>
        <p>Copyright &copy; 2026 - Xingqiu</p>
        <p>Web Programming 1</p>
    </footer>

</body>

</html>
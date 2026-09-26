<?php
require "koneksi.php";

// Level 3 - filter program studi (WHERE) dan urutan (ORDER BY).
// Nilai dari URL hanya diterima jika ada di daftar yang diizinkan.
$daftar_prodi = ["Informatika", "Sistem Informasi"];

$prodi = $_GET["prodi"] ?? "";
if (!in_array($prodi, $daftar_prodi, true)) {
    $prodi = "";
}

$urut = ($_GET["urut"] ?? "") === "nama" ? "nama" : "id";
$order_by = $urut === "nama" ? "nama ASC" : "id ASC";

$sql = "SELECT id, nim, nama, program_studi, email, angkatan
        FROM mahasiswa";

if ($prodi !== "") {
    $stmt = $conn->prepare($sql . " WHERE program_studi = ? ORDER BY " . $order_by);
    if (!$stmt) {
        die("Query gagal: " . $conn->error);
    }
    $stmt->bind_param("s", $prodi);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($sql . " ORDER BY " . $order_by);
}

if (!$result) {
    die("Query gagal: " . $conn->error);
}

function url_filter($prodi, $urut)
{
    $params = [];
    if ($prodi !== "") {
        $params["prodi"] = $prodi;
    }
    if ($urut === "nama") {
        $params["urut"] = "nama";
    }
    $url = "data_mahasiswa.php" . ($params ? "?" . http_build_query($params) : "");
    return htmlspecialchars($url);
}

function kelas_aktif($aktif)
{
    return $aktif ? ' class="active"' : "";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Data Mahasiswa</h1>
    <p>Web Programming 1</p>
</header>

<nav>
    <a href="index.html">Biodata</a>
    <a href="layout.html">Layout Lab</a>
    <a href="data_mahasiswa.php">Data Mahasiswa</a>
</nav>

<main>
    <section>
        <h2>Daftar Mahasiswa</h2>

        <div class="filter-bar">
            <div>
                Program Studi:
                <a href="<?php echo url_filter("", $urut); ?>"<?php echo kelas_aktif($prodi === ""); ?>>Semua</a>
                <?php foreach ($daftar_prodi as $p) { ?>
                    <a href="<?php echo url_filter($p, $urut); ?>"<?php echo kelas_aktif($prodi === $p); ?>><?php echo htmlspecialchars($p); ?></a>
                <?php } ?>
            </div>
            <div>
                Urut:
                <a href="<?php echo url_filter($prodi, "id"); ?>"<?php echo kelas_aktif($urut === "id"); ?>>ID</a>
                <a href="<?php echo url_filter($prodi, "nama"); ?>"<?php echo kelas_aktif($urut === "nama"); ?>>Nama</a>
            </div>
        </div>

        <table class="data-table">
            <caption>Data Mahasiswa dari MySQL</caption>
            <thead>
                <tr>
                    <th scope="col" class="col-center">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="col-center">Angkatan</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td class="col-center"><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($row["nim"]); ?></td>
                    <td><?php echo htmlspecialchars($row["nama"]); ?></td>
                    <td><?php echo htmlspecialchars($row["program_studi"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td class="col-center"><?php echo htmlspecialchars($row["angkatan"]); ?></td>
                </tr>
            <?php
                $no++;
            }

            if ($no === 1) {
            ?>
                <tr>
                    <td colspan="6" class="empty-row">Belum ada data</td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <p>Web Programming 1</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>

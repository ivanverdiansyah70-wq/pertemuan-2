<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    // Hitung URL login dari lokasi folder project, sehingga auth.php dapat
    // dipakai dari pages/, crud/, crud-media/, proses/ maupun proses/crud-media/.
    $root = str_replace("\\", "/", dirname(__DIR__));
    $docroot = str_replace("\\", "/", rtrim($_SERVER["DOCUMENT_ROOT"], "/\\"));
    $base = substr($root, strlen($docroot));

    header("Location: " . $base . "/pages/login.php");
    exit;
}

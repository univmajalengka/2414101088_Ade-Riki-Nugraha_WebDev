<?php
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika default XAMPP
$db   = "wisata_yogyakarta";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>
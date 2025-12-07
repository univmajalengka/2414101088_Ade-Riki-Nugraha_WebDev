<?php

$server = "localhost";
$user = "root";
$password = ""; // Kosongkan jika pakai XAMPP default, atau isi "12345" jika sudah diubah
$nama_database = "pendaftaran_siswa";

// Menggunakan try-catch atau pengecekan prosedural
$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
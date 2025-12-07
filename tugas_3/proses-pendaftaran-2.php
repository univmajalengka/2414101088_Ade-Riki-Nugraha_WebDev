<?php

include("koneksi.php");

// Cek apakah tombol daftar sudah diklik atau belum?
if(isset($_POST['daftar'])){
    
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    // PERBAIKAN: Menambahkan tanda $ sebelum nama variabel
    $sekolah = $_POST['sekolah_asal'];
    
    // PERBAIKAN: Menggunakan Prepared Statement (Best Practice Security)
    // 1. Siapkan template query dengan tanda tanya (?) sebagai placeholder
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) VALUES (?, ?, ?, ?, ?)";
    
    // 2. Inisialisasi statement
    $stmt = mysqli_stmt_init($db);
    
    // 3. Cek kesiapan statement
    if (mysqli_stmt_prepare($stmt, $sql)) {
        // 4. Bind parameter (hubungkan data dengan placeholder)
        // "sssss" artinya ada 5 parameter bertipe String
        mysqli_stmt_bind_param($stmt, "sssss", $nama, $alamat, $jk, $agama, $sekolah);
        
        // 5. Eksekusi query
        $execute = mysqli_stmt_execute($stmt);
        
        if( $execute ) {
            // Kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: index.php?status=sukses');
        } else {
            // Kalau gagal alihkan ke halaman index.php dengan status=gagal
            header('Location: index.php?status=gagal');
        }
        
        // Tutup statement
        mysqli_stmt_close($stmt);
        
    } else {
        // Jika query gagal disiapkan
        echo "Error preparing statement: " . mysqli_error($db);
    }

} else {
    die("Akses dilarang...");
}

?>
1. Syntax Error: Penulisan Variabel (File: proses-pendaftaran-2.php)

Lokasi: Baris 11 (kurang lebih).

Masalah: Tertulis sekolah = $_POST['sekolah_asal'];.

Penyebab: Di PHP, semua variabel wajib diawali dengan tanda dollar ($).

Solusi: Ubah menjadi $sekolah = $_POST['sekolah_asal'];.


2. SQL Syntax Error: Keyword Query (File: proses-pendaftaran-2.php)

Lokasi: Baris 14 (di dalam string query $sql).

Masalah: Menggunakan kata kunci VALUE.

Penyebab: Meskipun MySQL terkadang mentolerirnya, standar SQL yang benar untuk menyisipkan data adalah VALUES (jamak), bukan VALUE.

Solusi: Ubah menjadi ... VALUES ('$nama', ....


3. Security Vulnerability: SQL Injection (File: proses-pendaftaran-2.php)

Lokasi: Baris 14 (di dalam string query $sql).

Masalah: Memasukkan variabel langsung ke dalam string SQL ('$nama', '$alamat', dst).

Penyebab: Ini adalah celah keamanan paling dasar dan berbahaya. Peretas bisa memanipulasi input form untuk merusak database.

Solusi: Wajib menggunakan Prepared Statements (menggunakan tanda tanya ? sebagai placeholder dan mysqli_stmt_bind_param).


4. HTML Syntax Error: DOCTYPE (File: Form-daftar.php)

Lokasi: Baris 1 (paling atas).

Masalah: Tertulis <DOCTYPE >.

Penyebab: Penulisan deklarasi tipe dokumen tidak valid.

Solusi: Ubah menjadi standar HTML5: <!DOCTYPE html>.


5. Struktur HTML Tidak Rapi (File: Form-daftar.php)

Lokasi: Sekitar baris 42 (akhir form).

Masalah: Tag </fieldset> dan penutup form tidak tertata dengan baik.

Penyebab: Bisa menyebabkan tampilan berantakan di browser tertentu.

Solusi: Pastikan tag </fieldset> berada di dalam <form> dan sebelum </form>.


6. Logic Error: Konfigurasi Database (File: koneksi.php)

Lokasi: Baris 5.

Masalah: Tertulis $password = "12345";.

Penyebab: Secara default, aplikasi XAMPP (yang umum digunakan mahasiswa) mengosongkan password untuk user root. Jika diisi "12345", koneksi akan gagal (kecuali Anda memang mengubah settingan XAMPP).

Solusi: Ubah menjadi $password = ""; (string kosong).

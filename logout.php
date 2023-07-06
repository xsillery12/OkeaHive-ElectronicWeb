<!-- Inisialisasi PHP untuk Logout -->
<?php 

@include 'config.php';

session_start(); // perintah untuk memulai sesi PHP.
session_unset(); // perintah untuk menghapus semua variabel sesi yang saat ini disimpan.
session_destroy(); // perintah untuk menghentikan sesi saat ini yang sedang berjalan.

header('location:login_form.php'); // perintah untuk mengarahkan pengguna ke halaman login_form.php.

?>

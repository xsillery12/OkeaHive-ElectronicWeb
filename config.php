<!-- Menghubungkan PHPMyAdmin dengan Source Code -->
<?php 

$host = 'localhost'; // menyimpan nama host dari server database.
$user = 'root'; // menyimpan nama pengguna untuk mengakses server database.
$pass = ''; // menyimpan kata sandi untuk mengakses server database.
$db = 'user_db'; // menyimpan nama database yang akan digunakan.

$conn = mysqli_connect($host, $user, $pass, $db); // untuk membuat koneksi ke server database menggunakan fungsi mysqli_connect(). 

// Mengkonfigurasikan dengan API gmail

// Konfigurasi SMTP
define('SMTP_HOST', 'smtp.gmail.com'); // untuk mendefinisikan konstanta SMTP_HOST dengan nilai 'smtp.gmail.com'.
define('SMTP_PORT', 587); // untuk mendefinisikan konstanta SMTP_PORT dengan nilai 587.
define('SMTP_USERNAME', 'kelompoksim6.ka19@gmail.com'); // perintah untuk mendefinisikan konstanta SMTP_USERNAME dengan nilai 'kelompoksim6.ka19@gmail.com'.
define('SMTP_PASSWORD', 'kshciqolubpvqnmx'); // untuk mendefinisikan konstanta SMTP_PASSWORD dengan nilai 'kshciqolubpvqnmx'

// Pengaturan email
define('EMAIL_FROM', 'okea.hive@customer.service.com'); // untuk mendefinisikan konstanta EMAIL_FROM dengan nilai 'okea.hive@customer.service.com'.
define('EMAIL_FROM_NAME', 'OkeaHive - Electronic Store'); // untuk mendefinisikan konstanta EMAIL_FROM_NAME dengan nilai 'OkeaHive - Electronic Store'.

?>
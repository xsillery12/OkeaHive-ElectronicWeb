<!-- Insialisasi PHP -->
<?php

@include 'config.php';

if (isset($_POST['submit'])) { // untuk memeriksa apakah ada data yang dikirim melalui metode HTTP POST dengan elemen bernama "submit". Jika ada, maka blok kode di dalamnya akan dieksekusi.
    $nama = mysqli_real_escape_string($conn, $_POST['name']); // perintah untuk mengamankan nilai yang diterima dari elemen bernama "name" dalam formulir
    $_SESSION['nama'] = $nama; // pada bagian ini bberhubungan dengan session yang ada di homepage.php yang berfungsi untuk menampilkan nama user
    setcookie('nama', $nama, time() + (86400 * 30), "/"); // mengatur cookie dengan nama "nama" yang berisi nilai dari $nama.
    $email = mysqli_real_escape_string($conn, $_POST['email']); // perintah untuk mengamankan nilai yang diterima dari elemen bernama "email" dalam formulir
    $pass = md5($_POST['password']); // perintah untuk mengamankan nilai yang diterima dari elemen bernama "password" dalam formulir
    $cpass = md5($_POST['cpassword']); // perintah untuk mengamankan nilai yang diterima dari elemen bernama "cpassword" dalam formulir

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' "; // untuk membuat string SQL yang akan mengambil data dari tabel "user_form" di mana nilai kolom "email" sama dengan $email dan nilai kolom "password" sama dengan $pass.

    $result = mysqli_query($conn, $select); // untuk menjalankan kueri SQL yang dibuat sebelumnya menggunakan fungsi mysqli_query()

    if (mysqli_num_rows($result) > 0) { 
        $error[] = 'user telah terdaftar!';
    } else {                                       // memeriksa apakah jumlah baris yang dikembalikan oleh kueri lebih dari 0, jika sudah lebih dari 0, maka akan ada  pesan error user telah terdaftar
        if ($pass != $cpass) {                    
            $error[] = 'Password tidak sama!';     // jika pass tidak sama dengan cpass, maka akan ada pesan error password tidak sama
        } else {
            // Generate kode OTP
            $otp = generateOTP(); // digunakan untuk menghasilkan kode OTP random

            $insert = "INSERT INTO user_form(nama, email, password, otp) VALUES ('$nama', '$email', '$pass', '$otp')"; // untuk membuat string SQL yang akan memasukkan data baru ke dalam tabel "user_form" dengan nilai dari $nama, $email, $pass, dan $otp.
            mysqli_query($conn, $insert);
            header('location:verify.php?email=' . urlencode($email)); // untuk mengarahkan pengguna ke halaman "verify.php"

            // Mengirim email verifikasi
            require 'vendor/autoload.php';

            // Buat instance PHPMailer
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->Port = SMTP_PORT;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USERNAME;
            $mail->Password = SMTP_PASSWORD;
            $mail->SMTPSecure = 'tls';

            // Pengaturan email
            $mail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
            $mail->addAddress($email); // Alamat email penerima
            $mail->Subject = 'Verifikasi Email';
            $mail->Body = 'Kode OTP Anda Adalah : ' . $otp;
            $mail->AltBody = 'Kode OTP Anda Adalah : ' . $otp;

            // Mengirim email
            if ($mail->send()) {
                // Email berhasil dikirim
                echo 'Email verifikasi telah dikirim ke alamat email Anda. Silakan periksa kotak masuk Anda.';
            } else {
                // Terjadi kesalahan saat mengirim email
                echo 'Terjadi kesalahan saat mengirim email verifikasi. Silakan coba lagi.';
            }
        }
    }
};
function generateOTP()
{
    // Logika untuk menghasilkan kode OTP
    // Misalnya, dapat menggunakan fungsi random untuk menghasilkan kode acak
    $otp = rand(100000, 999999); // logika untuk menghasilkan kode OTP.
    return $otp; // mengembalikan nilai $otp sebagai hasil dari fungsi generateOTP().
}
?>

<!DOCTYPE html>
<html lang=”en”>

<head>
    <meta charset=”UTF-8″>
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0″>
    <meta http-equiv=”X-UA-Compatible” content=”ie=edge”>
    <title>Register Page</title>

    <!-- Installasi font cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous">

    <!-- Koneksi ke css -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- Membuat Form Register -->
    <div class="form-container">
        <form action="" method="post">
            <h3>Daftar</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $errorMsg) {
                    echo '<span class="error-msg">' . $errorMsg . '</span>';
                }
            }
            ?>
            
            <!-- Membuat Form Input Nama -->
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" required placeholder="Masukkan nama anda">
            </div>

            <!-- Membuat Form Input Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="Masukkan email anda">
            </div>

            <!-- Membuat Form Input Tanggal Lahir -->
            <div class="form-group">
                <label for="date">Tanggal Lahir</label>
                <input type="date" name="date" id="date" required placeholder="Masukkan tanggal lahir">
            </div>

            <!-- Membuat Form Input Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" name="password" id="password" required placeholder="Masukkan password anda">
                    <span class="password-toggle" onclick="togglePassword('password')">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="cpassword">Konfirmasi Password</label>
                <div class="password-container">
                    <input type="password" name="cpassword" id="cpassword" required placeholder="Konfirmasi password anda">
                    <span class="password-toggle" onclick="togglePassword('cpassword')">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
            <input type="submit" name="submit" value="Daftar" class="form-btn">
            <p>Sudah punya akun? <a href="login_form.php">login</a></p>
        </form>
    </div>

    <!-- Installasi file js -->
    <script src="js/register_form.js"></script>

</body>
</html>
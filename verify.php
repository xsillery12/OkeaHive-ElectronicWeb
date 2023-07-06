<!-- Inisialisasi PHP -->
<?php

@include 'config.php';

$verified = false; // Inisialisasi variabel $verified

if (isset($_POST['submit'])) {
    $otp = mysqli_real_escape_string($conn, $_POST['otp']); // untuk mengamankan nilai yang diterima dari elemen bernama "otp" dalam formulir
    $email = isset($_GET['email']) ? $_GET['email'] : ''; // untuk mengambil nilai parameter "email" dari URL jika ada

    $select = "SELECT * FROM user_form WHERE email = '$email' && otp = '$otp' "; // untuk membuat string SQL yang akan mengambil data dari tabel "user_form" di mana nilai kolom "email" sama dengan $email dan nilai kolom "otp" sama dengan $otp.

    $result = mysqli_query($conn, $select); // untuk menjalankan kueri SQL yang dibuat sebelumnya menggunakan fungsi mysqli_query().

    if (mysqli_num_rows($result) > 0) {
        // Kode OTP valid
        $message = 'Akun Anda telah diverifikasi.';
        $verified = true;
    } else {
        // Kode OTP tidak valid
        $error = 'Kode OTP tidak valid.';
        $verified = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Page</title>

    <!-- Installasi font cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous">

    <!-- Koneksi ke css -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- Membuat form Kode-OTP -->
    <?php if (isset($verified) && $verified) : ?> <!-- blok kondisional yang memeriksa apakah variabel $verified sudah diatur dan memiliki nilai true. Jika kondisi ini terpenuhi, maka blok kode di dalamnya akan dieksekusi. -->
        <div class="form-container">
            <form action="">
                <h3><?php echo $message; ?></h3> <!-- untuk menampilkan pesan yang disimpan dalam variabel $message. -->
                <a href="login_form.php" class="form-btn">Login</a>
            </form>
        </div>
    <?php else : ?>
        <div class="form-container">
            <form action="" method="post">
                <h3>Verifikasi Kode-OTP Anda</h3>
                <?php if (isset($error)) : ?>
                    <span class="error-msg"><?php echo $error; ?></span> <!-- untuk menampilkan pesan kesalahan yang disimpan dalam variabel $error. -->
                <?php endif; ?>

                <!-- Membuat form input kode otp -->
                <input type="text" name="otp" required placeholder="Masukkan Kode-OTP">
                <input type="submit" name="submit" value="Daftar" class="form-btn">
            </form>
        </div>
    <?php endif; ?>


    <!-- Installasi file js -->
    <script src="js/register_form.js"></script>

</body>
</html>
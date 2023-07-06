<!-- Insialisasi PHP -->
<?php

@include 'config.php'; // untuk menyertakan file config.php ke dalam skrip

if (isset($_POST['submit'])) { // memeriksa apakah ada data yang dikirim melalui metode HTTP POST dengan elemen bernama "submit". Jika ada, maka blok kode di dalamnya akan dieksekusi.
    $email = mysqli_real_escape_string($conn, $_POST['email']);  // perintah untuk mengamankan nilai yang diterima dari elemen bernama "email" dalam formulir
    $pass = md5($_POST['password']); // perintah untuk mengamankan nilai yang diterima dari elemen bernama "password" dalam formulir

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' "; // perintah untuk membuat string SQL yang akan mengambil data dari tabel "user_form"

    $result = mysqli_query($conn, $select); // perintah untuk menjalankan kueri SQL yang dibuat sebelumnya

    if (mysqli_num_rows($result) > 0) { // blok kondisional yang memeriksa apakah jumlah baris yang dikembalikan oleh kueri lebih dari 0
        header('location: homepage.php'); // setelah login berhasil, user akan diarahkan ke homepage.php
        exit();
    } else {
        $error[] = 'Email atau Password salah!'; // untuk menambahkan pesan kesalahan ke dalam array
    }
};
?>

<!DOCTYPE html>
<html lang=”en”>

<head>
    <meta charset=”UTF-8″>
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0″>
    <meta http-equiv=”X-UA-Compatible” content=”ie=edge”>
    <title>Login Page</title>

    <!-- Installasi font cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous">

    <!-- Koneksi ke css -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- Membuat Form Login -->
    <div class="form-container">
        <form action="" method="post">
            <h3>Login</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) { // perulangan foreach yang digunakan untuk mengiterasi melalui setiap elemen dalam array
                    echo '<span class="error-msg">' . $error . '</span>'; // untuk menampilkan pesan error
                }
            }
            ?>

            <!-- Membuat Form Input Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="Masukkan email anda">
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
            <input type="submit" name="submit" value="Masuk" class="form-btn">
            <p>Belum punya akun? <a href="register_form.php">Daftar</a></p>
        </form>
    </div>

    <!-- Installasi file js -->
    <script src="js/login_form.js"></script>

</body>
</html>
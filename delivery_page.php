<!-- Inisialisasi PHP -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OkeaHive. - Electronic Store</title>
  <link rel="icon" href="img/icon2.svg" type="image/svg">

  <!-- Installasi Swiper JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- Installasi font cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Installasi file css -->
  <link rel="stylesheet" href="css/delivery_page.css">
</head>

<body>

  <!-- Mulai Header -->
  <header>

    <a href="#" class="logo"><i class="fa-solid fa-bolt-lightning fa-bounce" style="color: #000000;"></i>OkeaHive.</a>

    <!-- Mulai Navbar -->
    <nav class="navbar">
      <a href="homepage.php">Beranda</a>
      <a href="homepage.php#promo">Promo</a>
      <a href="homepage.php#produk">Produk</a>

      <!-- Membuat dropdown menu -->
      <div class="sub-menu-wrap" id="dropdown-menu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="img/profil.png" class="user" id="subMenu">
            <h3><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Nama Pengguna'; ?></h3>
          </div>
          <hr>

          <a href="#" class="sub-menu-link">
            <img src="img/user.png">
            <p> Ubah Profil</p>
            <span>></span>
          </a>

          <a href="delivery_page.html" class="sub-menu-link">
            <img src="img/barang.png">
            <p> Pembelianmu</p>
            <span>></span>
          </a>

          <a href="#" class="sub-menu-link">
            <img src="img/settings.png">
            <p> Settings & Privacy</p>
            <span>></span>
          </a>

          <a href="login_form.php" class="sub-menu-link">
            <img src="img/logout.png">
            <p> Keluar</p>
            <span>></span>
          </a>
        </div>
      </div>
    </nav>

    <!-- Bagian Ikon navbar -->
    <div class="icons">
      <i class="fa-solid fa-bars" id="menu-bars"></i>
      <a href="#" class="fa-solid fa-magnifying-glass" id="search-icon"></a>
      <a href="#" class="fa-sharp fa-solid fa-heart"></a>
      <a href="#" class="fa-solid fa-cart-shopping" id="cart-icon"></a><span id="cart-counter">0</span>
      <a href="#" class="fa-solid fa-user" onclick="toggleMenu()"></a>
    </div>

    <!-- Selesai Navbar -->

    <!-- Mulai tampilan cart -->

    <div class="cart">
      <h2 class="cart-title">Keranjang Kamu</h2>
      <div class="cart-content">
      </div>

      <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">Rp0</div>
      </div>
      <a href="checkout_page.html"><button type="button" class="btn">Checkout</button></a>
      <i class="fa-solid fa-xmark" id="close"></i>
    </div>

    <!-- Selesai tampilan cart -->

  </header>

  <!-- Selesai Header -->

  <!-- Mulai tampilan search -->

  <form action="" id="search-form">
    <input type="search" placeholder="Find your stuff here ..." name="" id="search-box">
    <label for="search-box" class="fa-solid fa-magnifying-glass" id="search-icon"></label>
    <i class="fa-solid fa-xmark" id="close" onclick="closeSearchForm()"></i>
  </form>


  <!-- Selesai tampilan search -->

  <!-- Mulai Tampilan Transaksi pembelian -->

  <div class="trans-container">
    <h1>Daftar Transaksi Pembelian</h1>
    <div class="search-filter">
      <input type="text" id="searchInput" placeholder="Cari transaksi...">
      <select id="filterSelect">
        <option value="all">Semua</option>
        <option value="pending">Menunggu Pembayaran</option>
        <option value="shipping">Sedang Dikirim</option>
        <option value="completed">Selesai</option>
      </select>
      <button onclick="filterTransactions()">Filter</button>
    </div>

    <div class="container">
      <h2>01 Juni 2023 - INV/20230621/XYZ123</h2>
      <div class="status-box">
        <p>Status Pengiriman: Sedang Dikirim</p>
      </div>
      <img src="img/air.png" alt="">
      <p>Samsung AX34R STD Air Purifier</p>
      <hr>
      <img src="img/ps5.png" alt="">
      <p>Sony PlayStation 5</p>
      <hr>
      <div class="product-info">
        <div class="price">Harga: Rp 8,970,000</div>
        <button class="detail-button" id="openPopupButton">Lihat Detail</button>
      </div>
    </div>
    
    <!-- Selesai Tampilan Transaksi pembelian -->

    <!-- Membuat Tampilan Pop Up  -->
    <!-- Mulai Tampilan Pop Up -->
    <div id="popupContainer">
      <div id="popupContent">
        <h2>Detail Transaksi</h2>
        <hr>
        <section class="detail">
          <p><strong>No. Invoice :</strong> INV/20230621/XYZ123</p>
          <p><strong>Tanggal Pembelian :</strong> 01 Juni 2023, 15:57 WIB</p>
        </section>
        <div class="item">
          <p><strong>Detail Produk:</strong></p>
          <div class="product-item">
            <img src="img/air.png" alt="Produk 1">
            <div class="product-info">
              <p class="product-name">Samsung AX34R STD Air Purifier</p>
              <p class="product-price">1 x Rp 2,170,000</p>
            </div>
          </div>
          <div class="product-item">
            <img src="img/ps5.png" alt="Produk 2">
            <div class="product-info">
              <p class="product-name">Sony PlayStation 5</p>
              <p class="product-price">1 x Rp 6,780,000</p>
            </div>
          </div>
        </div>
        <div class="shipping-info">
          <p><strong>Info Pengiriman:</strong></p>
          <table>
            <tr>
              <td>Kurir</td>
              <td>:</td>
              <td>OkeaHive. Regular</td>
            </tr>
            <tr>
              <td>No. Resi</td>
              <td>:</td>
              <td>YGCB2941830DN2</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td>Jakarta</td>
            </tr>
          </table>
        </div>
        <div class="payment-details">
          <h3>Rincian Pembayaran</h3>
          <table>
            <tr>
              <td>Metode Pembayaran</td>
              <td>:</td>
              <td>GoPay</td>
            </tr>
            <tr>
              <td>Total Harga (2 barang)</td>
              <td>:</td>
              <td>Rp 8,950,000</td>
            </tr>
            <tr>
              <td>Total Ongkos Kirim</td>
              <td>:</td>
              <td>Rp 20,000</td>
            </tr>
            <tr>
              <td>Total Belanja</td>
              <td>:</td>
              <td>Rp 8,970,000</td>
            </tr>
          </table>
        </div>
        <button id="closePopupButton">Tutup</button>
      </div>
    </div>
    <!-- Selesai Tampilan Pop Up -->

    <!-- Installasi file js -->
    <script src="js/delivery_page.js"></script>
</body>
</html>
<!-- Inisialisasi PHP -->
<?php
session_start(); // Untuk memulai sesi php
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
    <link rel="stylesheet" href="css/homepage.css">
</head>
<body>
    
<!-- Mulai Header -->

<header>

    <a href="#" class="logo"><i class="fa-solid fa-bolt-lightning fa-bounce" style="color: #000000;"></i>OkeaHive.</a>

    <!-- Mulai Navbar -->
    <nav class="navbar">
        <a href="#home">Beranda</a>
        <a href="#promo">Promo</a>
        <a href="#produk">Produk</a>

        <div class="sub-menu-wrap" id="dropdown-menu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="img/profil.png" class="user" id="subMenu">
                    <h3><?php echo isset($_COOKIE['nama']) ? $_COOKIE['nama'] : 'Nama Pengguna'; ?></h3> <!-- php bagian ini digunakan untuk mengambil nama yang didaftarkan pada database agar dapat tampil di output -->
                </div>
                <hr>

                <a href="#" class="sub-menu-link">
                    <img src="img/user.png">
                    <p> Ubah Profil</p>
                    <span>></span>
                </a>

                <a href="delivery_page.php" class="sub-menu-link">
                    <img src="img/barang.png">
                    <p> Pembelianmu</p>
                    <span>></span>
                </a>

                <a href="#" class="sub-menu-link">
                    <img src="img/settings.png">
                    <p> Settings & Privacy</p>
                    <span>></span>
                </a>

                <a href="index.html" class="sub-menu-link">
                    <img src="img/logout.png">
                    <p> Keluar</p>
                    <span>></span>
                </a>

            </div>

        </div>
    </nav>

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


<!-- Mulai tampilan Home -->

<section class="home" id="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <h3>Air Purifier</h3>
                    <p>Temukan berbagai macam Air Purifier impianmu.</p>
                    <a href="#produk" class="btn">Lihat selengkapnya</a>
                </div>
                <div class="image">
                    <img src="img/image-1.png" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <h3>Smart TV</h3>
                    <p>Temukan berbagai macam Smart TV impianmu.</p>
                    <a href="#produk" class="btn">Lihat selengkapnya</a>
                </div>
                <div class="image">
                    <img src="img/image-2.png" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <h3>Mesin Cuci</h3>
                    <p>Temukan berbagai macam Mesin Cuci impianmu.</p>
                    <a href="#produk" class="btn">Lihat selengkapnya</a>
                </div>
                <div class="image">
                    <img src="img/image-3.png" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- Selesai tampilan Home -->

<!-- Mulai tampilan Promo -->

<section class="promo" id="promo">
    <h1 class="heading-promo">Promo Hari Ini <i class="fa-solid fa-tag" style="color: #000000;"></i></h1>

    <div class="box-promo">
        <a href="#" class="promo-box" data-promo="POTONGAN30">
            <h3>Potongan 30%</h3>
            <p>Gunakan kode diskon ini untuk mendapatkan potongan 30%</p>
            <button class="claim-btn" onclick="claimPromo('POTONGAN30')">Claim</button>
        </a>

        <a href="#" class="promo-box" data-promo="GRATONG">
            <h3>Gratis Ongkir</h3>
            <p>Gunakan kode diskon ini untuk mendapatkan gratis ongkir</p>
            <button class="claim-btn" onclick="claimPromo('GRATONG')">Claim</button>
        </a>

        <a href="#" class="promo-box" data-promo="CASHBACK100">
            <h3>Cashback Rp100.000</h3>
            <p>Gunakan kode diskon ini untuk mendapatkan cashback Rp100.000</p>
            <button class="claim-btn" onclick="claimPromo('CASHBACK100')">Claim</button>
        </a>
    </div>
    <div id="notification-container"></div>
</section>

<!-- Selesai tampilan Promo -->

<!-- Mulai tampilan Produk -->

<section class="produk" id="produk">
    <h1 class="heading">Produk Terlaris <i class="fa-solid fa-fire" style="color: #ff0000;"></i></h1>

    <ul class="category-filter">
        <li><a href="#" class="btn" data-category="all">Semua</a></li>
        <li><a href="#" class="btn" data-category="rumah-tangga">Rumah Tangga</a></li>
        <li><a href="#" class="btn" data-category="kecantikan">Kecantikan</a></li>
        <li><a href="#" class="btn" data-category="hiburan">Hiburan</a></li>
    </ul>

    <div class="box-container">
        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="product_page1.html" class="fa-regular fa-eye"></a>
            <a href="product_page1.html">
                <img src="img/product-1.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="product_page1.html" class="product-title">Samsung AX34R STD Air Purifier</a>
            </h3>
            <span class="price">Rp 2,170,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-2.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Air Purifier FP F30Y-A/C/H </a>
            </h3>
            <span class="price">Rp 1,250,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-3.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Daikin MCK55TVM6 Air Purifier</a>
            </h3>
            <span class="price">Rp 6,280,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="hiburan">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="product_page2.html" class="fa-regular fa-eye"></a>
            <a href="product_page2.html">
                <img src="img/product-4.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="product_page2.html" class="product-title">Samsung AU7105 UHD 4K Smart TV (2021)</a>
            </h3>
            <span class="price">Rp 4,299,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="hiburan">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="">
                <img src="img/product-5.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">LG UP 43inch 4K Smart UHD TV</a>
            </h3>
            <span class="price">Rp 5,630,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="hiburan">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-6.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Polytron PLD 43AS1558</a>
            </h3>
            <span class="price">Rp 3,970,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-7.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Samsung WW80K6414QW/ET 6500</a>
            </h3>
            <span class="price">Rp 5,750,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-8.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">LG T2108VSAM</a>
            </h3>
            <span class="price">Rp 3,199,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="hiburan">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-9.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Samsung T4340 Smart TV</a>
            </h3>
            <span class="price">Rp 2,300,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-10.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Sanken Mesin Cuci AW-S807</a>
            </h3>
            <span class="price">Rp 3,100,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-11.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Samsung AC Split 1 PK Standart</a>
            </h3>
            <span class="price">Rp 4,200,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-12.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Oxone Oven Jumbo Ox-898BR</a>
            </h3>
            <span class="price">Rp 1,600,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="rumah-tangga">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-13.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Philips Air Fryer HD9218/50</a>
            </h3>
            <span class="price">Rp 1,500,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="kecantikan">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-14.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Dyson Supersonic™ Hair Dryer</a>
            </h3>
            <span class="price">Rp 5,999,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="hiburan">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="product_page.html" class="fa-regular fa-eye"></a>
            <a href="product_page.html">
                <img src="img/product-15.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="product_page.html" class="product-title">Sony PlayStation 5</a>
            </h3>
            <span class="price">Rp 6,780,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

        <div class="box" data-category="hiburan">
            <a href="#" class="fa-regular fa-heart"></a>
            <a href="#" class="fa-regular fa-eye"></a>
            <a href="#">
                <img src="img/product-16.png" alt="" class="productImg">
            </a>
            <h3>
                <a href="#" class="product-title">Microsoft Xbox Series X</a>
            </h3>
            <span class="price">Rp 10,999,000</span>
            <a href="#" class="btn-1" data-id="1">Add to cart</a>
        </div>

    </div>
</section>

<!-- Selesai tampilan Produk -->

<!-- Mulai bagian footer -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#home">Beranda</a>
            <a href="#promo">Promo</a>
            <a href="#produk">Produk</a>
        </div>

        <div class="box">
            <h3>Info Kontak</h3>
            <a href="#">+62-810-121-280</a>
            <a href="#">+62-810-121-799</a>
            <a href="#">nasyifa.choirunisa@gmail.com</a>
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="https://www.instagram.com/2ka19_uhuy/"><i class="fa-brands fa-instagram" style="color: #000000;"></i> Instagram</a>
            <a href="#"><i class="fa-brands fa-linkedin" style="color: #000000;"></i> LinkedIn</a>
        </div>

    </div>

    <div class="credit"><i class="fa-regular fa-copyright" style="color: #000000;"></i> OkeaHive 2023. All rights reserved.</div>
    <div class="copyright">
        <p>Made with <i class="fa fa-heart"></i> by Kelompok 6</p>
      </div>
</section>

<!-- Selesai bagian footer -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Installasi file js -->
<script src="js/homepage.js"></script>

<!-- Installasi ChatBot -->
<script>(function(w, d) { w.CollectId = "64940010fbb58c84d214585b"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); 
    s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); 
    h.appendChild(s); })(window, document);
    </script>
</body>
</html>
// Membuat event pada search
// Digunakan fungsi untuk membuka dan menutup bagian search
document.querySelector("#search-icon").onclick = () => {
  event.preventDefault();
  document.querySelector("#search-form").classList.toggle("active");
};

function closeSearchForm() {
  event.preventDefault();
  document.querySelector("#search-form").classList.remove("active");
}

// Membuat event pada dropdown
// Digunakan fungsi untuk membuka dan menutup menu dropdown
var userIcon = document.querySelector(".fa-solid.fa-user");
var subMenuWrap = document.querySelector(".sub-menu-wrap");

userIcon.addEventListener("click", function () {
  subMenuWrap.classList.toggle("active");
});

// Membuat tampilan animasi slide 
// Diberikan fungsi agar slider pada homepage dapat berganti dengan sendirinya 
var swiper = new Swiper(".home-slider", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  loop: true,
});

// Membuat event pada category
// Diberikan fungsi untuk tombol filter agar dapat memfilter produk sesuai dengan kategori yang dipilih
$(document).ready(function () {
  $(".category-filter a").on("click", function (e) {
    e.preventDefault();
    var category = $(this).data("category");
    $(".box[data-category]").each(function () {
      if (category === "all" || $(this).data("category") === category) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
    if (category === "all") {
      $(".footer").show();
    }
  });
});

// Digunakan untuk menambahkan produk ke dalam keranjang belanja
function addToCart(productId) {
  var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
  var existingProduct = cartItems.find(function (item) {
    return item.productId === productId;
  });

  if (existingProduct) {
    existingProduct.quantity++;
  } else {
    cartItems.push({ productId: productId, quantity: 1 });
  }

  localStorage.setItem("cartItems", JSON.stringify(cartItems));
}

// Membuat event pada tombol cart
// Diberikan fungsi agar pada saat user mengklik ikon cart, maka akan terbuka bagian cart dan bisa juga untuk menutup cart
let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".cart");
let closeCart = document.querySelector("#close");

cartIcon.onclick = () => {
  event.preventDefault();
  cart.classList.add("active");
};
closeCart.onclick = () => {
  cart.classList.remove("active");
};

if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}

// Membuat event pada tombol remove
// Diberikan fungsi agar user dapat menghapus produk yang telah masuk ke keranjang
function ready() {
  var removeCartButtons = document.getElementsByClassName("fa-trash");
  console.log(removeCartButtons);
  for (var i = 0; i < removeCartButtons.length; i++) {
    var button = removeCartButtons[i];
    button.addEventListener("click", removeCartItem);
  }

  // Membuat event pada tombol tambah kuantitas
  // Diberikan fungsi agar user dapat menambah dan mengurangi produk yang telah masuk ke keranjang
  var quantityInputs = document.getElementsByClassName("cart-quantity");
  for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }

  // Memberikan event pada tombol add to cart
  // Diberikan fungsi agar setiap user mengklik add to cart, produk akan masuk ke keranjang
  var addCart = document.getElementsByClassName("btn-1");
  for (var i = 0; i < addCart.length; i++) {
    var button = addCart[i];
    button.addEventListener("click", addCartClicked);
  }
}
function removeCartItem(event) {
  var buttonClicked = event.target;
  buttonClicked.parentElement.remove();
  updatetotal();

  // Memberikan fungsi agar setiap produk yang ditambahkan akan terhitung oleh counter
  var cartBoxes = document.getElementsByClassName("cart-box");
  if (cartBoxes.length === 0) {
    var cartCounter = document.getElementById("cart-counter");
    cartCounter.innerText = "0";
  }
}
function quantityChanged(event) {
  var input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updatetotal();
}

// Membuat fungsi agar cart counter bertambah
function updateCartCounter() {
  var cartCounter = document.getElementById("cart-counter");
  var currentCount = parseInt(cartCounter.innerText);
  cartCounter.innerText = currentCount + 1;
}

// Membuat fungsi agar produk yang ditambahkan akan tampil
// ================= Mulai fungsi ===================
function addCartClicked(event) {
  event.preventDefault();
  var button = event.target;
  var shopProduct = button.parentElement;
  var title = shopProduct.getElementsByClassName("product-title")[0].innerText;
  var price = shopProduct.getElementsByClassName("price")[0].innerText;
  var productImg = shopProduct.getElementsByClassName("productImg")[0].src;
  addProductToCart(title, price, productImg);
  updatetotal();
  updateCartCounter();
}

function addProductToCart(title, price, productImg) {
  var cartBoxContent = `
    <div class="cart-box">
      <img src="${productImg}" class="cart-img">
      <div class="detail-box">
        <div class="cart-product-title">${title}</div>
        <div class="cart-price">${price}</div>
        <input type="number" value="1" class="cart-quantity">
      </div>
      <i class="fa-solid fa-trash"></i>
    </div>
  `;
  var cartContent = document.querySelector(".cart-content");
  cartContent.insertAdjacentHTML("beforeend", cartBoxContent);
  var removeButtons = cartContent.getElementsByClassName("fa-trash");
  for (var i = 0; i < removeButtons.length; i++) {
    var button = removeButtons[i];
    button.addEventListener("click", removeCartItem);
  }

  var quantityInputs = cartContent.getElementsByClassName("cart-quantity");
  for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }
}
 // digunakan untuk mengatur tampilan dan interaksi pada sebuah keranjang belanja (cart) di suatu halaman web.
  cartShopBox.innetHTML = cartBoxContent;
  cartItems.append(cartShopBox);
  cartShopBox
    .getElementsByClassName("fa-trash")[0]
    .addEventListener("click", removeCartItem);
  cartShopBox
    .getElementsByClassName("cart-quantity")[0]
    .addEventListener("change", removeCartItem);

  // ================= Selesai fungsi ===================

// Membuat fungsi untuk update total harga
function updatetotal() {
  var cartContent = document.getElementsByClassName("cart-content")[0];
  var cartBoxes = cartContent.getElementsByClassName("cart-box");
  var total = 0;
  for (var i = 0; i < cartBoxes.length; i++) {
    var cartBox = cartBoxes[i];
    var priceElement = cartBox.getElementsByClassName("cart-price")[0];
    var price = parseFloat(
      priceElement.innerText.replace("Rp", "").replace(",", "").replace(".", "")
    );
    var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
    var quantity = parseInt(quantityElement.value);
    total += price * quantity;
  }
  var totalElement = document.querySelector(".total-price");
  totalElement.innerText = "Rp " + total.toLocaleString() + ",000"; // Menggunakan toLocaleString() untuk format angka
}

// Membuat fungsi pada promo
function claimPromo(promoCode) {
  event.preventDefault();

  // Mendapatkan elemen dengan kelas promo-box yang memiliki data-promo yang sesuai dengan promoCode
  var promoBox = document.querySelector(
    '.promo-box[data-promo="' + promoCode + '"]'
  );

  // Mendapatkan nilai dari atribut data-promo
  var promoData = promoBox.getAttribute("data-promo");

  // Menyalin nilai data-promo ke clipboard
  navigator.clipboard
    .writeText(promoData)
    .then(function () {
      console.log("Data promo berhasil disalin: " + promoData);

      // Menampilkan notifikasi promo berhasil di-claim
      var notificationContainer = document.getElementById(
        "notification-container"
      );
      var notification = document.createElement("div");
      notification.classList.add("claim-notification");
      notification.innerText = "Promo berhasil di-claim!";
      notificationContainer.appendChild(notification);

      // Menghapus notifikasi setelah beberapa detik
      setTimeout(function () {
        notification.remove();
      }, 3000);
    })
    .catch(function (error) {
      console.error("Gagal menyalin data promo: ", error);
    });
}
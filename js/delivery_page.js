// Membuat event pada search
// Digunakan fungsi untuk membuka dan menutup bagian search
document.querySelector('#search-icon').onclick = () =>{
    event.preventDefault();
    document.querySelector('#search-form').classList.toggle('active');
  }
  
  function closeSearchForm() {
    event.preventDefault();
    document.querySelector('#search-form').classList.remove('active');
  }

// Membuat event pada dropdown
// Digunakan fungsi untuk membuka dan menutup menu dropdown
var userIcon = document.querySelector(".fa-solid.fa-user");
var subMenuWrap = document.querySelector(".sub-menu-wrap");

userIcon.addEventListener("click", function () {
    subMenuWrap.classList.toggle("active");
});

// Membuat event pada tombol cart
// Diberikan fungsi agar pada saat user mengklik ikon cart, maka akan terbuka bagian cart dan bisa juga untuk menutup cart
let cartIcon = document.querySelector('#cart-icon');
let cart = document.querySelector('.cart');
let closeCart = document.querySelector('#close');

cartIcon.onclick = () => {
  event.preventDefault();
  cart.classList.add('active');
};
closeCart.onclick = () => {
  cart.classList.remove('active');
};

if (document.readyState == 'loading') {
  document.addEventListener('DOMContentLoaded', ready);
} else {
  ready();
}

// Membuat event pada tombol remove
// Diberikan fungsi agar user dapat menghapus produk yang telah masuk ke keranjang
function ready() {
  var removeCartButtons = document.getElementsByClassName('fa-trash')
  console.log(removeCartButtons)
  for (var i = 0; i < removeCartButtons.length; i++) {
    var button = removeCartButtons[i]
    button.addEventListener('click', removeCartItem)
  }

  // Membuat event pada tombol tambah kuantitas
  // Diberikan fungsi agar user dapat menambah dan mengurangi produk yang telah masuk ke keranjang
  var quantityInputs = document.getElementsByClassName('cart-quantity');
  for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }
}

  // Membuat fungsi agar keitak user mengklik tombol, maka akan terbuka halaman pop up 
  document.getElementById('openPopupButton').addEventListener('click', function() {
  document.getElementById('popupContainer').style.display = 'block';
});

// Membuat fungsi agar keitak user mengklik tombol, maka akan tertutup halaman pop up 
document.getElementById('closePopupButton').addEventListener('click', function() {
  document.getElementById('popupContainer').style.display = 'none';
});
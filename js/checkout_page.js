// Mengambil elemen-elemen yang dibutuhkan
const decrementBtn1 = document.getElementById('decrement-1');
const incrementBtn1 = document.getElementById('increment-1');
const quantity1 = document.getElementById('quantity-1');
const price1 = document.getElementById('price-1');
const decrementBtn2 = document.getElementById('decrement-2');
const incrementBtn2 = document.getElementById('increment-2');
const quantity2 = document.getElementById('quantity-2');
const price2 = document.getElementById('price-2');
const subtotal = document.getElementById('subtotal-1');
const tax = document.getElementById('tax');
const shipping = document.getElementById('shipping');
const total = document.getElementById('total');
const discountInput = document.getElementById('discount-token');
const applyBtn = document.querySelector('.btn-outline');

// Menambahkan event listener untuk tombol Apply
applyBtn.addEventListener('click', function() {
  const discountCode = discountInput.value.trim();
  applyDiscount(discountCode);
});

function applyDiscount(discountCode) {
  let subtotalValue = parseInt(subtotal.innerText.replace(/[^0-9]/g, ''));
  let taxValue = Math.round(subtotalValue * 0.11);
  let shippingValue = parseInt(shipping.innerText.replace(/[^0-9]/g, ''));
  let totalValue = subtotalValue + taxValue + shippingValue;

  if (discountCode === 'POTONGAN30') {
    const discountAmount = Math.round(totalValue * 0.3);
    totalValue -= discountAmount;
    subtotalValue -= discountAmount;
  } else if (discountCode === 'GRATISONGKIR') {
    shippingValue = -20000;
    totalValue = subtotalValue + taxValue + shippingValue;
  }

  total.innerText = 'Rp ' + totalValue.toLocaleString('id-ID');
  subtotal.innerText = 'Rp ' + subtotalValue.toLocaleString('id-ID');
  tax.innerText = 11 + '%';
  shipping.innerText = 'Rp ' + shippingValue.toLocaleString('id-ID');
  document.getElementById('payAmount').innerText = 'Rp ' + totalValue.toLocaleString('id-ID');
}

// Mendefinisikan fungsi untuk menghitung subtotal, PPN, dan total
function calculateTotal() {
  // Mengambil nilai quantity dan harga dari produk 1 dan produk 2
  const quantityValue1 = parseInt(quantity1.innerText);
  const priceValue1 = parseInt(price1.innerText.replace(/[^0-9]/g, ''));
  const quantityValue2 = parseInt(quantity2.innerText);
  const priceValue2 = parseInt(price2.innerText.replace(/[^0-9]/g, ''));

  // Menghitung subtotal, PPN, dan total
  let subtotalValue = quantityValue1 * priceValue1 + quantityValue2 * priceValue2;
  const taxValue = Math.round(subtotalValue * 0.11);
  const shippingValue = 20000;
  let totalValue = subtotalValue + taxValue + shippingValue;

  // Menampilkan hasil perhitungan dalam format Rp x,xxx,xxx
  subtotal.innerText = 'Rp ' + subtotalValue.toLocaleString('id-ID');
  shipping.innerText = 'Rp ' + shippingValue.toLocaleString('id-ID');
  total.innerText = 'Rp ' + totalValue.toLocaleString('id-ID');
  document.getElementById('payAmount').innerText = 'Rp ' + totalValue.toLocaleString('id-ID');
}

// Menambahkan event listener untuk tombol decrement dan increment pada produk pertama
decrementBtn1.addEventListener('click', function() {
  let quantityValue = parseInt(quantity1.innerText);
  if (quantityValue > 1) {
    quantityValue--;
    quantity1.innerText = quantityValue;
    calculateTotal();
  }
});

incrementBtn1.addEventListener('click', function() {
  let quantityValue = parseInt(quantity1.innerText);
  quantityValue++;
  quantity1.innerText = quantityValue;
  calculateTotal();
});

decrementBtn2.addEventListener('click', function() {
  let quantityValue = parseInt(quantity2.innerText);
  if (quantityValue > 1) {
    quantityValue--;
    quantity2.innerText = quantityValue;
    calculateTotal();
  }
});

incrementBtn2.addEventListener('click', function() {
  let quantityValue = parseInt(quantity2.innerText);
  quantityValue++;
  quantity2.innerText = quantityValue;
  calculateTotal();
});

// Menghitung total saat halaman dimuat
calculateTotal();

function selectPaymentMethod(formId, buttonId) {
  // Hide all payment details forms
  var paymentForms = document.getElementsByClassName("payment-details");
  for (var i = 0; i < paymentForms.length; i++) {
      paymentForms[i].style.display = "none";
  }

  // Show the selected payment method form
  var selectedForm = document.getElementById(formId);
  if (selectedForm) {
      selectedForm.style.display = "block";
  }

  // Remove "selected" class from all buttons
  var paymentButtons = document.getElementsByClassName("method");
  for (var j = 0; j < paymentButtons.length; j++) {
      paymentButtons[j].classList.remove("selected");
  }

  // Add "selected" class to the clicked button
  var clickedButton = document.getElementById(buttonId);
  if (clickedButton) {
      clickedButton.classList.add("selected");
  }

  // Show/hide bank selection based on payment method
  var bankSelection = document.getElementById("bankSelection");
  if (buttonId === "bankTransferBtn") {
      bankSelection.style.display = "block";
  } else {
      bankSelection.style.display = "none";
  }
}

function selectBank() {
  var bankOptions = document.getElementById("bankOptions");
  var selectedBank = bankOptions.value;

  var selectedBankElement = document.getElementById("selectedBank");
  selectedBankElement.textContent = selectedBank;
}


document.addEventListener('DOMContentLoaded', function() {
  var accordionHeaders = document.querySelectorAll('.accordion-header');
  
  // Menghubungkan event click pada setiap header accordion
  accordionHeaders.forEach(function(header) {
    header.addEventListener('click', function() {
      // Mengambil konten yang terkait dengan header saat ini
      var content = this.nextElementSibling;
      
      // Toggle kelas 'active' pada header
      this.classList.toggle('active');
      
      // Toggle tampilan konten
      if (content.style.display === 'block') {
        content.style.display = 'none';
      } else {
        content.style.display = 'block';
      }
      
      // Toggle rotasi panah
      var arrow = this.querySelector('.accordion-arrow');
      arrow.classList.toggle('rotate');
    });
  });
});
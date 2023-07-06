// Membuat fungsi untuk countdown time
var countdownElement = document.getElementById('timer');
var countdownDate = new Date();
countdownDate.setHours(countdownDate.getHours() + 24);
countdownDate.setMinutes(0);
countdownDate.setSeconds(0);

function updateCountdown() {
  var now = new Date().getTime();
  var distance = countdownDate - now;

  // mengitung sisa waktu
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // menampilkan sisa waktu
  countdownElement.textContent = hours + " jam " + minutes + " menit " + seconds + " detik";

  if (distance > 0) {
    setTimeout(updateCountdown, 1000);
  } else {
    countdownElement.textContent = "Waktu pembayaran habis!";
  }
}

updateCountdown();
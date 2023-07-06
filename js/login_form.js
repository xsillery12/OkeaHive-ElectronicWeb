// Diberikan fungsi agar dapat show/hide password
function togglePassword(inputId) {
    const passwordInput = document.getElementById(inputId);
    const passwordToggle = document.querySelector(`#${inputId} + .password-toggle i`);
  
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      passwordToggle.classList.remove('fa-eye');
      passwordToggle.classList.add('fa-eye-slash');
    } else {
      passwordInput.type = 'password';
      passwordToggle.classList.remove('fa-eye-slash');
      passwordToggle.classList.add('fa-eye');
    }
  }

  function redirectToIndex() {
    // Lakukan pengalihan halaman ke index.html
    window.location.href = "index.html";
}
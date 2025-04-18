// Adicione isso ao seu arquivo script.js
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('senha');
    const togglePassword = document.querySelector('.toggle-password');
    const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', passwordType);
    togglePassword.textContent = passwordType === 'password' ? '👁️' : '🙈';
}
document.getElementById('loginForm').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (!emailPattern.test(email)) {
        alert("Por favor, ingrese un correo electrónico válido.");
        event.preventDefault();
    }

    if (password.length < 8) {
        alert("La contraseña debe tener al menos 8 caracteres.");
        event.preventDefault();
    }
});

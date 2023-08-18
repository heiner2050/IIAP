function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function isValidPassword(password) {
  return password.length >= 8;
}

function showPasswordUpdateModal() {
  const storedUsuario = localStorage.getItem('usuario');
  const nombreUsuario = storedUsuario ? JSON.parse(storedUsuario).correo : null;

  Swal.fire({
    title: 'Actualizar Contraseña',
    html: `
    <form id="updatePasswordForm">
    <div class="form-group">
      <label for="updateEmail">Correo electrónico</label>
      <input type="email" id="updateEmail" class="form-control" value="${nombreUsuario}" readonly>
      <div class="invalid-feedback" id="emailValidationMessage"></div>
    </div>
    
    <div class="form-group">
      <label for="newPassword">Nueva Contraseña</label>
      <input type="password" id="newPassword" class="form-control" placeholder="Nueva Contraseña" required>
      <div class="invalid-feedback" id="passwordValidationMessage"></div>
    </div>
  </form>
    `,
    focusConfirm: false,
    showCancelButton: true,
    cancelButtonText: 'Cancelar',
    preConfirm: () => {
      const email = document.getElementById('updateEmail').value;
      const newPassword = document.getElementById('newPassword').value;

      const form = document.getElementById('updatePasswordForm');
      const emailValidationMessage = document.getElementById('emailValidationMessage');
      const passwordValidationMessage = document.getElementById('passwordValidationMessage');

      if (!isValidEmail(email)) {
        emailValidationMessage.innerText = 'Ingrese un correo electrónico válido.';
        return false;
      }
      emailValidationMessage.innerText = '';

      if (!isValidPassword(newPassword)) {
        passwordValidationMessage.innerText = 'La contraseña debe tener al menos 8 caracteres.';
        return false;
      }
      passwordValidationMessage.innerText = '';

      updatePassword(email, newPassword);
    },
    didOpen: () => {
      const confirmButton = Swal.getConfirmButton();
      const form = document.getElementById('updatePasswordForm');
      const emailInput = document.getElementById('updateEmail');
      const passwordInput = document.getElementById('newPassword');

      form.addEventListener('input', () => {
        confirmButton.disabled = !isValidEmail(emailInput.value) || !isValidPassword(passwordInput.value);
      });
    },
  });
}

function updatePassword(email, password) {
  fetch('http://localhost/IIAP/api/technical_support/updatePassword.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      email: email,
      password: password
    })
  })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        Swal.fire({
          title: 'Error',
          text: data.error,
          icon: 'error',
          confirmButtonText: 'Cerrar'
        });
      } else {
        Swal.fire({
          title: 'Éxito',
          text: data.message,
          icon: 'success',
          confirmButtonText: 'Cerrar'
        });
      }
    })
    .catch(error => {
      console.error('Error en la solicitud:', error);
      Swal.fire({
        title: 'Error',
        text: 'Ha ocurrido un error al actualizar la contraseña. Intente nuevamente.',
        icon: 'error',
        confirmButtonText: 'Cerrar'
      });
    });
}


const updatePasswordLink = document.getElementById('updatePassword');
updatePasswordLink.addEventListener('click', function () {
  showPasswordUpdateModal();
});





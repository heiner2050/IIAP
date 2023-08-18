const storedUsuario = localStorage.getItem('usuario');
const nombreUsuario = storedUsuario ? JSON.parse(storedUsuario).nombre : null;
const avatarUsuario = storedUsuario ? JSON.parse(storedUsuario).avatar : null;
const idUsuario = storedUsuario ? JSON.parse(storedUsuario).id_usuario : null;

// Buscar los elementos donde se mostrará el nombre y la imagen del usuario y establecer sus contenidos
const nombreUsuarioElement = document.querySelector('.span');
const avatarUsuarioElement = document.querySelector('.avatar');
const usuarioIdInput = document.querySelector('#usuario_id');

nombreUsuarioElement.textContent = nombreUsuario;
avatarUsuarioElement.src = avatarUsuario;
usuarioIdInput.value = idUsuario



function cerrarSesion() {
    const token = localStorage.getItem('token');

    // Mostrar un mensaje de confirmación antes de cerrar la sesión
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Se cerrará la sesión actual.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, cerrar sesión',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      // Si el usuario confirma el cierre de sesión
      if (result.isConfirmed && token) {
        // Realizar la petición para cerrar sesión
        fetch('http://localhost/IIAP/api/login/logout.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            token: token,
          }),
        })
          .then((response) => {
            if (response.ok) {
              // Limpiar datos de sesión en el almacenamiento local
              localStorage.removeItem('usuario');
              localStorage.removeItem('roles');
              localStorage.removeItem('token');
              localStorage.removeItem('session');

              // Si el cierre de sesión fue exitoso
              Swal.fire({
                title: '¡Sesión cerrada!',
                text: 'La sesión se cerró correctamente.',
                icon: 'success',
              }).then(() => {
                // Redirigir a la página de inicio de sesión o a la página de destino deseada
                window.location.href = 'http://localhost/IIAP/index.php';
              });
            } else {
              // Si hubo un error al cerrar sesión
              Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al cerrar la sesión.',
                icon: 'error',
              });
            }
          })
          .catch((error) => {
            // Si ocurrió un error en la petición
            console.error('Error en la petición:', error);
            Swal.fire({
              title: 'Error',
              text: 'Hubo un error en la petición al cerrar sesión.',
              icon: 'error',
            });
          });
      }
    });
  }

  // Agregar el evento de clic al ícono de cerrar sesión fuera de la función cerrarSesion()
  document.getElementById('logoutBtn').addEventListener('click', cerrarSesion);
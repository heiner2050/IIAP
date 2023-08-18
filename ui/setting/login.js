const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', async function(e) {
  e.preventDefault();

  const email = document.getElementById('gmail').value;
  const password = document.getElementById('password').value;

  const data = {
    email: email,
    password: password
  };

  try {
    const response = await fetch('http://localhost/IIAP/api/login/login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    });

    const result = await response.json();

    if (result.error) {
      Swal.fire({
        title: 'Error de inicio de sesión',
        text: result.error,
        icon: 'error',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Entendido'
      });
    } else {
      // Guardar los datos en el almacenamiento local
      localStorage.setItem('usuario', JSON.stringify(result.usuario));
      localStorage.setItem('roles', JSON.stringify(result.roles));
      localStorage.setItem('token', result.token);
      localStorage.setItem('session', JSON.stringify(result.session));

      // Redirect based on user roles
      const roles = result.roles;
      const roleNames = roles.map(role => role.nombre_rol);
      if (roleNames.includes('Admin')) {
        window.location.href = './ui/administration/administration_ui.php';
        
      } else if (roleNames.includes('Jefe_Almacen')) {
        window.location.href = 'http://localhost/gestionIIAP/UI/rol/contractor.php';

      } else if (roleNames.includes('Contratista')) {
        window.location.href ='./ui/bookings/bookings_ui.php';

      }  else if (roleNames.includes('Personal_administrativo')) {
        window.location.href ='./ui/bookings/bookings_ui.php';
      
      }else if (roleNames.includes('Soporte_tecnico')) {
        window.location.href ='./ui/technical_support/technical_ui.php';
      } else {
        // No se encontró un rol válido
        Swal.fire({
          title: 'Acceso denegado',
          text: 'No tienes permiso para acceder a esta página.',
          icon: 'error',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Entendido'
        });
      }
    }
  } catch (error) {
    console.log('Error en la solicitud:', error);
  }
});
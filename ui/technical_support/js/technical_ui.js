async function actualizarEstado(idEquipo) {
  const {
    value: newState
  } = await Swal.fire({
    title: 'Selecciona un nuevo estado',
    input: 'select',
    inputOptions: {
      'Activo': 'Activo',
      'Inactivo': 'Inactivo',
      'Mantenimiento': 'Mantenimiento'
    },
    inputPlaceholder: 'Selecciona un estado',
    showCancelButton: true,
    confirmButtonText: 'Actualizar',
    cancelButtonText: 'Cancelar',
  });

  if (newState) {
    try {
      const response = await fetch(`http://localhost/IIAP/api/technical_support/updateEquipmentState.php?id=${idEquipo}&estado=${newState}`, {
        method: 'PUT' // Removed the extra semicolon here
      });

      const data = await response.json(); // Use await to parse the JSON response

      if (data.error) {
        Swal.fire({
          title: 'Error',
          text: data.error,
          icon: 'error',
          confirmButtonText: 'Cerrar'
        });
      } else {
        Swal.fire({
          title: 'El estado del equipo fue actualizado correctamente',
          text: data.message,
          icon: 'success',
          confirmButtonText: 'Cerrar'
        }).then(() => {
          location.reload(); // Esta línea recargará la página
        });
      }
    } catch (error) {
      console.error('Error en la solicitud:', error);
      Swal.fire({
        title: 'Error',
        text: 'Ha ocurrido un error al actualizar el estado del equipo.',
        icon: 'error',
        confirmButtonText: 'Cerrar'
      });
    }
  }
}

window.addEventListener('DOMContentLoaded', async () => {
  const storedUsuario = localStorage.getItem('usuario');
  const nombreUsuario = storedUsuario ? JSON.parse(storedUsuario).nombre : null;
  const avatarUsuario = storedUsuario ? JSON.parse(storedUsuario).avatar : null;

  // Buscar los elementos donde se mostrará el nombre y la imagen del usuario y establecer sus contenidos
  const nombreUsuarioElement = document.querySelector('.span');
  const avatarUsuarioElement = document.querySelector('.avatar');

  nombreUsuarioElement.textContent = nombreUsuario;
  avatarUsuarioElement.src = avatarUsuario;
  try {
    const response = await fetch('http://localhost/IIAP/api/technical_support/equipmentMaintenance.php');
    const data = await response.json();

    const cantidadEquipos = data.cantidadEquiposMantenimiento;
    const equipos = data.equiposMantenimiento;

    const result = await Swal.fire({
      title: 'Equipos para Mantenimiento',
      text: `Tienes ${cantidadEquipos} equipos para mantenimiento.`,
      icon: 'info',
      confirmButtonText: 'Ver Equipos'
    });

    if (result.isConfirmed) {
const cardDeck = document.querySelector('.card-deck');

let row = document.createElement('div');
row.classList.add('row');
cardDeck.appendChild(row);

equipos.forEach((equipo, index) => {
  if (index % 3 === 0 && index !== 0) {
    // Start a new row for every 3 cards
    row = document.createElement('div');
    row.classList.add('row');
    cardDeck.appendChild(row);
  }

  const col = document.createElement('div');
  col.classList.add('col-md-4', 'mb-3');
  
  const card = document.createElement('div');
  card.classList.add('card');
  card.innerHTML = `
    <img class="card-img-top" src="${equipo.foto}" alt="Foto de equipo">
    <div class="card-body">
      <h5 class="card-title">${equipo.nombre}</h5>
      <p class="card-text">Serial: ${equipo.serial}</p>
      <p class="card-text">Fecha de Mantenimiento: ${equipo.fecha_mantenimiento}</p>
      <p class="card-text">Estado: ${equipo.estado}</p>
      <button class="btn btn-primary" onclick="actualizarEstado(${equipo.id_equipo})">Actualizar Estado</button>
    </div>
  `;

  col.appendChild(card);
  row.appendChild(col);
      });
    }
  } catch (error) {
    console.error('Error al obtener los datos de los equipos:', error);
  }
});
const urlParams = new URLSearchParams(window.location.search);
const idEquipo = urlParams.get('id');

fetch(`http://localhost/IIAP/api/bookings/equipmentById.php?id=${idEquipo}`)
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const equipo = data.equipo;
            document.getElementById('equipoImagen').src = equipo.foto;

            document.getElementById('nombreEquipo').textContent = equipo.nombre;
            document.getElementById('marcaEquipo').textContent = equipo.marca;
            document.getElementById('serialEquipo').textContent = equipo.serial;
            document.getElementById('estadoEquipo').textContent = equipo.estado;
            document.getElementById('fechaMantenimientoEquipo').textContent = equipo.fecha_mantenimiento;
            const equipoIdInput = document.querySelector('#equipo_id');
            equipoIdInput.value = equipo.id_equipo;
            const estadoIdInput = document.querySelector('#estado');
            estadoIdInput.value = 'Pendiente';
            const observacionInput = document.querySelector('#observacion');
            observacionInput.value = 'Sin novedades';


        } else {
            console.log(data.message);
        }
    })
    .catch(error => {
        // Maneja los errores de la solicitud fetch
        console.log('Error en la solicitud fetch:', error);
    });

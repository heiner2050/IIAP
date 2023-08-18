document.addEventListener('DOMContentLoaded', function() {
    const reservarBtn = document.getElementById('reservarBtn');
    const reservacionForm = document.getElementById('reservacionForm');

    reservarBtn.addEventListener('click', function() {
        const formData = {
            usuario_id: document.getElementById('usuario_id').value,
            equipo_id: document.getElementById('equipo_id').value,
            fecha_solicitud: document.getElementById('fecha_solicitud').value,
            estado: document.getElementById('estado').value,
            observacion: document.getElementById('observacion').value,
            cantidad: document.getElementById('cantidad').value,
            fecha_devolucion: document.getElementById('fecha_devolucion').value
        };

        fetch('http://localhost/IIAP/api/bookings/process_reservation.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            Swal.fire({
                title: 'Reservación Exitosa',
                text: 'Se ha realizado la reservación correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        })
        .catch(error => {
            console.error('Error al procesar la reservación:', error);
            // Aquí podrías mostrar una alerta de error si lo deseas
        });
    });
});

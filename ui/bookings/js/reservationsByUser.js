function reserva() {
    // Obtén el usuario_id desde localStorage
    const storedUsuario = localStorage.getItem('usuario');
    const idUsuario = storedUsuario ? JSON.parse(storedUsuario).id_usuario : null;
    
    // Redirige al usuario a la página de reservas con el parámetro idUsuario
    window.location.href = "http://localhost/IIAP/ui/bookings/reservationsByUser.php?usuario_id=" + idUsuario;
}

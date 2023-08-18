<?php
require_once '../../conexion.php';

if (isset($_GET['eliminar_id'])) {
    $eliminar_id = $_GET['eliminar_id'];

    // Consulta SQL para eliminar la reservación
    $eliminar_sql = "DELETE FROM reservaciones WHERE id_reservacion = $eliminar_id";

    if ($conn->query($eliminar_sql) === TRUE) {
        // Éxito al eliminar
        header("Location: http://localhost/IIAP/ui/bookings/bookings_ui.php");
        exit();
    } else {
        // Error al eliminar
        echo "Error al eliminar la reservación: " . $conn->error;
    }
}

$conn->close();
?>

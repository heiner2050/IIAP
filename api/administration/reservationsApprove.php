<?php
require_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_reservacion = $_GET['id'];
    
    // Obtener los detalles de la reservación
    $sql_select = "SELECT * FROM reservaciones WHERE id_reservacion = $id_reservacion";
    $result = $conn->query($sql_select);
    $row = $result->fetch_assoc();

    // Datos de la reservación
    $usuario_id = $row['usuario_id'];
    $equipo_id = $row['equipo_id'];
    $estado = "Pendiente por devolver"; // Estado devuelto
    $observacion = $row['observacion'];
    $Cantidad = $row['Cantidad'];
    $fecha_devolucion = $row['fecha_devolucion'];

    // Insertar el registro en la tabla "devoluciones"
    $sql_insert = "INSERT INTO devoluciones (usuario_id, equipo_id, estado, observacion, Cantidad, fecha_devolucion) VALUES ($usuario_id, $equipo_id, '$estado', '$observacion', $Cantidad, '$fecha_devolucion')";

    if ($conn->query($sql_insert) === TRUE) {
        // Eliminar el registro de la tabla "reservaciones"
        $sql_delete = "DELETE FROM reservaciones WHERE id_reservacion = $id_reservacion";
        if ($conn->query($sql_delete) === TRUE) {
            header("Location: http://localhost/IIAP/ui/administration/reservation.php");
            exit();
        } else {
            echo "Error al eliminar la reservación: " . $conn->error;
        }
    } else {
        echo "Error al transferir la reservación a devoluciones: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>

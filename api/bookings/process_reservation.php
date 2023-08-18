<?php
require_once '../../conexion.php';

// Obtener los datos del cuerpo de la solicitud en formato JSON
$data = json_decode(file_get_contents('php://input'), true);

$usuario_id = $data['usuario_id'];
$equipo_id = $data['equipo_id'];
$fecha_solicitud = $data['fecha_solicitud'];
$estado = $data['estado'];
$observacion = $data['observacion'];
$cantidad = $data['cantidad'];
$fecha_devolucion = $data['fecha_devolucion'];

if ($fecha_devolucion <= $fecha_solicitud) {
    $response = array("error" => "La Fecha de Devolución debe ser mayor que la Fecha de Solicitud.");
    echo json_encode($response);
    exit;
}

$sql = "INSERT INTO reservaciones (usuario_id, equipo_id, fecha_solicitud, estado, observacion, Cantidad, fecha_devolucion)
        VALUES ('$usuario_id', '$equipo_id', '$fecha_solicitud', '$estado', '$observacion', $cantidad, '$fecha_devolucion')";

if ($conn->query($sql) === TRUE) {
    $response = array("message" => "Reservación guardada con éxito.");
    echo json_encode($response);
} else {
    $response = array("error" => "Error: " . $sql . "<br>" . $conn->error);
    echo json_encode($response);
}

$conn->close();
?>

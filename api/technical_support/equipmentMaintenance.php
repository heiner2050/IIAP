<?php
require_once '../../conexion.php';

$queryCantidad = "SELECT COUNT(*) AS cantidadEquiposMantenimiento FROM equipos WHERE estado = 'Mantenimiento'";
$resultCantidad = $conn->query($queryCantidad);
$cantidadEquiposMantenimiento = 0;
if ($resultCantidad->num_rows > 0) {
    $row = $resultCantidad->fetch_assoc();
    $cantidadEquiposMantenimiento = $row["cantidadEquiposMantenimiento"];
}

$queryEquipos = "SELECT * FROM equipos WHERE estado = 'Mantenimiento'";
$resultEquipos = $conn->query($queryEquipos);
$equiposMantenimiento = [];
if ($resultEquipos->num_rows > 0) {
    while ($row = $resultEquipos->fetch_assoc()) {
        $equiposMantenimiento[] = $row;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Envía la respuesta JSON al cliente
$response = [
    'cantidadEquiposMantenimiento' => $cantidadEquiposMantenimiento,
    'equiposMantenimiento' => $equiposMantenimiento
];

header('Content-Type: application/json');
echo json_encode($response);
?>

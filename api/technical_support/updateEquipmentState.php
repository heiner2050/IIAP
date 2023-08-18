<?php
require_once '../../conexion.php';

$response = array(); // Crear un arreglo para la respuesta

// Obtener los parámetros de la petición
$idEquipo = $_GET['id'];
$nuevoEstado = $_GET['estado'];

// Actualizar el estado del equipo en la base de datos
$sql = "UPDATE equipos SET estado = '$nuevoEstado' WHERE id_equipo = $idEquipo";

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
    $response['message'] = "Estado actualizado correctamente";
} else {
    $response['success'] = false;
    $response['message'] = "Error al actualizar el estado: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>

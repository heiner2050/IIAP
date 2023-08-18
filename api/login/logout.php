<?php
require_once '../../conexion.php';
require_once '../../library/consulSQL.php';

// Obtener el token de sesión enviado por el cliente
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Validar si se recibió el token correctamente
if (!isset($data['token'])) {
    $errorResponse = [
        'error' => 'Se requiere el token de sesión'
    ];
    http_response_code(400);
    echo json_encode($errorResponse);
    exit;
}

$token = consultasSQL::CleanStringText($data['token']);

// Consulta para obtener la información de la sesión
$query = "SELECT * FROM sesiones WHERE token = ?";
$statement = $conn->prepare($query);
$statement->bind_param('s', $token);
$statement->execute();

// Obtener el resultado de la consulta
$result = $statement->get_result();
$session = $result->fetch_assoc();

if ($session) {
    // Eliminar la sesión de la tabla sesiones
    $query = "DELETE FROM sesiones WHERE token = ?";
    $statement = $conn->prepare($query);
    $statement->bind_param('s', $token);
    $statement->execute();

    $successResponse = [
        'message' => 'Sesión cerrada exitosamente'
    ];
    http_response_code(200);
    echo json_encode($successResponse);
} else {
    $errorResponse = [
        'error' => 'Token de sesión inválido'
    ];
    http_response_code(404);
    echo json_encode($errorResponse);
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

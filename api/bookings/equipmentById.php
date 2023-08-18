<?php
require_once '../../conexion.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar la consulta SQL para obtener el equipo por ID
    $sql = "SELECT * FROM equipos WHERE id_equipo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $equipo = $result->fetch_assoc();

            $response['success'] = true;
            $response['message'] = "Equipo cargado exitosamente.";
            $response['equipo'] = $equipo;
        } else {
            $response['success'] = false;
            $response['message'] = "Equipo no encontrado.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Error al cargar el equipo: " . $stmt->error;
    }

    $stmt->close();
} else {
    $response['success'] = false;
    $response['message'] = "Método de solicitud inválido o parámetros faltantes.";
}

// Cerrar la conexión
$conn->close();

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);

?>

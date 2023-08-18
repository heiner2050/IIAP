<?php
// Requerir la conexión a la base de datos (ajusta la ruta según tu estructura)
require_once '../../conexion.php';

$response = array();

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Preparar la consulta SQL para buscar equipos por nombre, marca o serial
    $sql = "SELECT * FROM equipos WHERE nombre LIKE '%$query%' OR marca LIKE '%$query%' OR serial LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $equipos = array();

            while ($row = $result->fetch_assoc()) {
                $equipo = array(
                    'id_equipo' => $row['id_equipo'],
                    'nombre' => $row['nombre'],
                    'marca' => $row['marca'],
                    'serial' => $row['serial'],
                    'estado' => $row['estado'],
                    'fecha_mantenimiento' => $row['fecha_mantenimiento'],
                    'cantidad' => $row['cantidad'],
                    'foto' => $row['foto'],
                    'id_categoria' => $row['id_categoria']
                );

                $equipos[] = $equipo;
                
            }

            $response['success'] = true;
            $response['message'] = "Equipos encontrados";
            $response['data'] = $equipos;
        } else {
            $response['success'] = false;
            $response['message'] = "No se encontraron equipos";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Error al ejecutar la consulta: " . $conn->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "No se proporcionó una consulta";
}

// Cerrar la conexión
$conn->close();

// Establecer la cabecera para respuesta JSON
header('Content-Type: application/json');

// Imprimir la respuesta JSON
echo json_encode($response, JSON_PRETTY_PRINT);
?>

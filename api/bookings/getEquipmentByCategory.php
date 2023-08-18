<?php
require_once '../../conexion.php';

if (isset($_GET['id'])) {
    $id_categoria = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    if ($id_categoria !== false) {
        $sql = "SELECT * FROM equipos WHERE id_categoria = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id_categoria);
        $stmt->execute();
        
        $result = $stmt->get_result();

        $equipos = array();
        while ($row = $result->fetch_assoc()) {
            $equipos[] = $row;
        }

        $cantidad = count($equipos);

        // Devolver los resultados en formato JSON
        header('Content-Type: application/json');
        echo json_encode(['equipos' => $equipos, 'cantidad' => $cantidad]);
    } else {
        echo json_encode(['error' => 'ID de categoría no válido']);
    }
} else {
    echo json_encode(['error' => 'ID de categoría no especificado']);
}

$conn->close();
?>
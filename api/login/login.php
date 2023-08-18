<?php
require_once '../../conexion.php';
require_once '../../ui/library/consulSQL.php';
require_once '../../ui/library/SED.php';

// Obtener los valores de los campos enviados por el formulario
$json = file_get_contents('php://input');
$data = json_decode($json, true);

function generateSessionToken()
{
    $length = 32;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }
    return $token;
}

// Validar si se recibieron los datos correctamente
if (!isset($data['email']) || !isset($data['password'])) {
    $errorResponse = [
        'error' => 'Se requieren el correo electrónico y la contraseña'
    ];
    http_response_code(400);
    echo json_encode($errorResponse);
    exit;
}

$email = consultasSQL::CleanStringText($data['email']);
$password = consultasSQL::CleanStringText($data['password']);
$encryptPassword = SED::encryption($password);

// Consulta para obtener el usuario por su correo electrónico y que no haya expirado
$query = "SELECT * FROM usuarios WHERE correo = ?";
$statement = $conn->prepare($query);
$statement->bind_param('s', $email);
$statement->execute();

// Obtener el resultado de la consulta
$result = $statement->get_result();
$usuario = $result->fetch_assoc();

if ($usuario) {
    // Verificar si la contraseña es válida
    if ($encryptPassword == $usuario['contrasena']) {
        // Generar token de sesión
        $token = generateSessionToken();

        // Calcular fechas de creación y expiración de la sesión
        $fechaCreacion = date('Y-m-d H:i:s');
        $fechaExpiracion = date('Y-m-d H:i:s', strtotime('+20 minutes'));

        // Insertar la sesión en la tabla sesiones
        $query = "INSERT INTO sesiones (id_usuario, token, fecha_creacion, fecha_expiracion) VALUES (?, ?, ?, ?)";
        $statement = $conn->prepare($query);
        $statement->bind_param('isss', $usuario['id_usuario'], $token, $fechaCreacion, $fechaExpiracion);
        $statement->execute();

        // Consulta para obtener los roles y permisos del usuario
        $query = "SELECT r.id_roles, r.nombre AS nombre_rol, p.url, p.create, p.read, p.update, p.delete
                  FROM roles r
                  INNER JOIN usuarios_rol ur ON r.id_roles = ur.id_roles
                  INNER JOIN permiso_rol p ON r.id_roles = p.id_roles
                  WHERE ur.id_usuario = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param('i', $usuario['id_usuario']);
        $statement->execute();

        // Obtener el resultado de la consulta
        $result = $statement->get_result();
        $roles = $result->fetch_all(MYSQLI_ASSOC);

        // Consulta para obtener la información de la sesión
        $query = "SELECT * FROM sesiones WHERE token = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param('s', $token);
        $statement->execute();

        // Obtener el resultado de la consulta
        $result = $statement->
        get_result();
        // Obtener la información de la sesión
        $session = $result->fetch_assoc();
            // Eliminar los campos innecesarios del usuario
    unset($usuario['contrasena']);
    unset($usuario['telefono']);
    unset($usuario['sexo']);
    unset($usuario['numero_documento']);

    // Devolver el usuario, roles, permisos y la información de la sesión
    $usuarioAutenticado = [
        'usuario' => $usuario,
        'roles' => $roles,
        'token' => $token,
        'session' => $session
    ];

    // Convertir la información en JSON y enviarla al cliente
    http_response_code(200);
    echo json_encode($usuarioAutenticado);
} else {
    $errorResponse = [
        'error' => 'Contraseña incorrecta'
    ];
    http_response_code(401);
    echo json_encode($errorResponse);
}
} else {
    $errorResponse = [
    'error' => 'Correo incorrecto'
    ];
    http_response_code(404);
    echo json_encode($errorResponse);
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
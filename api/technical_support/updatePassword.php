<?php
require_once '../../conexion.php';
require_once '../../library/consulSQL.php';
require_once '../../library/SED.php';

// Obtain the data sent by the form using POST method
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $json = file_get_contents('php://input');
  $data = json_decode($json, true);

  // Validate data
  if (!isset($data['email']) || !isset($data['password'])) {
    $errorResponse = [
      'error' => 'Se requieren el correo electrónico y la nueva contraseña'
    ];
    http_response_code(400);
    echo json_encode($errorResponse);
    exit;
  }

  $email = consultasSQL::CleanStringText($data['email']);
  $newPassword = consultasSQL::CleanStringText($data['password']);
  $encryptPassword = SED::encryption($newPassword);

  // Update the password in the database for the user with the given email
  $query = "UPDATE usuarios SET contrasena = ? WHERE correo = ?";
  $statement = $conn->prepare($query);
  $statement->bind_param('ss', $encryptPassword, $email);
  if ($statement->execute()) {
    $successResponse = [
      'message' => 'Contraseña actualizada exitosamente'
    ];
    http_response_code(200);
    echo json_encode($successResponse);
  } else {
    $errorResponse = [
      'error' => 'No se pudo actualizar la contraseña. Intente nuevamente.'
    ];
    http_response_code(500);
    echo json_encode($errorResponse);
  }

  $statement->close();
  $conn->close();
}

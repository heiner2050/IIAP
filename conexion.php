<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "iiap";
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a MySQL: " . $conn->connect_error);
}

?>
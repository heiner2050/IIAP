<?php
require_once './conexion.php';
require_once './library/SED.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_documento = $_POST["numero_documento"];
    $nombre = $_POST["nombre"];
    $sexo = $_POST["sexo"];
    $telefono = $_POST["telefono"];
    $tipo_vinculacion = $_POST["tipo_vinculacion"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $encryptPassword = SED::encryption($contrasena);

    // Verificar si se ha subido un archivo
    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] === UPLOAD_ERR_OK) {
        $avatarDir = "./avatar/";
        $avatarPath = $avatarDir . basename($_FILES["avatar"]["name"]);

        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $avatarPath)) {
            $sql = "INSERT INTO usuarios (numero_documento, nombre, sexo, telefono, tipo_vinculacion, correo, contrasena, avatar)
                    VALUES ('$numero_documento', '$nombre', '$sexo', '$telefono', '$tipo_vinculacion', '$correo', '$encryptPassword', '$avatarPath')";

            if ($conn->query($sql) === TRUE) {
                echo 'Envío exitoso: El registro ha sido insertado correctamente.';
            } else {
                echo 'Error en la inserción: Hubo un error al insertar el registro.';
            }

            $conn->close();
        } else {
            echo 'Error al mover el archivo: Hubo un error al mover el archivo.';
        }
    } else {
        echo 'Error en la subida: No se subió un archivo o hubo un error en la subida.';
    }
}
?>

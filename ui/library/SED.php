<?php
define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$SRCB@2017');
define('SECRET_IV', '101712');

class SED {
    // Función para encriptar un string
    public static function encryption($string) {
        $output = FALSE;

        // Generar la clave y el vector de inicialización
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);

        // Encriptar el string utilizando openssl_encrypt
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);

        // Codificar el resultado en base64
        $output = base64_encode($output);

        return $output;
    }

    // Función para desencriptar un string
    public static function decryption($string) {
        // Generar la clave y el vector de inicialización
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);

        // Decodificar el string en base64 y desencriptarlo utilizando openssl_decrypt
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);

        return $output;
    }
}
?>
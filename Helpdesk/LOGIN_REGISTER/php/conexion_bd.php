<?php
    $servername = "127.0.0.1"; 
    $username = "root"; 
    $password = "0725"; // Verifica que la contraseña sea correcta
    $dbname = "helpdesk_db"; 
    $port = 3306; // Si MySQL está corriendo en otro puerto, cámbialo aquí.

    // Conexión a MySQL
    $conexion = new mysqli($servername, $username, $password, $dbname, $port);

    // Manejo de errores en la conexión
    if ($conexion->connect_errno) {
        die("Error de conexión a la base de datos: (" . $conexion->connect_errno . ") " . $conexion->connect_error);
    } else {
        echo "Conexión establecida correctamente.";
    }
?>
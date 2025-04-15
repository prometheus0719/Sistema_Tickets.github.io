<?php
include 'conexion_bd.php'; // Archivo de conexión a la BD

// Recibir los datos del formulario
$nombre_completo = isset($_POST['nombre_completo']) ? $_POST['nombre_completo'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$tipo_usuario = isset($_POST['rol']) ? $_POST['rol'] : ''; // Captura el rol correctamente
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

// Validar que los campos no estén vacíos
if (empty($nombre_completo) || empty($correo) || empty($tipo_usuario) || empty($contrasena)) {
    echo '
        <script>
            alert("Todos los campos son obligatorios. Por favor, completa el formulario.");
            window.location.href = "../php/login_register.php";
        </script>
    ';
    exit();
}

// Encriptamiento seguro de contraseña
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT); // Se mantiene `password_hash()`

// Verificación para evitar registros duplicados
$verificar_datos = mysqli_query($conexion, "SELECT * FROM usuarios 
    WHERE correo='$correo' 
    OR nombre_completo='$nombre_completo'");

if (mysqli_num_rows($verificar_datos) > 0) {
    echo '
        <script>
            alert("El correo o nombre ya está registrado. Intenta con otros diferentes.");
            window.location.href = "../php/login_register.php";
        </script>
    ';
    exit();
}

// Validar el formato del correo institucional
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo '
        <script>
            alert("El formato del correo no es válido.");
            window.location.href = "../php/login_register.php";
        </script>
    ';
    exit();
}

// Extraer el dominio del correo
list($nombreUsuario, $dominio) = explode('@', $correo);

// Verificar si el correo pertenece a la institución
if ($dominio === 'zapopan.tecmm.edu.mx') {    
    // Guardar el usuario en la base de datos con su tipo de rol
    $query = "INSERT INTO usuarios (nombre_completo, tipo_usuario, correo, contrasena) 
              VALUES ('$nombre_completo', '$tipo_usuario', '$correo', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
            <script>
                alert("Usuario almacenado exitosamente.");
                window.location.href = "../php/login_register.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Error al registrar usuario. Inténtalo de nuevo.");
                window.location.href = "../php/login_register.php";
            </script>
        ';
    }
} else {
    echo '
        <script>
            alert("El correo ingresado no pertenece a la institución.");
            window.location.href = "../php/login_register.php";
        </script>
    ';
}

mysqli_close($conexion);
?>
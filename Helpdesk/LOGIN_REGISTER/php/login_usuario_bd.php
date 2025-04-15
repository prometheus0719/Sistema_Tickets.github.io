<?php
session_start();
include 'conexion_bd.php';

// Verificar si se recibieron las variables POST
if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consulta para obtener la contraseña encriptada y el tipo de usuario
    $validar_login = mysqli_query($conexion, "SELECT contrasena, tipo_usuario FROM usuarios WHERE correo='$correo'");

    if (mysqli_num_rows($validar_login) > 0) {
        $fila = mysqli_fetch_assoc($validar_login); // Obtener los datos del usuario
        $hash_guardado = $fila['contrasena']; // Contraseña almacenada en la BD
        $tipo_usuario = $fila['tipo_usuario']; // Tipo de usuario

        // Verificar si la contraseña ingresada coincide con la almacenada
        if (password_verify($contrasena, $hash_guardado)) {
            $_SESSION['usuario'] = $correo;
            $_SESSION['tipo_usuario'] = $tipo_usuario;

            // Redirigir según el rol del usuario
            switch ($tipo_usuario) {
                case 'Jefe de Carrera':
                    echo '<script>window.location.href = "../Areas/jefatura/php/Jefatura.php";</script>';
                    break;
                case 'Área de Mantenimiento':
                    echo '<script>window.location.href = "../Areas/mantenimiento/php/Area_mantenimiento.html";</script>';
                    break;
                case 'Área de Laboratorio':
                    echo '<script>window.location.href = "../Areas/laboratorio/php/Area_laboratorio.html";</script>';
                    break;
                case 'Docente':
                    echo '<script>window.location.href = "../Areas/docente/php/Docente.html";</script>';
                    break;
                default:
                    echo '<script>window.location.href = "../login_register.php";</script>';
                    break;
            }
            exit();
        } else {
            // Si la contraseña no coincide, mostrar mensaje y redirigir
            echo '<script>alert("Contraseña incorrecta. Intenta de nuevo."); window.location.href = "http://localhost/SISTEMA_TICKETS/Helpdesk/LOGIN_REGISTER/login_register.php";</script>';
            exit();
        }
    } else {
        // Si el correo no está registrado
        echo '<script>alert("Usuario no encontrado. Verifica tu correo."); window.location.href = "http://localhost/SISTEMA_TICKETS/Helpdesk/LOGIN_REGISTER/login_register.php";</script>';
        exit();
    }
} else {
    // Si faltan datos en el formulario
    echo '<script>alert("Por favor completa todos los campos."); window.location.href = "http://localhost/SISTEMA_TICKETS/Helpdesk/LOGIN_REGISTER/login_register.php";</script>';
    exit();
}
?>
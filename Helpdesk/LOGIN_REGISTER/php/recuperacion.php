<?php
// recuperacion.php
include 'conexion_bd.php'; // Asegúrate de que la ruta sea correcta
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir PHPMailer usando Composer
require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];

    // Validar el formato del correo
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('El formato del correo no es válido');
                window.location.href = 'formato_recuperacion.html';
              </script>";
        exit();
    }

    // Verificar si el correo existe en la base de datos
    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");
    if (mysqli_num_rows($consulta) > 0) {
        // Generar código único de recuperación y fecha de expiración (1 hora de vigencia)
        $codigo = bin2hex(random_bytes(6)); // Código de 12 caracteres alfanuméricos
        $expiracion = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Actualizar el usuario con el código y la fecha de expiración
        mysqli_query($conexion, "UPDATE usuarios SET recovery_token='$codigo', token_expiration='$expiracion' WHERE correo='$correo'");

        // Construir el enlace de recuperación
        $link = "http://localhost/SISTEMA_TICKETS/Helpdesk/LOGIN_REGISTER/php/restablecer_contrasena.php?token=$codigo";

        // Configurar PHPMailer para enviar el correo usando SMTP de Gmail
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP de Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
            $mail->SMTPAuth = true; // Requiere autenticación
            $mail->Username = 'za19011328@zapopan.tecmm.edu.mx'; // Correo institucional
            $mail->Password = 'TU-CONTRASEÑA-DE-APLICACIÓN'; // Usa la contraseña de aplicación de Google
            $mail->SMTPSecure = 'tls'; // Seguridad TLS
            $mail->Port = 587; // Puerto para envío seguro

            // Configurar el correo
            $mail->setFrom('za19011328@zapopan.tecmm.edu.mx', 'Sistema HelpDesk');
            $mail->addAddress($correo);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = "Hola,\n\nHas solicitado recuperar tu contraseña.\n\nTu código de recuperación es: **$codigo**\n\nPuedes restablecer tu contraseña en el siguiente enlace:\n$link\n\nEste código expirará en 1 hora.\n\nSaludos,\nSistema HelpDesk.";

            // Enviar el correo
            $mail->send();
            
            echo "<script>
                    alert('Se ha enviado un código de recuperación a tu correo.');
                    window.location.href = '../php/recuperacion.html';
                  </script>";
        } catch (Exception $e) {
            echo "<script>
                    alert('Error al enviar el correo: {$mail->ErrorInfo}');
                  </script>";
        }
        exit();
    } else {
        echo "<script>
                alert('El correo ingresado no está registrado.');
                window.location.href = 'formato_recuperacion.html';
              </script>";
        exit();
    }
}
?>
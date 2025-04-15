<?php
// Varios destinatarios
$para  = 'ibarrayair545@gmail.com' . ', '; // atención a la coma
//$para .= 'wez@example.com';

// título
$título = 'Restart de password empresa';
$codigo = rand(1000,9999); 

// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecimiento</title>
</head>
<body>
  <h1>¡Estos son los cumpleaños para Agosto!</h1>
  <div style="text-align:center; background-color:#CCC">
            <p>Restablecer Contraseña</p>
            <h3>'.$codigo.'</h3>
            <img src="../img/logos/tsj_logo.png" alt="Logotipo de TSJ Zapopan" width="170" height="70" loading="lazy">
            <p> <small>Si usted no envio este código favor de omitir</small> </p>
    </div>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
/*
// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
*/
// Enviarlo
mail($para, $título, $mensaje, $cabeceras);
?>
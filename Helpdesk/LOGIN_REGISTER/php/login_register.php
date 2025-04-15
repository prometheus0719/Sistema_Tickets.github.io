<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maxium-scale=1.0, minimun-scale=1.0">
    <title>SISTEMA HELPDESK - Login & Inicio</title>

    <!-- Enlaces a las hojas de estilo CSS -->
    <link rel="stylesheet" href="../css/header_footer.css">
    <link rel="stylesheet" href="../css/carrusel.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <!-- HEADER: Sección del encabezado del sitio -->
    <header>
        <div class="header-content">
            <div class="logo">
                <!-- Logotipo del sitio -->
                <img src="../img/logos/tsj_logo.png" alt="Logotipo de TSJ Zapopan" width="170" height="70" loading="lazy">
                <h1 class="tsj-text">TSJ <b>Zapopan</b></h1>
            </div>
        </div>
    </header>
    <!-- Carrusel -->
    <div class="slider_box">
        <ul>
            <li><img src="../img/login/L_1.png" alt="img_1" width="1300px" height="900px"></li>
            <li><img src="../img/login/L_2.png" alt="img_2" width="1300px" height="900px"></li>
            <li><img src="../img/login/L_3.png" alt="img_3" width="1300px" height="900px"></li>
            <li><img src="../img/login/L_4.png" alt="img_4" width="1300px" height="900px"></li>
            <li><img src="../img/login/L_5.png" alt="img_4" width="1300px" height="900px"></li>
            <li><img src="../img/login/L_6.png" alt="img_4" width="1300px" height="900px"></li>
        </ul>
    </div>

    <!-- Caja Trasera de Login y Registro -->
    <main>
        <div class="container">
            <div class="container-form">
                <form action="../php/login_usuario_bd.php" method="POST" class="sign-in">
                    <h2>Iniciar Sesión</h2>
                    <span>Use su Correo y Contraseña</span>
                    <div class="container-input">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" placeholder="Email" name="correo">
                    </div>
                    <div class="container-input">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" placeholder="Password" name="contrasena">
                    </div>
                    <a href="../php/formato_recuperacion.html">¿Olvidaste tu contraseña?</a>
                    <button type="submit" class="button">INICIAR SESIÓN</button>
                </form>
            </div>
            <div class="container-form">
                <form action="../php/registro_usuario_bd.php" method="POST" class="sign-up">
                    <h2>Registrarse</h2>
                    <span>Use su Correo Electronico para Registrarse</span>
                    <div class="container-input">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                    </div>
                    <div class="container-input">
                        <ion-icon name="person-outline"></ion-icon>
                        <button class="dropdown-button" id="selected-user">Selecciona Usuario</button>
                        <div class="dropdown-content">
                            <a href="#" onclick="seleccionarUsuario('Jefe de Carrera')">Jefe de Carrera</a>
                            <a href="#" onclick="seleccionarUsuario('Área de Mantenimiento')">Área de Mantenimiento</a>
                            <a href="#" onclick="seleccionarUsuario('Área de Laboratorio')">Área de Laboratorio</a>
                            <a href="#" onclick="seleccionarUsuario('Docente')">Docente</a>
                        </div>
                        <input type="hidden" name="tipo_usuario" id="tipo_usuario">
                    </div>

                    <div class="container-input">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" placeholder="Email" name="correo">
                    </div>
                    <div class="container-input">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" placeholder="Password" name="contrasena">
                    </div>
                    <button type="submit" class="button">REGISTRARSE</button>
                </form>
            </div>
        
            <div class="container-welcome">
                <div class="welcome-sign-up welcome">
                    <h3>¡Bienvenido!</h3>
                    <p>Ingrese sus datos personales para usar todas las funciones del sitio</p>
                    <button class="button" id="btn-sign-up">REGISTRARSE</button>
                </div>
                <div class="welcome-sign-in welcome">
                    <h3>¡Hola!</h3>
                    <p>Registrarse con sus datos personales para usar todas las funciones del sitio</p>
                    <button class="button" id="btn-sign-in">INICIAR SESIÓN</button>
                </div>
            </div>        
        </div>
    </main>

    <!-- PIE DE PÁGINA: Información final y enlaces -->
    <div class="container-footer">
        <footer>
            <div class="footer_text">
                © 2025 TSJ Zapopan - Todos los derechos reservados
            </div>
            <!-- Logotipo adicional en la esquina inferior izquierda -->
            <div class="logo-footer-izquierdo">
                <img src="../img/logos/tsj_logo_inferior.png" alt="Logo Footer" style="width: 200px; height: auto;">
            </div>
        </footer>
    </div>

    <!-- Funcionamiento del Login y Registro -->
    <script src="../js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

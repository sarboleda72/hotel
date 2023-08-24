<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p class = "letras">Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion" class="btn__iniciar">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3 class = "letras">¿Aún no tienes una cuenta?</h3>
                        <p class = "letras">Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse" class="btn__iniciar">Registrarse</button>
                    </div>
                </div>
                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/login_usuario.php" class="formulario__login" method="POST">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" name="correo" placeholder="Usuario">
                        <input type="password" name="contrasena" placeholder="Contraseña">
                        <button>Entrar</button>
                    </form>
                    <!--Register-->
                    <form action="php/registro_usuario.php" class="formulario__register" method="POST">
                        <h2>Regístrate</h2>
                        <input type="text" name="nombre_completo"  placeholder="Usuario">
                        <input type="text" name="correo" placeholder="Contraseña">
                        <input type="text" name="usuario" placeholder="Tipo usuario">
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>
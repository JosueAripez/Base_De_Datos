<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Kufam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="./css/inicio.css" rel="stylesheet">
</head>
    
  
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="./images/logo.png" alt="Logo">
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-6">
            <h2 class="text-center mb-4">Inicio de Sesión</h2>

            <!-- Mensajes de Error -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php 
                        $error = $_GET['error'];
                        if ($error == 1) {
                            echo "USUARIO O CONTRASEÑA NO VÁLIDOS";			
                        } elseif ($error == 2) {			
                            echo "DEBES INICIAR SESIÓN";			
                        } elseif ($error == 3) {
                            echo "HAZ CERRADO SESIÓN";
                        }
                    ?>
                </div>
            <?php endif; ?>

            <!-- Formulario -->
            <form method="POST" action="valida.php" class="bg-light p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su nombre de usuario" required autofocus>
            </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Ingrese su contraseña" required>
                    <a href="recuperacion.php" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                    
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <a href="registro.php" class="text-decoration-none">¿No tienes cuenta? ¡Regístrate!</a>
                </div>
            </form>
        </div>
    </div>
    <footer>
    <div class="footer-content">
        <div class="footer-item">
            <img src=".\images\gps.png" alt="Ubicación" class="footer-icon">
            <p>Arenas, 151, Fracc. Playa Ensenada, Ensenada BC, México</p>
        </div>
        <div class="footer-item">
            <img src=".\images\tel.png" alt="Teléfono" class="footer-icon">
            <p>(646) 173 - 4500</p>
        </div>
        <div class="footer-item">
            <img src=".\images\correo.png" alt="Correo" class="footer-icon">
            <p>contacto@hospitalvelmar.com</p>
        </div>
    </div>
  </footer>
</body>
</html>

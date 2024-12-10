<?php 
session_start();

if(isset($_SESSION['nombre'])){

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/inicio.css" rel="stylesheet">
    <link rel="icon" href="./images/logo.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src=".\images\logo.png" alt="Logo">
        <a class="navbar-brand user-name" href="inicio.php">Bienvenido(a): 
        <?php echo $_SESSION['nombre']; ?></a>
    </div>
    <ul class="nav-links">
        <li><a href="inicio.php" class="nav-link active">Inicio</a></li>
        <li><a href="prevencion.php" class="nav-link">Prevención de embarazo</a></li>
        <li><a href="cita_medica.php" class="nav-link">Cita Médica</a></li>
        <li><a href="login.php" class="nav-link">Iniciar sesión</a></li>
        <li><a href="registro.php" class="nav-link">Regístrate</a></li>
        <li><a href="logout.php" class="nav-link">Salir</a></li>
    </ul>
</nav>
<br>

    <!-- Contenedor Principal -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-6">
            <h2 class="text-center mb-4">Descripcion Citas
            </h2>

            <!-- Mensaje de error -->
            <?php if (!empty($mensajeError)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($mensajeError) ?>
                </div>
            <?php } ?>

            <!-- Formulario -->
            <form  class="bg-light p-4 rounded shadow-sm">
                
                <div class="d-flex justify-content-between">

                    <a href="perfil.php">
                        <button class="btn btn-primary">Regresar al Perfil</button>
                    </a>
                </div>
        
            </form>
        </div>
        
    </div>
        <br>
    
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
<?php
}else
    header("Location: login.php?error=2");
?>
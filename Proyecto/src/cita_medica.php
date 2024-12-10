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
            <h2 class="text-center mb-4">Agenda Una Cita Médica
            </h2>

            <!-- Mensaje de error -->
            <?php if (!empty($mensajeError)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($mensajeError) ?>
                </div>
            <?php } ?>

            <!-- Formulario -->
            <form method="POST" action="procesa_registro.php" class="bg-light p-4 rounded shadow-sm">
                <div class="mb-3">
                    <label for="email" class="form-label">Medio de contacto</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su nombre de usuario" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo de la Cita</label>
                    <select name="motivo" id="motivo" class="form-control" required>
                        <option value="">Selecciona un Motivo</option>
                        <option value="1">Información</option>
                        <option value="2">Aborto</option>
                        <option value="3">Revisión</option>
                        <option value="4">Consulta General</option>
                        <option value="5">Mi hija le va a la Chivas</option>
                        <option value="6">Otros</option>                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dateob" class="form-label">Fecha de la Consulta</label>
                    <input type="date" class="form-control" id="dateob" name="dateob" required>
                </div>
                <div class="mb-3">
                    <label for="hora" class="form-label">Hora de la Consulta</label>
                    <input type="time" class="form-control" id="hora" name="hora" value="17:15" required>
                </div>
                <div class="mb-3">
                    <label for="add" class="form-label">Comentarios Adicionales</label>
                    <input type="textarea" class="form-control" id="add" name="add" rows="5" cols="33">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Agendar Cita</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <a href="login.php" class="text-decoration-none">¿Ya tienes cuenta? ¡Inicia Sesión!</a>
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
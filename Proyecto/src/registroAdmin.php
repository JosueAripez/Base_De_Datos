<?php
require_once "libs/conexion.php";
require_once "libs/funciones.php";

session_start();





if (isset($_GET['error'])) {
    $error = $_GET['error'];
    $mensajeError = "";

    if ($error == 1) {
        $mensajeError = "Ocurrió un error al registrar al usuario. Por favor, inténtalo de nuevo.";
    } elseif ($error == 2) {
        $mensajeError = "Faltan datos en el formulario. Completa todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/adminindex.css" rel="stylesheet" />
    <link href="./css/inicio.css" rel="stylesheet">
    <link rel="icon" href="./images/logo.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src=".\images\logo.png" alt="Logo">
        <a class="navbar-brand user-name" href="perfil.php">
            <?php if (isset($_SESSION['nombre'])): ?>
                Bienvenido(a): <?php echo $_SESSION['nombre']; ?>
            <?php else: ?>
                Bienvenido(a)
            <?php endif; ?>
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="inicio.php" class="nav-link">Inicio</a></li>
        <li><a href="prevencion.php" class="nav-link">Prevención de embarazo</a></li>
        <li><a href="<?php echo isset($_SESSION['nombre']) ? 'cita_medica.php' : 'login.php?error=1'; ?>" class="nav-link">Cita Médica</a></li>
        <li><a href="<?php echo isset($_SESSION['nombre']) ? 'historialconsulta.php' : 'login.php?error=1'; ?>" class="nav-link">Mi historial de Citas</a></li>
        <?php if (!isset($_SESSION['nombre'])): ?>
            <li><a href="login.php" class="nav-link">Iniciar sesión</a></li>
            <li><a href="registro.php" class="nav-link active">Regístrate</a></li>
        <?php else: ?>
            <li><a href="logout.php" class="nav-link">Salir</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['idrol']) && $_SESSION['idrol'] == 3): ?>
            <li><a href="adminindex.php" class="nav-link">Administración</a></li>
        <?php endif; ?>
    </ul>
</nav>

    <!-- Contenedor Principal -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-6">
            <h2 class="text-center mb-4">Registro de Usuarios</h2>

            <!-- Mensaje de error -->
            <?php if (!empty($mensajeError)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($mensajeError) ?>
                </div>
            <?php } ?>

            <!-- Formulario -->
            <form method="POST" action="procesaRegAdmin.php" class="bg-light p-4 rounded shadow-sm">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Crea un Nombre para el Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su nombre de usuario" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Crea una Contraseña para el Usuario</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Ingrese su contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="dateob" class="form-label">Fecha de Nacimiento del Usuario</label>
                    <input type="date" class="form-control" id="dateob" name="dateob" required>
                </div>
                <div class="mb-3">
                    <label for="gen" class="form-label">Género del Usuario</label>
                    <select name="gen" id="gen" class="form-control" required>
                        <option value="">Selecciona un Género</option>
                        <?php
                        $lista = listaGeneros();
                        if (is_array($lista)) {
                            foreach ($lista as $valores) {
                                echo "<option value='".$valores['id_genero']."'>".$valores['genero'] ."</option>";
                            }
                        }
                        ?>
                        
                    </select>       
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <a href="adminusuarios.php" class="text-decoration-none">Regresar</a>
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

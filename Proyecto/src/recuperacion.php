<?php
require_once "libs/conexion.php";
require_once "libs/funciones.php";

$error = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/inicio.css" rel="stylesheet">
</head>

<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">
        <img src="./images/logo.png" alt="Logo">
    </div>
</nav>

<!-- Formulario Principal -->
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-12 col-md-6">
        <h2 class="text-center mb-4">Recuperar Contraseña</h2>

        <?php if ($error == 1) { ?>
            <div class="alert alert-danger" role="alert">
                No se encontraron coincidencias. Por favor, verifica tu información e inténtalo de nuevo.
            </div>
        <?php } ?>

        <form method="POST" action="recuperarpwd.php" class="bg-light p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese tu nombre de usuario" required autofocus>
            </div>

            <div class="mb-3">
                <label for="id" class="form-label">ID del Usuario</label>
                <input type="number"  min="1" max="100" min class="form-control" id="id" name="id" placeholder="Ingrese tu ID" required>
            </div>

            <div class="mb-3">
                <label for="dateob" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="dateob" name="dateob" placeholder="Fecha de Nacimiento" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Recuperar</button>
                <button type="reset" class="btn btn-secondary">Limpiar</button>
            </div>

            <div class="mt-5 d-flex justify-content-center">
                <a href="login.php" class="text-decoration-none">¿Ya tienes cuenta? ¡Inicia Sesión!</a>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
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

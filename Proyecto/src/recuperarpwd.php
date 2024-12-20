<?php
require_once "libs/conexion.php";
require_once "libs/funciones.php";

$status = isset($_GET['status']) ? $_GET['status'] : '';
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$dateob = isset($_POST['dateob']) ? $_POST['dateob'] : '';

$contraseña = '';
if ($usuario && $id && $dateob) {
    // Llamar a la función para recuperar la contraseña
    $datos = recuperarpwd($usuario, $id, $dateob);

    if ($datos) {
        $status = 'success';
        $contraseña = $datos['password'];
    } else {
        header('Location: recuperacion.php?error=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña Recuperada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/adminindex.css" rel="stylesheet" />
    <link href="./css/inicio.css" rel="stylesheet">
    <link href="./css/resultado_registro.css" rel="stylesheet">
</head>

<body>

<!-- Header -->
<nav class="navbar">
    <div class="logo">
        <img src="./images/logo.png" alt="Logo">
    </div>
</nav>

<div class="container mt-5">
    <!-- Mensajes según el estado de la recuperación -->
    <?php if ($status == 'success') { ?>
        <div class="alert alert-success" role="alert">
            <strong>Tu contraseña recuperada es:</strong> <?= htmlspecialchars($contraseña) ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger" role="alert">
            No se pudo recuperar tu contraseña. Por favor, verifica tu información e inténtalo de nuevo.
        </div>
    <?php } ?>

    <div class="d-flex justify-content-center mt-4">
        <a href="recuperacion.php" class="btn btn-primary mx-2">Intentar de Nuevo</a>
        <a href="login.php" class="btn btn-secondary mx-2">Iniciar Sesión</a>
    </div>
</div>

<!-- Footer -->
<footer class="mt-5">
    <div class="footer-content">
        <div class="footer-item">
            <img src="./images/gps.png" alt="Ubicación" class="footer-icon">
            <p>Arenas, 151, Fracc. Playa Ensenada, Ensenada BC, México</p>
        </div>
        <div class="footer-item">
            <img src="./images/tel.png" alt="Teléfono" class="footer-icon">
            <p>(646) 173 - 4500</p>
        </div>
        <div class="footer-item">
            <img src="./images/correo.png" alt="Correo" class="footer-icon">
            <p>contacto@hospitalvelmar.com</p>
        </div>
    </div>
</footer>

</body>
</html>

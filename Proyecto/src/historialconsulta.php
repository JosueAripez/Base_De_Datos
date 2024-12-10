<?php
session_start();
if(isset($_SESSION['nombre'])){


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/inicio.css" rel="stylesheet">
    <link rel="icon" href="./images/logo.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src=".\images\logo.png" alt="Logo">
        <a class="navbar-brand user-name" href="inicio.php">Bienvenido(a) a tu historial de consultas: 
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
<div class="container">
    <h2 class="text-center mb-4">Historial de Citas</h2>

    <!-- Tabla de citas médicas -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Motivo</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($citas) > 0): ?>
                <?php foreach($citas as $cita): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cita['fecha_consulta']); ?></td>
                        <td><?php echo htmlspecialchars($cita['hora_consulta']); ?></td>
                        <td>
                            <?php
                            // Mostrar el motivo de la cita, dependiendo del ID (puedes personalizarlo)
                            switch ($cita['motivo_id']) {
                                case 1: echo "Información"; break;
                                case 2: echo "Aborto"; break;
                                case 3: echo "Revisión"; break;
                                case 4: echo "Consulta General"; break;
                                case 5: echo "Mi hija le va a la Chivas"; break;
                                case 6: echo "Otros"; break;
                                default: echo "Desconocido"; break;
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($cita['comentarios']); ?></td>
                        <td>
                            <!-- Aquí puedes agregar enlaces para editar o eliminar, si es necesario -->
                            <a href="editar_cita.php?id=<?php echo $cita['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar_cita.php?id=<?php echo $cita['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No tienes citas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
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
}else {
    header("Location: login.php?error=2");
}
?>

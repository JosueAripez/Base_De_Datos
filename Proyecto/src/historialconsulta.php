<?php
session_start();
require_once "libs/conexion.php";

if (!isset($_SESSION['iduser']) || !isset($_SESSION['nombre'])) {
    header("Location: login.php?error=2");
    exit;
}

// Obtener ID del usuario actual
$id_usuario = $_SESSION['iduser'];
$nombre_usuario = $_SESSION['nombre'];

try {
    // Verificar si la vista ya existe
    $consulta_vista = $conn->prepare("
        SELECT COUNT(*) 
        FROM information_schema.views 
        WHERE table_name = :vista_name
    ");
    $consulta_vista->execute(['vista_name' => "vista_citas_medicas_$id_usuario"]);

    // Crear la vista si no existe
    if ($consulta_vista->fetchColumn() == 0) {
        $crear_vista = $conn->prepare("
            CREATE VIEW vista_citas_medicas_$id_usuario AS
            SELECT 
                id_citas_medicas AS ID,
                DATE(fecha_hora) AS Fecha,
                TIME(fecha_hora) AS Hora,
                id_estados_citas_fk AS Estado_cita
            FROM 
                citas_medicas
            WHERE 
                id_solicitante_fk = :id_usuario
        ");
        $crear_vista->execute(['id_usuario' => $id_usuario]);
    }

    // Obtener datos de la vista
    $consulta_citas = $conn->query("SELECT * FROM vista_citas_medicas_$id_usuario");
    $citas = $consulta_citas->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error al gestionar la vista de citas: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/inicio.css" rel="stylesheet">
    <link href="./css/resultado_registro.css" rel="stylesheet">
    <link rel="icon" href="./images/logo.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src="./images/logo.png" alt="Logo">
        <a class="navbar-brand user-name" href="inicio.php">
            Bienvenido(a) a tu historial de consultas: <?= htmlspecialchars($nombre_usuario) ?>
        </a>
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
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($citas)): ?>
                <?php foreach ($citas as $cita): ?>
                    <tr>
                        <td><?= htmlspecialchars($cita['ID']) ?></td>
                        <td><?= htmlspecialchars($cita['Fecha']) ?></td>
                        <td><?= htmlspecialchars($cita['Hora']) ?></td>
                        <td>
                            <?php
                            // Mostrar el estado de la cita basado en ID (puedes ajustar este mapeo)
                            switch ($cita['Estado_cita']) {
                                case 1: echo "Pendiente"; break;
                                case 2: echo "Confirmada"; break;
                                case 3: echo "Cancelada"; break;
                                default: echo "Desconocido"; break;
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No tienes citas registradas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<br>
<footer>
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

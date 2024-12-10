<?php 
session_start();

if (isset($_SESSION['nombre']) && isset($_SESSION['iduser'])) {
    require_once "libs/conexion.php";
    require_once "libs/funciones.php";
    $id_user = $_SESSION['iduser']; // Usamos 'iduser' de la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda tu Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/adminindex.css" rel="stylesheet" />
    <link href="./css/inicio.css" rel="stylesheet">
    <link rel="icon" href="./images/logo.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src="./images/logo.png" alt="Logo">
        <a class="navbar-brand user-name" href="inicio.php">Bienvenido(a): 
        <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
    </div>
    <ul class="nav-links">
        <li><a href="inicio.php" class="nav-link">Inicio</a></li>
        <li><a href="prevencion.php" class="nav-link">Prevención de embarazo</a></li>
        <li><a href="cita_medica.php" class="nav-link active">Cita Médica</a></li>
        <li><a href="historialconsulta.php" class="nav-link">Mi historial de Citas</a></li>
        <li><a href="logout.php" class="nav-link">Salir</a></li>
        <?php if (isset($_SESSION['idrol']) && $_SESSION['idrol'] == 3): ?>
            <li><a href="adminindex.php" class="nav-link">Administración</a></li>
        <?php endif; ?>
    </ul>
</nav>
<br>

<!-- Contenedor Principal -->
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-12 col-md-6">
        <h2 class="text-center mb-4">Agenda Una Cita Médica</h2>

        <!-- Formulario -->
        <form method="POST" action="procesa_cita.php" class="bg-light p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="motivo" class="form-label">Motivo de la Cita</label>
                <select name="motivo" id="motivo" class="form-control" required>
                    <option value="">Selecciona un Motivo</option>
                    <?php
                        $lista1 = listaMotivos();
                        if (is_array($lista1)) {
                            foreach ($lista1 as $valores1) {
                                echo "<option value='".$valores1['idmotivo_cita']."'>".$valores1['descripcion'] ."</option>";
                            }
                        }
                        ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de la Consulta</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="hora" class="form-label">Hora de la Consulta</label>
                <input type="time" class="form-control" id="hora" name="hora" step="1" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Agendar Cita</button>
                <button type="reset" class="btn btn-secondary">Limpiar</button>
            </div>
        </form>
    </div>
</div>

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
<?php
} else {
    header("Location: login.php?error=2");
    exit;
}
?>



<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();  // Evita el envío del formulario para depuración

        const formData = new FormData(this);
        const dataObj = {};
        
        formData.forEach((value, key) => dataObj[key] = value);

        const motivo = dataObj['motivo'];
        const fecha = dataObj['fecha'];
        const hora = dataObj['hora'];
        const fecha_hora = `${fecha} ${hora}`;

        console.log("Datos enviados al servidor:");
        console.log("ID del Usuario:", '<?php echo $_SESSION['iduser']; ?>');
        console.log("Motivo de la cita:", motivo);
        console.log("Fecha y Hora de la cita:", fecha_hora);

        // Opcional: enviar el formulario después de depuración
        this.submit();
    });
</script>


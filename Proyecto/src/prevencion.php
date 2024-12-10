<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prevención de Embarazo</title>

    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Jockey+One&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-q2P7zyhCbHp0He6Nj3A2hZ9JFsqJrNAXW3pIJ8zhm3Z2jmxukv9Umf4Vp0RY1z1J" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-xYxIRF7q4u+bRgN+0EuVWtTH+LVrqfhB3KrS15IHQ6mIRmHn+6a02v8HtMuN5Wj9" crossorigin="anonymous"></script>
    <link href="./css/adminindex.css" rel="stylesheet" />
    <link href="./css/prevencion.css" rel="stylesheet" />
    <link href="./css/inicio.css" rel="stylesheet" />
    <link rel="icon" href="./images/logo.ico" type="image/x-icon">
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src=".\images\logo.png" alt="Logo">
        <a class="navbar-brand user-name" href="inicio.php">
            <?php if (isset($_SESSION['nombre'])): ?>
                Bienvenido(a): <?php echo $_SESSION['nombre']; ?>
            <?php else: ?>
                Bienvenido(a)
            <?php endif; ?>
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="inicio.php" class="nav-link">Inicio</a></li>
        <li><a href="prevencion.php" class="nav-link active">Prevención de embarazo</a></li>
        <li><a href="<?php echo isset($_SESSION['nombre']) ? 'cita_medica.php' : 'login.php?error=2'; ?>" class="nav-link">Cita Médica</a></li>
        <li><a href="<?php echo isset($_SESSION['nombre']) ? 'historialconsulta.php' : 'login.php?error=2'; ?>" class="nav-link">Mi historial de Citas</a></li>
        <?php if (!isset($_SESSION['nombre'])): ?>
            <li><a href="login.php" class="nav-link">Iniciar sesión</a></li>
            <li><a href="registro.php" class="nav-link">Regístrate</a></li>
        <?php else: ?>
            <li><a href="logout.php" class="nav-link">Salir</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['idrol']) && $_SESSION['idrol'] == 3): ?>
            <li><a href="adminindex.php" class="nav-link">Administración</a></li>
        <?php endif; ?>
    </ul>
</nav>
    <section class="slider">
        <div class="slides">
            <img src="./images/v12_26.png" alt="Prevención del embarazo" />
            <img src="./images/v12_26.png" alt="Educación sexual" />
            <img src="./images/v12_26.png" alt="Apoyo para adolescentes" />
        </div>
    </section>

    <section class="content">
        <h2>¿Por qué es importante la prevención del embarazo adolescente?</h2>
        <p>
            Cada año, millones de adolescentes enfrentan embarazos no planeados, lo que afecta su desarrollo personal, educativo y social. Las complicaciones derivadas del embarazo y parto son la principal causa de muerte en adolescentes entre 15 y 19 años en muchos países en desarrollo.
        </p>
        <section class="video-section">
    <h2>Video: La importancia de la prevención</h2>
    <div class="video-container">
    <iframe 
        width="560" 
        height="315" 
        src="https://www.youtube.com/embed/LxndFZoOQA4" 
        title="Prevención del embarazo adolescente" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
    </iframe>
    </div>
</section>
        <p>
            Además, los embarazos en adolescentes suelen estar vinculados con la falta de acceso a educación sexual, recursos económicos limitados y barreras sociales. Es vital implementar medidas para informar y empoderar a las jóvenes.
        </p>

        <h3>Impacto del embarazo adolescente:</h3>
        <p>
            El embarazo en adolescentes tiene consecuencias a nivel personal y social, incluyendo:
        </p>
        <ul>
            <li><strong>Salud:</strong> Riesgos de complicaciones durante el embarazo y el parto.</li>
            <li><strong>Educación:</strong> Muchas adolescentes abandonan la escuela, limitando sus oportunidades futuras.</li>
            <li><strong>Economía:</strong> El embarazo temprano perpetúa ciclos de pobreza.</li>
            <li><strong>Social:</strong> Estigmatización y discriminación en la comunidad.</li>
        </ul>

        <h3>Estrategias clave para la prevención:</h3>
        <p>
            A través de la educación y el acceso a recursos, es posible reducir significativamente los índices de embarazo en adolescentes. Algunas estrategias efectivas incluyen:
        </p>
        <ul>
            <li>Implementar programas de <strong>educación sexual integral</strong> en las escuelas.</li>
            <li>Proveer acceso gratuito a <strong>métodos anticonceptivos</strong> y asesoramiento.</li>
            <li>Fomentar la <strong>comunicación abierta</strong> entre adolescentes, padres y tutores.</li>
            <li>Crear campañas de concienciación que promuevan la <strong>igualdad de género</strong>.</li>
        </ul>

        <h3>Consejos prácticos para adolescentes:</h3>
        <ul>
            <li>Infórmate sobre los diferentes métodos anticonceptivos y cómo utilizarlos correctamente.</li>
            <li>No tengas miedo de hacer preguntas a profesionales de la salud sobre temas de sexualidad y salud reproductiva.</li>
            <li>Establece metas personales y enfócate en tu educación y desarrollo personal.</li>
            <li>Rodéate de personas que te apoyen y respeten tus decisiones.</li>
        </ul>
    </section>
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

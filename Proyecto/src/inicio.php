<?php 
session_start();

if(isset($_SESSION['nombre'])){

?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Jockey+One&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Junge&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-q2P7zyhCbHp0He6Nj3A2hZ9JFsqJrNAXW3pIJ8zhm3Z2jmxukv9Umf4Vp0RY1z1J" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-xYxIRF7q4u+bRgN+0EuVWtTH+LVrqfhB3KrS15IHQ6mIRmHn+6a02v8HtMuN5Wj9" crossorigin="anonymous"></script>
    <link href="./css/inicio.css" rel="stylesheet" />
    <link href="./css/prevencion.css" rel="stylesheet" />
    <script src="./js/script.js"></script>
    <title>Inicio</title>
    <link rel="icon" href="./images/logo.ico" type="image/x-icon">
</head>

<body>
<nav class="navbar">
    <div class="logo">
        <img src=".\images\logo.png" alt="Logo">
        <a class="navbar-brand user-name" href="perfil.php">Bienvenido(a): 
        <?php echo $_SESSION['nombre']; ?></a>
    </div>
    <ul class="nav-links">
    <li><a href="inicio.php" class="nav-link active">Inicio</a></li>
    <li><a href="prevencion.php" class="nav-link">Prevención de embarazo</a></li>
    <li><a href="cita_medica.php" class="nav-link">Cita Médica</a></li>
    <li><a href="historialconsulta.php" class="nav-link">Mi historial de Citas</a></li>
    <?php if (!isset($_SESSION['nombre'])): ?>
        <li><a href="login.php" class="nav-link">Iniciar sesión</a></li>
        <li><a href="registro.php" class="nav-link">Regístrate</a></li>
    <?php endif; ?>
    <?php if (isset($_SESSION['nombre'])): ?>
        <li><a href="logout.php" class="nav-link">Salir</a></li>
    <?php endif; ?>
</ul>
</nav>

<section class="slider">
        <div class="slides">
            <img src="./images/v1_200.png" alt="Prevención del embarazo" />
            <img src="./images/v15_114.png" alt="Educación sexual" />
            <img src="./images/v12_26.png" alt="Apoyo para adolescentes" />
        </div>
    </section>

    <div class="content">
    <div class="text">
        <h1>Bienvenidos: Hablemos de la Prevención del Embarazo</h1>
        <p>
            La prevención del embarazo es un tema esencial para cuidar la salud, el bienestar y las metas personales de los adolescentes.
            Conocer sobre el cuerpo, las opciones anticonceptivas y la importancia de tomar decisiones responsables es el primer paso
            para construir un futuro pleno y sin sorpresas inesperadas. Aquí encontrarás información clara sobre los métodos disponibles,
            desde los preservativos hasta métodos hormonales, así como la importancia de combinar protección para prevenir enfermedades
            de transmisión sexual (ETS).
        </p>
        <p>
            Además, la prevención del embarazo no solo se trata de métodos, sino también de comunicación y educación.
            Hablar abiertamente con amigos, familiares o profesionales de la salud sobre sexualidad y relaciones puede marcar una gran
            diferencia. Este espacio está diseñado para ofrecerte las herramientas necesarias para que tomes decisiones informadas y responsables,
            respetando siempre tus valores y objetivos personales.
        </p>
    </div>
    <div class="image">
        <img src="./images/v1_211.png" alt="Prevención del Embarazo">
    </div>
</div>

<div class="content">
    <div class="text">
        <h1>Prevención del Embarazo No Deseado</h1>
        <p>
            La prevención del embarazo no deseado es una decisión informada que te permite cuidar tu salud, tus metas y tu bienestar.
            Entender cómo funciona tu cuerpo, conocer los métodos anticonceptivos y aprender a identificar riesgos son pasos esenciales
            para tomar el control de tu vida sexual y reproductiva. Aquí encontrarás información confiable y herramientas prácticas para
            que puedas decidir de manera consciente y responsable.
        </p>
        <p>
            Además, la prevención es mucho más que usar anticonceptivos. Implica educación, comunicación y respeto hacia uno mismo y
            los demás. Hablar sobre sexualidad y relaciones de forma abierta, ya sea con profesionales de la salud o con personas de
            confianza, te ayudará a aclarar dudas y fortalecer tu capacidad de tomar decisiones seguras que se alineen con tus planes
            y valores.
        </p>
    </div>
    <div class="image">
        <img src="./images/v15_30.png" alt="Prevención del Embarazo">
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
<?php
}else
    header("Location: login.php?error=2");
?>
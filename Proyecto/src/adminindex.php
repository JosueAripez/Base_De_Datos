<?php 
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Jockey+One&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Junge&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-q2P7zyhCbHp0He6Nj3A2hZ9JFsqJrNAXW3pIJ8zhm3Z2jmxukv9Umf4Vp0RY1z1J" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-xYxIRF7q4u+bRgN+0EuVWtTH+LVrqfhB3KrS15IHQ6mIRmHn+6a02v8HtMuN5Wj9" crossorigin="anonymous"></script>
    <link href="./css/adminindex.css" rel="stylesheet" />
    <link href="./css/inicio.css" rel="stylesheet" />
    
    <title>Administrador</title>
    <link rel="icon" href="./images/logo.ico" type="image/x-icon">
</head>

<body>
<nav class="navbar">
    <div class="logo">
        <img src=".\images\logo.png" alt="Logo">
        <a class="navbar-brand user-name" href="inicio.php">
            Bienvenido(a), Administrador
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="inicio.php" class="nav-link">Vista Usuario</a></li>
        <li><a href="admin.php" class="nav-link active">Administración</a></li>
        <li><a href="logout.php" class="nav-link">Salir</a></li>
    </ul>
</nav>

<section class="admin-panel">
    <div class="container mt-5">
        <h1 class="text-center">Panel de Administración</h1>
        <div class="row mt-4">
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de Usuarios</h5>
                        <p class="card-text">Ver, editar o eliminar usuarios registrados en la plataforma.</p>
                        <a href="adminusuarios.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            
           
        </div>
    </div>
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

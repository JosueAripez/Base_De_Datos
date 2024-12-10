<?php

require_once "libs/conexion.php";
require_once "libs/funciones.php";
session_start();
if ($_SESSION['idrol'] !=3) {
    header('Location: login.php');
    exit();

    
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Administrador</title>
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Jockey+One&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./css/adminindex.css" rel="stylesheet" />
    <link href="./css/inicio.css" rel="stylesheet" />
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
        <li><a href="admin.php" class="nav-link">Administración</a></li>
        <li><a href="logout.php" class="nav-link">Salir</a></li>
    </ul>
</nav>

<section class="admin-panel">
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Usuarios</h1>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios Registrados</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Password</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $lista = listaUsuarios();
                                    // recuperamos los elementos de la consulta
                                    if (is_array($lista)) {
                                        foreach ($lista as $usuario) {
                                            $id = $usuario['id_usuario'];
                                            $nombre = $usuario['nombre_usuario'];
                                            $fecha = $usuario['fecha_nacimiento'];
                                            $rol = $usuario['password']; // Aquí sería la contraseña, si es lo que quieres mostrar
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $id; ?></th>
                                    <td><?php echo $nombre; ?></td>
                                    <td><?php echo $fecha; ?></td>
                                    <td><?php echo $rol; ?></td>
                                    <td>
                                       
                                        <form action="eliminarUsuario.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</button>
                                        </form>

                                    </td>
                                </tr>
                                <?php 
                                        } // del foreach
                                    } else {
                                        echo "<tr><td colspan=5>No se encontraron datos</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <a href="registroAdmin.php" class="btn btn-success">Agregar Nuevo Usuario</a>
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

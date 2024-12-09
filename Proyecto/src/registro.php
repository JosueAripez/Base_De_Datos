<?php
require_once "libs/conexion.php";
require_once "libs/funciones.php";

// Validar que se reciban los datos
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
    <link href="./css/inicio.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="./images/logo.png" alt="Logo">
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-6">
            <h2 class="text-center mb-4">Registro</h2>

            <!-- Mensaje de error -->
            <?php if (!empty($mensajeError)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($mensajeError) ?>
                </div>
            <?php } ?>

            <!-- Formulario -->
            <form method="POST" action="procesa_registro.php" class="bg-light p-4 rounded shadow-sm">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Crea un Nombre de Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su nombre de usuario" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Crea una Contraseña</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Ingrese su contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="dateob" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="dateob" name="dateob" required>
                </div>
                <div class="mb-3">
                    <label for="gen" class="form-label">Género</label>
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
                    <a href="login.php" class="text-decoration-none">¿Ya tienes cuenta? ¡Inicia Sesión!</a>
                </div>
            </form>
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

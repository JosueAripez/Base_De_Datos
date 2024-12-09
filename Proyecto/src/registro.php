<?php

require_once "libs/conexion.php";
require_once "libs/funciones.php";

// valida que se tienen los valores requeridos
if(isset($_POST['usuario'])!=null && isset($_POST['pwd'])!=null && isset($_POST['dateob'])!=null && isset($_POST['gen'])!=null){
    // almacena la información en la BD
    $res = registraUsuario($_POST['usuario'], $_POST['dateob'], 2, $_POST['gen'], $_POST['pwd']);
    if($res){
    ?>
    <div class="alert alert-success" role="alert">
        El usuario se registro satisfactoriamente
    </div>
    <?php }  
    else {
        ?>
         <div class="alert alert-danger" role="alert">
            Ocurrió un error al registrar al usuario
        </div>        
    <?php 
    } //del else
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css?family=Kufam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
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

            <!-- Formulario -->
            <form method="POST" action="" class="bg-light p-4 rounded shadow-sm">
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
                    <input type="date" class="form-control" id="dateob" name="dateob" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="gen" class="form-label">Genero</label>
                    <select name="gen" required>
                        <option value="">Selecciona un Genero</option>
                        <?php
                            $lista = listaGeneros();
                            if(is_array($lista)){
                                foreach($lista as $valores){
                                    echo "<option value='" . $valores['id_genero'] . "'>" . $valores['genero'] . "</option>";

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
                    <a href="login.php" class="text-decoration-none">¿Ya tienes cuenta? ¡Inicia Sesion!</a>
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
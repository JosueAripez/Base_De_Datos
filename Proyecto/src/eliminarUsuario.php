<?php
require_once "libs/conexion.php";
require_once "libs/funciones.php";


if (isset($_POST['id'])) {
    $id_usuario = $_POST['id']; // Recuperamos el ID del usuario enviado

   
    $res = eliminarUsuario($id_usuario);

    if ($res) {
        
        echo "<div class='alert alert-success' role='alert'>
                El usuario fue eliminado correctamente.
              </div>";
    } else {
        
        echo "<div class='alert alert-danger' role='alert'>
                Ocurrió un error al eliminar al usuario.
              </div>";
    }

    // Redirigimos 
    header("Refresh: 2; url=adminusuarios.php");
    exit();
} else {
   
    header("Location: adminusuarios.php");
    exit();
}
?>

<?php
require_once "libs/conexion.php";
require_once "libs/funciones.php";

if (isset($_POST['usuario']) && isset($_POST['pwd']) && isset($_POST['dateob']) && isset($_POST['gen'])) {
    $usuario = $_POST['usuario'];
    $pwd = $_POST['pwd'];
    $dateob = $_POST['dateob'];
    $gen = $_POST['gen'];

    // Intentar registrar al usuario
    $res = registraUsuario($usuario, $dateob, 2, $gen, $pwd);

    // Redirigir según el resultado
    if ($res) {
        header("Location: resultado_registro.php?status=success");
    } else {
        header("Location: registro.php?error=1");
    }
    exit;
} else {
    // Redirigir si no se completaron los datos del formulario
    header("Location: registro.php?error=2");
    exit;
}
?>

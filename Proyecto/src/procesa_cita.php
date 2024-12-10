<?php
session_start();
require_once "libs/conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['iduser'])) {
        header("Location: login.php?error=2");
        exit;
    }

    // Captura los datos del formulario
    $id_user = $_SESSION['iduser'];
    $motivo = $_POST['motivo'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $hora  = $_POST['hora'] ?? '';

    // Combina fecha y hora en el formato datetime (Ej: 2023-05-01 15:30:00)
    $fecha_hora = "$fecha $hora";

    // Depuración: Verifica datos antes de insertar
    error_log("ID del Usuario: $id_user");
    error_log("Motivo: $motivo");
    error_log("Fecha y Hora: $fecha_hora");

    if (empty($motivo) || empty($fecha) || empty($hora)) {
        header("Location: cita_medica.php?error=1");
        exit;
    }

    try {
        $stmt = $conn->prepare("
            INSERT INTO citas_medicas (id_solicitante_fk, id_motivo_cita, id_medico_fk, fecha_hora, id_estados_citas_fk)
            VALUES (:id_user, :motivo, 4, :fecha_hora, 1)
        ");
        
        $stmt->execute([
            'id_user'   => $id_user,
            'motivo'    => $motivo,
            'fecha_hora' => $fecha_hora
        ]);

        header("Location: historialconsulta.php?success=1");
        exit;

    } catch (PDOException $e) {
        error_log("Fallo al insertar la cita: " . $e->getMessage());
        header("Location: cita_medica.php?error=2");
        exit;
    }
} else {
    header("Location: cita_medica.php");
    exit;
}
?>

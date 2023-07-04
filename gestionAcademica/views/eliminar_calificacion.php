<?php
include_once '../includes/conexion.php';

// Obtener el ID de la calificación a eliminar
if (isset($_GET['id'])) {
    $calificacionId = $_GET['id'];

    // Eliminar la calificación de la base de datos
    $sql = "DELETE FROM calificaciones WHERE idCalificaciones = '$calificacionId'";
    if ($conexion->query($sql) === TRUE) {
        header('Location: ../consultarNotas.php');
        exit();
    } else {
        echo "Error al eliminar la calificación: " . $conexion->error;
    }
} else {
    echo "ID de calificación no proporcionado";
}
?>

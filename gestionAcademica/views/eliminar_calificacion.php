<?php
include('../includes/conexion.php');

// Obtener el ID de la calificación a eliminar
$calificacionId = $_GET['id'];

// Eliminar la calificación de la base de datos
$sql = "DELETE FROM calificaciones WHERE idCalificaciones = '$calificacionId'";
if ($conexion->query($sql) === TRUE) {
    header('Location: ../cosultarNotas.php');
    exit();
} else {
    echo "Error al eliminar la calificación: " . $conexion->error;
}
?>


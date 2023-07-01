<?php
include('../includes/conexion.php');


include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idObservacion = $_POST['id'];

    // Eliminar la observación de la base de datos
    $consultaEliminar = "DELETE FROM observadoracademico WHERE idobservadorAcademico = $idObservacion";
    $resultadoEliminar = mysqli_query($conexion, $consultaEliminar);

    if ($resultadoEliminar) {
   
        echo "Observación eliminada exitosamente.";
    } else {
      
        echo "Error al eliminar la observación.";
    }
}

mysqli_close($conexion);
?>

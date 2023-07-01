<?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $idObservacion = $_POST['id'];
    $fecha = $_POST['fecha'];
    $observacion = $_POST['observacion'];

    // Actualizar la observación en la base de datos
    $consultaActualizar = "UPDATE observadoracademico SET fecha = '$fecha', descripcion = '$observacion' WHERE idobservadorAcademico = $idObservacion";
    $resultadoActualizar = mysqli_query($conexion, $consultaActualizar);

    if ($resultadoActualizar) {
        header('Location: ../listado_observaciones.php');
        exit();
    } else {
        // Hubo un error al actualizar la observación
        echo "Error al actualizar la observación.";
    }
}

mysqli_close($conexion);
?>

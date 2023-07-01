<?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos del formulario
  $fecha = $_POST['fecha'];
  $estudiante = $_POST['estudiante'];
  $observacion = $_POST['observacion'];

  // Realizar la inserción en la tabla observadoracademico
  $consultaObservacion = "INSERT INTO observadoracademico (fecha, descripcion, estudiante_idEstudiante) VALUES ('$fecha', '$observacion', '$estudiante')";
  $resultadoObservacion = mysqli_query($conexion, $consultaObservacion);

  if ($resultadoObservacion) {
    // La inserción en la tabla observadoracademico se realizó correctamente
    $idObservadorAcademico = mysqli_insert_id($conexion); // Obtener el ID de la observación insertada

    // Obtener el ID del docente usando el ID del usuario
    $consultaDocente = "SELECT idDocente FROM docente";
    $resultadoDocente = mysqli_query($conexion, $consultaDocente);

    if ($resultadoDocente && mysqli_num_rows($resultadoDocente) > 0) {
      $filaDocente = mysqli_fetch_assoc($resultadoDocente);
      $idDocente = $filaDocente['idDocente'];

      // Insertar el vínculo en la tabla docente_por_observadoracademico
      $consultaVinculo = "INSERT INTO docente_por_observadoracademico (docente_idDocente, observadorAcademico_idobservadorAcademico)
                          VALUES ('$idDocente', '$idObservadorAcademico')";
      $resultadoVinculo = mysqli_query($conexion, $consultaVinculo);

      if ($resultadoVinculo) {
        header('Location: ../listado_observaciones.php');
        exit();
      } else {
        
        echo "Error al registrar la observación.";
      }
    } else {
      echo "Error: No se encontró el docente.";
    }
  } else {
    echo "Error al registrar la observación.";
  }
}
?>

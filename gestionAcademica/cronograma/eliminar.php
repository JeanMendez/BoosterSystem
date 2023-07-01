<?php
// Verificar si se recibió el ID, el nombre del archivo y la portada
if (isset($_POST['idCronograma']) && isset($_POST['archivo']) && isset($_POST['portada'])) {
  $idCronograma = $_POST['idCronograma'];
  $archivo = $_POST['archivo'];
  $portada = $_POST['portada'];

  // Eliminar el archivo del directorio
  if (unlink('./' . $archivo) && unlink('./' . $portada)) {
    // Conexión a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'boostersystem');

    // Verificar si la conexión fue exitosa
    if ($conexion) {
      // Eliminar el registro de la base de datos
      $sql = "DELETE FROM cronograma WHERE idCronograma = $idCronograma";
      $resultado = mysqli_query($conexion, $sql);

      if ($resultado) {
        header('Location: index.php');
      } else {
        echo 'Error al eliminar el archivo de la base de datos.';
      }

      mysqli_close($conexion);
    } else {
      echo 'Error de conexión a la base de datos.';
    }
  } else {
    echo 'Error al eliminar el archivo o la portada del directorio.';
  }
} else {
  echo 'No se recibieron los datos necesarios para eliminar el archivo y la portada.';
}

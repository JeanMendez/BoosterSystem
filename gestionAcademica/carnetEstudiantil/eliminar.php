<?php
// Verificar si se recibió el ID del carnet a eliminar
if (isset($_GET['id'])) {
  $idCarnet = $_GET['id'];


  $conexion = mysqli_connect('localhost', 'root', '', 'boostersystem');


  if (!$conexion) {
    die('Error de conexión a la base de datos: ' . mysqli_connect_error());
  }

  // Obtener los nombres de los archivos a eliminar
  $sql = "SELECT archivo, portada FROM carnet WHERE idCarnet = $idCarnet";
  $resultado = mysqli_query($conexion, $sql);
  $row = mysqli_fetch_assoc($resultado);
  $archivoCarnet = $row['archivo'];
  $archivoPortada = $row['portada'];

  // Eliminar el carnet de la base de datos
  $sqlEliminar = "DELETE FROM carnet WHERE idCarnet = $idCarnet";
  if (mysqli_query($conexion, $sqlEliminar)) {
    
    $rutaArchivoCarnet = "./" . $archivoCarnet; 
    if (file_exists($rutaArchivoCarnet)) {
      unlink($rutaArchivoCarnet);
      echo 'El carnet y el archivo asociado se eliminaron correctamente.';
      header('Location: ./');
    } else {
      echo 'No se encontró el archivo asociado al carnet.';
    }

 
    $rutaArchivoPortada = "./" . $archivoPortada; 
    if (file_exists($rutaArchivoPortada)) {
      unlink($rutaArchivoPortada);
    }
  } else {
    echo 'Error al eliminar el carnet: ' . mysqli_error($conexion);
  }


  mysqli_close($conexion);
} else {

  echo 'No se especificó el ID del carnet a eliminar.';
}
?>

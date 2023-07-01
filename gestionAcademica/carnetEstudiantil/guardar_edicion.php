<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificar si se recibió el ID del carnet a editar
  if (isset($_POST['id'])) {
    $idCarnet = $_POST['id'];


    $conexion = mysqli_connect('localhost', 'root', '', 'boostersystem');


    if (!$conexion) {
      die('Error de conexión a la base de datos: ' . mysqli_connect_error());
    }

    // Obtener los datos del carnet a editar
    $sql = "SELECT * FROM carnet WHERE idCarnet = $idCarnet";
    $resultado = mysqli_query($conexion, $sql);

    // Comprobar si se encontró el carnet
    if (mysqli_num_rows($resultado) == 1) {
      $row = mysqli_fetch_assoc($resultado);

      // Obtener los valores enviados por el formulario
      $titulo = $_POST['titulo'];
      $estudiante = $_POST['estudiante'];

      // Verificar si se cargó una nueva portada
      if ($_FILES['nuevaPortada']['name']) {
        $nombreArchivo = $_FILES['nuevaPortada']['name'];
        $tempArchivo = $_FILES['nuevaPortada']['tmp_name'];
        $carpetaDestino = './';
        $rutaArchivo = $carpetaDestino . $nombreArchivo;

        // Mover el archivo a la carpeta de destino
        move_uploaded_file($tempArchivo, $rutaArchivo);

        // Actualizar la ruta de la portada en la base de datos
        $sqlActualizarPortada = "UPDATE carnet SET portada = '$rutaArchivo' WHERE idCarnet = $idCarnet";
        mysqli_query($conexion, $sqlActualizarPortada);
      }

      // Verificar si se cargó un nuevo archivo
      if ($_FILES['nuevoArchivo']['name']) {
        $nombreArchivo = $_FILES['nuevoArchivo']['name'];
        $tempArchivo = $_FILES['nuevoArchivo']['tmp_name'];
        $carpetaDestino = './';
        $rutaArchivo = $carpetaDestino . $nombreArchivo;

        // Mover el archivo a la carpeta de destino
        move_uploaded_file($tempArchivo, $rutaArchivo);

        // Actualizar la ruta del archivo en la base de datos
        $sqlActualizarArchivo = "UPDATE carnet SET archivo = '$rutaArchivo' WHERE idCarnet = $idCarnet";
        mysqli_query($conexion, $sqlActualizarArchivo);
      }

      // Actualizar el título y el estudiante del carnet en la base de datos
      $sqlActualizarDatos = "UPDATE carnet SET titulo = '$titulo', estudiante_idEstudiante = $estudiante WHERE idCarnet = $idCarnet";
      mysqli_query($conexion, $sqlActualizarDatos);

      header("Location: index.php");
      exit();
    } else {
      // No se encontró el carnet
      echo 'El carnet especificado no existe.';
    }

 
    mysqli_close($conexion);
  } else {

    echo 'No se especificó el ID del carnet a editar.';
  }
} else {

  echo 'Acceso no permitido.';
}
?>

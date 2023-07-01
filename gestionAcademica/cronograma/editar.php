<?php
// Verificar si se recibieron los datos del formulario de edición
if (isset($_POST['idCronograma']) && isset($_POST['titulo'])) {
    // Obtener los valores enviados desde el formulario
    $idCronograma = $_POST['idCronograma'];
    $titulo = $_POST['titulo'];

    // Conexión a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'boostersystem');

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die('Error de conexión a la base de datos: ' . mysqli_connect_error());
    }

    // Verificar si se seleccionó una nueva portada
    if ($_FILES['nuevaPortada']['error'] === UPLOAD_ERR_OK) {
        $nombreTempPortada = $_FILES['nuevaPortada']['tmp_name'];
        $nombrePortada = $_FILES['nuevaPortada']['name'];
        // Mover la nueva portada a la ubicación deseada
        move_uploaded_file($nombreTempPortada, './' . $nombrePortada);
        // Actualizar la columna de la portada en la base de datos
        $sqlActualizarPortada = "UPDATE cronograma SET portada = '$nombrePortada' WHERE idCronograma = $idCronograma";
        mysqli_query($conexion, $sqlActualizarPortada);
    }

    // Verificar si se seleccionó un nuevo PDF
    if ($_FILES['nuevoPDF']['error'] === UPLOAD_ERR_OK) {
        $nombreTempPDF = $_FILES['nuevoPDF']['tmp_name'];
        $nombrePDF = $_FILES['nuevoPDF']['name'];
        // Mover el nuevo PDF a la ubicación deseada
        move_uploaded_file($nombreTempPDF, './' . $nombrePDF);
        // Actualizar la columna del PDF en la base de datos
        $sqlActualizarPDF = "UPDATE cronograma SET archivo = '$nombrePDF' WHERE idCronograma = $idCronograma";
        mysqli_query($conexion, $sqlActualizarPDF);
    }

    // Actualizar el título en la base de datos
    $sqlActualizarTitulo = "UPDATE cronograma SET titulo = '$titulo' WHERE idCronograma = $idCronograma";
    mysqli_query($conexion, $sqlActualizarTitulo);

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Redireccionar a la página principal o a donde sea necesario
    header('Location: index.php');
    exit();
} else {
    // No se recibieron los datos esperados, redireccionar o mostrar un mensaje de error
    header('Location: index.php');
    exit();
}

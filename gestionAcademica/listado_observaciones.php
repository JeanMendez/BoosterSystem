<?php include_once 'includes/verificarAcceso.php'; ?>
<?php
include('includes/conexion.php');

// Función para eliminar una observación por ID
function eliminarObservacion($conexion, $idObservacion) {
    $sql = "DELETE FROM observadoracademico WHERE idobservadorAcademico = '$idObservacion'";
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
}

// Verificar si se ha proporcionado el ID de la observación a eliminar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idObservacion = $_GET['id'];

    // Eliminar la observación
    if (eliminarObservacion($conexion, $idObservacion)) {
        echo "eliminado";
    } else {
        echo "<script>alert('Error al eliminar la observación.');</script>";
    }
}

// Realizar la consulta para obtener la lista de observaciones
$consultaObservaciones = "SELECT * FROM observadoracademico";
$resultadoObservaciones = mysqli_query($conexion, $consultaObservaciones);

// Verificar si se encontraron observaciones
if (mysqli_num_rows($resultadoObservaciones) > 0) {
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Instituto Gerardo Valencia Cano</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../Layout/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Layout/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Layout/css/AdminLTE.min.css">

  <link rel="stylesheet" href="css/stilos.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="../Layout/css/_all-skins.min.css">
     <link rel="apple-touch-icon" href="../Layout/img/apple-touch-icon.png">
     <link rel="shortcut icon" href="../Imagenes/logo.png">

     <script src="../js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once '../templates/cabecera.php'; ?>
    <?php include_once '../templates/menu.php'; ?>

    <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <section class="estilo">
    <h1>Listado de Observaciones</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Observación</th>
            <th>Fecha</th>
            <th>Estudiante</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Iterar sobre los resultados y mostrar cada observación en una fila de la tabla
        while ($filaObservacion = mysqli_fetch_assoc($resultadoObservaciones)) {
            $idObservacion = $filaObservacion['idobservadorAcademico'];
            $descripcion = $filaObservacion['descripcion'];
            $fecha = $filaObservacion['fecha'];
            $idEstudiante = $filaObservacion['estudiante_idEstudiante'];
            
            // Obtener el nombre del estudiante asociado a la observación
            $consultaEstudiante = "SELECT nombresEstudiante, apellidosEstudiante FROM estudiante WHERE idEstudiante = $idEstudiante";
            $resultadoEstudiante = mysqli_query($conexion, $consultaEstudiante);
            $nombreEstudiante = '';

            if ($resultadoEstudiante && mysqli_num_rows($resultadoEstudiante) > 0) {
                $filaEstudiante = mysqli_fetch_assoc($resultadoEstudiante);
                $nombreEstudiante = $filaEstudiante['nombresEstudiante'] . ' ' . $filaEstudiante['apellidosEstudiante'];
            }
            ?>
            <tr>
                <td><?php echo $idObservacion; ?></td>
                <td><?php echo $descripcion; ?></td>
                <td><?php echo $fecha; ?></td>
                <td><?php echo $nombreEstudiante; ?></td>
                <td>
                    <a href="views/editar_observacion.php?id=<?php echo $idObservacion; ?>">Editar</a>
                    <a href="?id=<?php echo $idObservacion; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta observación?')">Eliminar</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </section>                         
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php include_once '../templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/js/app.min.js"></script>

</body>
</html>
    <?php
} else {
    echo "No se encontraron observaciones registradas.";
}

mysqli_close($conexion);
?>

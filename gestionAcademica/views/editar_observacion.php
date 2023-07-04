<?php
include('../includes/conexion.php');

// Verificar si se recibió el parámetro ID
if (isset($_GET['id'])) {
    $idObservacion = $_GET['id'];

    // Realizar la consulta para obtener los datos de la observación
    $consultaObservacion = "SELECT * FROM observadoracademico WHERE idobservadorAcademico = $idObservacion";
    $resultadoObservacion = mysqli_query($conexion, $consultaObservacion);

    // Verificar si se encontró la observación
    if ($resultadoObservacion && mysqli_num_rows($resultadoObservacion) > 0) {
        $filaObservacion = mysqli_fetch_assoc($resultadoObservacion);
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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Editar Observador</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../../Layout/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../Layout/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../Layout/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../css/stilos.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="../../Layout/css/_all-skins.min.css">
     <link rel="apple-touch-icon" href="../../Layout/img/apple-touch-icon.png">
     <link rel="shortcut icon" href="../../img/logomini.png">

     <script src="../../js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once '../../templates/cabecera.php'; ?>
    <?php include_once '../../templates/menu.php'; ?>

    <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <section class="estilo">

        <h1>Editar Observación</h1>
        <form action="../includes/actualizar_observacion.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $idObservacion; ?>">
            <label for="estudiante">Estudiante:</label>
            <input type="text" name="estudiante" value="<?php echo $nombreEstudiante; ?>" disabled>
            <br>
            <label for="fecha">Fecha:</label>
            <input type="text" name="fecha" value="<?php echo $fecha; ?>">
            <br>
            <label for="observacion">Observación:</label>
            <textarea name="observacion" rows="4" cols="50"><?php echo $descripcion; ?></textarea>
            <br>
            <input type="submit" value="Actualizar">
        </form>
        </section>                         
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php include_once '../../templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../Layout/js/app.min.js"></script>

</body>
</html>


        <?php
    } else {
        echo "No se encontró la observación.";
    }
} else {
    echo "ID de observación no especificado.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

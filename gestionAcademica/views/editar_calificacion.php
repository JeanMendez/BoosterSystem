<?php include_once '../includes/verificarAcceso.php'; ?>
<?php

// Obtener el ID de la calificación a editar
$calificacionId = $_GET['id'];

// Consultar los datos de la calificación desde la base de datos con los nombres de estudiante y asignatura
$sql = "SELECT calificaciones.*, estudiante.nombresEstudiante, asignaturas.nombreAsignatura 
        FROM calificaciones 
        INNER JOIN estudiante ON calificaciones.estudiante_idEstudiante = estudiante.idEstudiante 
        INNER JOIN asignaturas ON calificaciones.asignaturas_idAsignatura = asignaturas.idAsignatura
        WHERE calificaciones.idCalificaciones = '$calificacionId'";
$result = $conexion->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $puntaje = $_POST['puntaje'];
    $estudianteId = $_POST['estudiante_id'];
    $asignaturaId = $_POST['asignatura_id'];

    // Actualizar los datos de la calificación en la base de datos
    $sqlUpdate = "UPDATE calificaciones SET puntaje='$puntaje', estudiante_idEstudiante='$estudianteId', asignaturas_idAsignatura='$asignaturaId' WHERE idCalificaciones='$calificacionId'";
    if ($conexion->query($sqlUpdate) === TRUE) {
        header('Location: ../consultarNotas.php');
        exit();
    } else {
        echo "Error al actualizar la calificación: " . $conexion->error;
    }
}

// Obtener los datos de estudiantes y asignaturas desde la base de datos
$sqlEstudiantes = "SELECT * FROM estudiante";
$resultEstudiantes = $conexion->query($sqlEstudiantes);

$sqlAsignaturas = "SELECT * FROM asignaturas";
$resultAsignaturas = $conexion->query($sqlAsignaturas);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Editar Calificación</title>
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

     <script src="../js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once '../../templates/cabecera.php'; ?>
    <?php include_once '../../templates/menu.php'; ?>

<div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <section class="estilo">
            <h1>Editar Calificación</h1>

    <form method="POST" action="">
        <label>Puntaje:</label>
        <input type="text" name="puntaje" required value="<?php echo $row['puntaje']; ?>">

        <label>Estudiante:</label>
        <select name="estudiante_id" required>
            <?php while ($estudianteRow = $resultEstudiantes->fetch_assoc()) : ?>
                <option value="<?php echo $estudianteRow['idEstudiante']; ?>" <?php if ($estudianteRow['idEstudiante'] === $row['estudiante_idEstudiante']) echo 'selected'; ?>><?php echo $estudianteRow['nombresEstudiante']; ?></option>
            <?php endwhile; ?>
        </select>

        <label>Asignatura:</label>
        <select name="asignatura_id" required>
            <?php while ($asignaturaRow = $resultAsignaturas->fetch_assoc()) : ?>
                <option value="<?php echo $asignaturaRow['idAsignatura']; ?>" <?php if ($asignaturaRow['idAsignatura'] === $row['asignaturas_idAsignatura']) echo 'selected'; ?>><?php echo $asignaturaRow['nombreAsignatura']; ?></option>
            <?php endwhile; ?>
        </select>

        <button type="submit">Guardar</button>
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


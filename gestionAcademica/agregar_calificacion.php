<?php include_once 'includes/verificarAcceso.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $puntaje = $_POST['puntaje'];
    $estudianteId = $_POST['estudiante_id'];
    $asignaturaId = $_POST['asignatura_id'];

    // Insertar los datos de la calificación en la base de datos
    $sql = "INSERT INTO calificaciones (puntaje, estudiante_idEstudiante, asignaturas_idAsignatura) VALUES ('$puntaje', '$estudianteId', '$asignaturaId')";
    if ($conexion->query($sql) === TRUE) {
        header('Location: consultarNotas.php');
        exit();
    } else {
        echo "Error al agregar la calificación: " . $conexion->error;
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

<div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <section class="estilo">
            <h1>Agregar Calificación</h1>

<form method="POST" action="">
    <label>Puntaje:</label>
    <input type="text" name="puntaje" required>

    <label>Estudiante:</label>
    <select name="estudiante_id" required>
        <?php while ($row = $resultEstudiantes->fetch_assoc()) : ?>
            <option value="<?php echo $row['idEstudiante']; ?>"><?php echo $row['nombresEstudiante']; ?></option>
        <?php endwhile; ?>
    </select>

    <label>Asignatura:</label>
    <select name="asignatura_id" required>
        <?php while ($row = $resultAsignaturas->fetch_assoc()) : ?>
            <option value="<?php echo $row['idAsignatura']; ?>"><?php echo $row['nombreAsignatura']; ?></option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Agregar</button>
</form>
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


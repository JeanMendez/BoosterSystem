<?php include_once 'includes/verificarAcceso.php'; ?>
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
    <h1>Registrar Observación</h1>
<form action="includes/guardar_observacion.php" method="POST">
  <label for="fecha">Fecha:</label>
  <input type="date" name="fecha" id="fecha" required>
  <br>
  <label for="estudiante">Estudiante:</label>
  <select name="estudiante" id="estudiante" required>
    <option value="">Seleccionar Estudiante</option>
    <!-- Aquí obtendrías la lista de estudiantes desde la base de datos -->
    <?php
    include('includes/conexion.php');

    // Realizar consulta para obtener la lista de estudiantes
    $consultaEstudiantes = "SELECT idEstudiante, nombresEstudiante, apellidosEstudiante FROM estudiante";
    $resultEstudiantes = mysqli_query($conexion, $consultaEstudiantes);

    if ($resultEstudiantes && mysqli_num_rows($resultEstudiantes) > 0) {
      while ($filaEstudiante = mysqli_fetch_assoc($resultEstudiantes)) {
        $idEstudiante = $filaEstudiante['idEstudiante'];
        $nombresEstudiante = $filaEstudiante['nombresEstudiante'];
        $apellidosEstudiante = $filaEstudiante['apellidosEstudiante'];
        echo "<option value=\"$idEstudiante\">$nombresEstudiante $apellidosEstudiante</option>";
      }
    }
    ?>
  </select>
  <br>
  <label for="observacion">Observación:</label>
  <textarea name="observacion" id="observacion" rows="4" cols="50" required></textarea>
  <br>
  <input type="submit" value="Guardar">
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
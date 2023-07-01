<?php include_once 'includes/verificarAcceso.php'; ?>
<?php
// Consultar las calificaciones desde la base de datos con los nombres de estudiante y asignatura
$sql = "SELECT calificaciones.idCalificaciones, calificaciones.puntaje, estudiante.nombresEstudiante, asignaturas.nombreAsignatura 
        FROM calificaciones 
        INNER JOIN estudiante ON calificaciones.estudiante_idEstudiante = estudiante.idEstudiante 
        INNER JOIN asignaturas ON calificaciones.asignaturas_idAsignatura = asignaturas.idAsignatura";
$result = $conexion->query($sql);
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
            <h1>Lista de Calificaciones</h1>

    <a href="agregar_calificacion.php">Agregar Calificación</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Puntaje</th>
            <th>Estudiante</th>
            <th>Asignatura</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['idCalificaciones']; ?></td>
            <td><?php echo $row['puntaje']; ?></td>
            <td><?php echo $row['nombresEstudiante']; ?></td>
            <td><?php echo $row['nombreAsignatura']; ?></td>
            <td>
                <a href="views/editar_calificacion.php?id=<?php echo $row['idCalificaciones']; ?>">Editar</a>
                <a href="views/eliminar_calificacion.php?id=<?php echo $row['idCalificaciones']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
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
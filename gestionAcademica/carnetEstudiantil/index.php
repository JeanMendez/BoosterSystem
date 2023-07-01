<?php include_once '../includes/verificarAcceso.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Instituto Gerardo Valencia Cano</title>
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
     <link rel="shortcut icon" href="../../Imagenes/logo.png">

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
            <div class="card">
      <div class="card-header">
        <h4>Carnet Estudiantil</h4>
        <br>
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar</a>
      </div>
      <div class="card-body">
        <div class="table-responsive-sm">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Portada</th>
                <th scope="col">PDF</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Acciones</th>

              </tr>
            </thead>
            <tbody>
              <?php
              
              $conexion = mysqli_connect('localhost', 'root', '', 'boostersystem');

        
              if (!$conexion) {
                die('Error de conexión a la base de datos: ' . mysqli_connect_error());
              }

              // Consulta SQL obtener registros del carnet y el nombre del estudiante
              $sql = "SELECT c.*, e.nombresEstudiante, e.apellidosEstudiante
                      FROM carnet c
                      INNER JOIN estudiante e ON c.estudiante_idEstudiante = e.idEstudiante";

              // Ejecutar la consulta
              $resultado = mysqli_query($conexion, $sql);

              // Comprobar si se encontraron registros
              if (mysqli_num_rows($resultado) > 0) {
                
                while ($row = mysqli_fetch_assoc($resultado)) {
                  echo '<tr>';
                  echo '<td>' . $row['titulo'] . '</td>';
                  echo '<td><img src="./' . $row['portada'] . '" alt="Portada" width="50"></td>';
                  echo '<td><a href="./' . $row['archivo'] . '" target="_blank">Ver/Descargar</a></td>';
                  echo '<td>' . $row['nombresEstudiante'] . ' ' . $row['apellidosEstudiante'] . '</td>';
                  echo '<td>';
                  echo '<a href="editar.php?id=' . $row['idCarnet'] . '" class="btn btn-primary">Editar</a>';
                  echo ' ';
                  echo '<a href="eliminar.php?id=' . $row['idCarnet'] . '" class="btn btn-danger">Eliminar</a>';
                  echo '</td>';
                  echo '</tr>';

                }
              } else {
          
                echo '<tr><td colspan="5">No se encontraron registros en el carnet</td></tr>';
              }

      
              mysqli_close($conexion);
              ?>
            </tbody>
          </table>
        </div>

      </div>

    </div>
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
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

  <link rel="stylesheet" href="../Gestion_academica/css/boletines.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="../Layout/css/_all-skins.min.css">
     <link rel="apple-touch-icon" href="../Layout/img/apple-touch-icon.png">
     <link rel="shortcut icon" href="../Imagenes/logo.png">

     <script src="../js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once './templates/cabecera.php'; ?>
    <?php include_once './templates/menu.php'; ?>

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <section class="observador-estudiantil">
                <h2>Observador Estudiantil</h2>
                <div class="filtros">
                  <label for="input-nombre">N° identidad:</label>
                  <input type="text" id="input-nombre" placeholder="Ingrese el número de identidad">
                  <button id="btn-buscar">Buscar</button>
                </div>
                <div class="tabla">
                  <h4>Información del estudiante</h4>
                  <table>
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John</td>
                        <td>Carlos</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="anotaciones">
                  <h4>Anotaciones</h4>
                  <table>
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Observación</th>
                        <th>Compromiso</th>
                        <th>Docente encargado</th>
                      </tr>
                    </thead>
                    <tbody id="tabla-anotaciones">
                        <tr>
                            <td>12/03/2023</td>
                            <td>Se robo un lapicero al compa compañero</td>
                            <td>No robar lapiceros</td>
                            <td>Jose ignacio</td>
                          </tr>
                    </tbody>
                  </table>
                </div>
              </section>
                   
            
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include_once './templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/js/app.min.js"></script>

</body>
</html>
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
          <label for="input-nombre"></label>
          <input type="text" id="input-nombre" placeholder="N° identidad">
          <button id="btn-buscar">Buscar</button>
        </div>
        <div class="tabla">
          <h3>Información del estudiante</h3>
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
                <td>Doe</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="observacion">
          <h4>Observación</h4>
          <textarea rows="4" cols="50" placeholder="Escriba su observación aquí"></textarea>
        </div>
        <div class="compromiso">
          <h4>Compromiso del estudiante</h4>
          <textarea rows="4" cols="50" placeholder="Escriba el compromiso del estudiante aquí"></textarea>
        </div>
          <label for="select-docentes">Docente encargado:</label>
          <select id="select-docentes">
            <option value="">Seleccione un docente</option>
            <option value="1">Docente 1</option>
            <option value="2">Docente 2</option>
            <option value="3">Docente 3</option>
          </select>
          <label for="input-fecha"></label>
          <input type="date" id="input-fecha">
          <button id="btn-guardar">Guardar</button>
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
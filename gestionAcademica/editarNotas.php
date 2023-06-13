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
    
    <?php include_once './templates/cabecera.php'; ?>
    <?php include_once './templates/menu.php'; ?>

    <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <section class="estilo">
                <h2>Editar Nota</h2>
                <hr style="border: 1px solid gray;">
                <div class = "padding" >
                <div class="tabla">
                    <h3>Alumno:</h3>
                    <table>
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Apellidos</th>
                          <th>Número documento</th>
                          <th>Curso</th>
                          <th>Periodo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Juan</td>
                          <td>Pérez</td>
                          <td>123456789</td>
                          <td>Segundo</td>
                          <td>2</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                <div class="tabla">
                  <table>
                    <thead>
                      <tr>
                        <th>Materia</th>
                        <th>Nota</th>
                        <th>Desempeño</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Matemáticas</td>
                        <td><input type="text" value="4.5"></td>
                        <td>
                            <select>
                              <option value="Excelente">Excelente</option>
                              <option value="Bueno">Bueno</option>
                              <option value="Regular">Regular</option>
                              <option value="Deficiente">Deficiente</option>
                            </select>
                          </td>
                        <td>
                        <button type="submit" onclick="mostrarAlerta1()">Guardar</button>
                        <button type="submit" onclick="mostrarConfirmacion2()">Cancelar</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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

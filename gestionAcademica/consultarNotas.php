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
                <h2>Consultar y registrar notas</h2>
                <div class="filtros">
                  <label for="input-nombre"></label>
                  <input type="text" id="input-nombre" placeholder="N° identidad">
                  <select id="select-ano">
                    <option value="">Año lectivo</option>
                    <option value="2020-2021">2020-2021</option>
                    <option value="2021-2022">2021-2022</option>
                    <option value="2022-2023">2022-2023</option>
                   </select>
                  <button id="btn-buscar">Buscar</button>
                </div>
                <div class="tabla">
                  <h3>Alumno</h3>
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
                  <h3>Tabla de notas por materia</h3>
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
                        <td>4.5</td>
                        <td>Bueno</td>
                        <td><a href="editarNotas.php" class="btn-editar">Editar</a></td>
                      </tr>
                      <tr>
                        <td>Ciencias</td>
                        <td>3.0</td>
                        <td>Regular</td>
                        <td><a href="editarNotas.php" class="btn-editar">Editar</a></td>
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
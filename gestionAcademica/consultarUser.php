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
            <h2>Consultar y editar usuarios</h2>

            <div class="filtros">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol">
                  <option value="">Todos</option>
                  <option value="coordinador">Coordinador</option>
                  <option value="estudiante">Estudiante</option>
                  <option value="secretaria">Secretaria</option>
                  <option value="acudiente">Acudiente</option>
                  <option value="profesor">Profesor</option>
                </select>
        
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos">
                <button id="btn-buscar">Buscar</button>
            </div>            
            
            <table class = "tabla">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Número de documento</th>
                  <th>Correo</th>
                  <th>Rol</th>
                  <th>Contraseña</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>John</td>
                  <td>Doe</td>
                  <td>123456</td>
                  <td>johndoe@example.com</td>
                  <td>Estudiante</td>
                  <td>********</td>
                  <td>
                  <button type="submit">Guardar</button>
                <button type="submit" onclick="mostrarConfirmacion()">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <td>Jane</td>
                  <td>Doe</td>
                  <td>654321</td>
                  <td>janedoe@example.com</td>
                  <td>Profesor</td>
                  <td>********</td>
                  <td>
                  <button type="submit" >Guardar</button>
                <button type="submit" onclick="mostrarConfirmacion()">Eliminar</button>
                  </td>
                </tr>
                <!-- ... -->
              </tbody>
            </table> 
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

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

<!-- inicia contenido -->
<div class="content-wrapper">

<!-- Main contenido -->
<section class="content">

  <section class="estilo">
    <h2>Registro de usuarios</h2>
    <hr style="border: 1px solid gray;">

    <form action="./includes/validar.php" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
      </div>
      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
      </div>
      <div class="form-group">
        <label for="tipoDocumento">Tipo de documento:</label>
        <select id="tipoDocumento" name="tipoDocumento" required>
          <option value="">Seleccione una opción</option>
          <option value="CC">Cédula de ciudadanía</option>
          <option value="TI">Tarjeta de identidad</option>
        </select>
      </div>
      <div class="form-group">
        <label for="numeroDocumento">Número de documento:</label>
        <input type="text" id="numeroDocumento" name="numeroDocumento" required>
      </div>
      <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
      </div>
      <div class="form-group">
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
          <option value="">Seleccione una opción</option>
          <option value="coordinador">Coordinador</option>
          <option value="estudiante">Estudiante</option>
          <option value="secretaria">Secretaria</option>
          <option value="acudiente">Acudiente</option>
          <option value="profesor">Profesor</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" value="Guardar" name="registrar">Registrar</button>
      </div>
    </form>
  </section>   

</section>
</div><!-- fin del contenido -->

<?php include_once './templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/js/app.min.js"></script>

</body>
</html>
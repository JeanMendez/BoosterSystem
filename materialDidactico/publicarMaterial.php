<?php include_once 'includes/verificarAcceso.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Publicar Material</title>
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
     <link rel="shortcut icon" href="../img/logomini.png">

     <script src="../js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once '../templates/cabecera.php'; ?>
    <?php include_once '../templates/menu.php'; ?>

<!-- inicia contenido -->
<div class="content-wrapper">

<!-- Main contenido -->
<section class="content">

  <section class="estilo">
    <h2>Publicar Material Didactico</h2>
    <hr style="border: 1px solid gray;">

    <form action="./includes/registrarMaterial.php" method="POST">
      <div class="form-group">
        <label for="nombreMaterial">Nombre:</label>
        <input type="text" id="nombreMaterial" name="nombreMaterial" required>
      </div>
      <div class="form-group">
        <label for="categoriaMaterial">Categoria:</label>
        <select id="categoriaMaterial" name="categoriaMaterial" required>
          <option value="">Seleccione una opción</option>
          <option value="suspenso">Suspenso</option>
          <option value="terror">Terror</option>
          <option value="romance">Romance</option>
        </select>
      </div>
      <div class="form-group">
        <label for="fechaMaterial">Fecha de publicacion:</label>
        <input type="date" id="fechaMaterial" name="fechaMaterial" required>
      </div>
      <div class="form-group">
        <label for="archivoMaterial">Archivo:</label>
        <input type="file" id="archivoMaterial" name="archivoMaterial" required>
      </div>
      <div class="form-group">
        <label for="descripcionMaterial">Descripcion:</label>
        <input type="text" id="descripcionMaterial" name="descripcionMaterial" required>
      </div>
      <div class="form-group">
        <label for="tipoMaterial">Tipo:</label>
        <select id="tipoMaterial" name="tipoMaterial" required>
          <option value="">Seleccione una opción</option>
          <option value="libro">Libro</option>
          <option value="cartilla">Cartilla</option>
          <option value="guia">Guia</option>
        </select>
      </div>
      <div class="form-group">
        <label for="autorMaterial">Autor:</label>
        <input type="text" id="autorMaterial" name="autorMaterial">
      </div>
      <div class="form-group">
        <button type="submit" value="registrar" name="registrar">Registrar</button>
      </div>
    </form>
  </section>   

</section>
</div><!-- fin del contenido -->

<?php include_once '../templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/js/app.min.js"></script>

</body>
</html>
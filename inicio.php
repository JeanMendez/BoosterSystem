<?php

include('includes/conexion.php');
session_start();

if(isset($_SESSION['documentoUsuario'])){

    $documentoUsuario_sesion = $_SESSION['documentoUsuario'];
    

$consulta = "SELECT * FROM usuarios WHERE documentoUsuario = '$documentoUsuario_sesion'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    // Asigna los demás valores a las variables correspondientes
    $tipoDocumentoUsuario = $fila['tipoDocumentoUsuario'];
    $documentoUsuario = $fila['documentoUsuario'];
    $nombresUsuario = $fila['nombresUsuario'];
    $apellidosUsuario = $fila['apellidosUsuario'];
    $telefonoUsuario = $fila['telefonoUsuario'];
    $correoUsuario = $fila['correoUsuario'];
    $passwordUsuario = $fila['passwordUsuario'];
    $estadoUsuario = $fila['estadoUsuario'];
    $rol_idRol = $fila['rol_idRol'];
}
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
  <link rel="stylesheet" href="Layout/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Layout/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Layout/css/AdminLTE.min.css">
  

    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="Layout/css/_all-skins.min.css">
     <link rel="apple-touch-icon" href="Layout/img/apple-touch-icon.png">
     <link rel="shortcut icon" href="img/logomini.png">

     <script src="js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once 'templates/cabecera.php'; ?>
    <?php include_once 'templates/menu.php'; ?>

<!-- inicia contenido -->
<div class="content-wrapper">

<!-- Main contenido -->
<section class="content">
<h3>  Querido usuario</h3>
                    <div class="container-fluid-1 pt-5">
      <div class="estilo">
        <div class="text-center">
          <h1>Bienvenido a su institución Gerardo Valencia Cano</h1>
        <br>
        <div>
          <img src="img/valenciacano.jpg" alt="" width="50%">  
        </div>
      </p>Somos una institución dedicada a la formación de jóvenes líderes, comprometidos con el desarrollo sostenible y la construcción de una sociedad más justa y equitativa.
      </p>Nuestra misión es proporcionar una educación integral de alta calidad, que fomente el pensamiento crítico, la creatividad y la innovación.
      </p>A lo largo de nuestra trayectoria, hemos formado a miles de profesionales destacados en diversas áreas, 
      </p>que han contribuido al desarrollo de sus comunidades y del país en general.
      </p>Nuestro compromiso con la excelencia académica y la formación de ciudadanos responsables nos impulsa a seguir creciendo y mejorando día a día.
      </p>Únete a nuestra comunidad educativa y sé parte del cambio que queremos ver en el mundo.
      </div>
    </div>
                

      <?php
}else{
    header('Location: login');
}
?>

</section>
</div><!-- fin del contenido -->

<?php include_once 'templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="Layout/js/app.min.js"></script>

</body>
</html>
  

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
     <link rel="shortcut icon" href="Imagenes/logo.png">

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

      <?php
         echo "<a href='login/cerrarSesion.php'>Cerrar sesión</a>";
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
  

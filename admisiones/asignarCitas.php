<?php include_once 'includes/verificarAcceso.php'; ?>
<?php
$idInteresados = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");
$consulta = "SELECT * FROM interesados WHERE idInteresados = $idInteresados";
$resultado = mysqli_query($conexion, $consulta);
$interesado = mysqli_fetch_assoc($resultado);

// Verificar si se encontró el usuario
if (!$idInteresados) {
    
    exit("El id no existe");
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
    
    <?php include_once '../templates/cabecera.php'; ?>
    <?php include_once '../templates/menu.php'; ?>

<div class="content-wrapper">
        <form action="includes/insertarCita.php" method="POST">
          <section class="content">
            <section class="estilo">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agendar cita prueba de admision&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2><br><br>

                <div class="filtros">
                  <label for="numeroDocumento">Número de documento:</label>
                  <input type="text" id="numeroDocumento" name="numeroDocumento" value="<?php echo $interesado['documentoInteresados']; ?>">
                </div>
                <div class="filtros">
                  <label >Fecha / Hora:</label>
                  <input type="datetime-local" id="fechaHora" name="fechaHora" required>
                </div>  
                <br>
                <button id="btn-agendar">Agendar</button>
              </section>        
          </section><!-- /.content -->
        </form>
        
</div><!-- /.content-wrapper -->

<?php include_once '../templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/js/app.min.js"></script>

</body>
</html>
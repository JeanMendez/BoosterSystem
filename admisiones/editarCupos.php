<?php include_once 'includes/verificarAcceso.php'; ?>
<?php
$idCupos = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");
$consulta = "SELECT * FROM cupos WHERE idCupos = $idCupos";
$resultado = mysqli_query($conexion, $consulta);
$cantidad = mysqli_fetch_assoc($resultado);

// Verificar si se encontró el usuario
if (!$idCupos) {
    // Manejar el caso de usuario no encontrado, redireccionar o mostrar un mensaje de error
    exit("El id no existe");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Editar cupos</title>
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

    <div class="content-wrapper">
    <section class="content">
        <section class="estilo">
            <h2 class="text-center">Editar cupos</h2>
            <form action="includes/editarCupos.php" method="POST">
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="text" id="cantidad" name="cantidad"  value="<?php echo $cantidad['cantidad']; ?>" required>
                </div>
                <input type="hidden" name="idCupos" value="<?php echo $cantidad['idCupos']; ?>"><br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Editar</button>
                    <a href="./consultarCupos.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </section>
    </section>
    </div>
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
<?php include_once '../includes/verificarAcceso.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $portada = $_FILES['foto'];
  $archivo = $_FILES['archivo'];

  $directorio_destino = './';
  
  // Generar un nombre único para la portada
  $portada_nombre = date('YmdHis') . '_' . $portada['name'];
  move_uploaded_file($portada['tmp_name'], $directorio_destino . $portada_nombre);

  // Generar un nombre único para el archivo
  $archivo_nombre = date('YmdHis') . '_' . $archivo['name'];
  move_uploaded_file($archivo['tmp_name'], $directorio_destino . $archivo_nombre);

  // Conexión a la base de datos
  $conexion = mysqli_connect('localhost', 'root', '', 'boostersystem');

  // Verificar si la conexión fue exitosa
  if (!$conexion) {
    die('Error de conexión a la base de datos: ' . mysqli_connect_error());
  }

  // Preparar la consulta SQL para insertar los datos
  $sql = "INSERT INTO cronograma (titulo, portada, archivo) VALUES ('$titulo', '$portada_nombre', '$archivo_nombre')";

  // Ejecutar la consulta
  if (mysqli_query($conexion, $sql)) {
    echo "Datos insertados correctamente en la tabla cronograma";
    header('Location: index.php');
  } else {
    echo "Error al insertar los datos: " . mysqli_error($conexion);
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
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
  <link rel="stylesheet" href="../../Layout/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../Layout/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../Layout/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../css/stilos.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="../../Layout/css/_all-skins.min.css">
     <link rel="apple-touch-icon" href="../../Layout/img/apple-touch-icon.png">
     <link rel="shortcut icon" href="../../Imagenes/logo.png">

     <script src="../js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once '../../templates/cabecera.php'; ?>
    <?php include_once '../../templates/menu.php'; ?>

<div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

            <section class="estilo">
 <div class="card">
    <div class="card-header">
       Cargar Cronograma
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo</label>
          <input type="text"
            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Ingrese titulo del libro" Required>
        </div>

        <div class="mb-3">
          <label for="foto" class="form-label">Portada</label>
          <input type="file"
            class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="foto" Required>
        </div>

        <div class="mb-3">
          <label for="archivo" class="form-label">Adjuntar (PDF)</label>
          <input type="file" class="form-control" name="archivo" id="archivo" placeholder="pdf" aria-describedby="fileHelpId" Required>
        </div>

        <button type="submit" class="btn btn-success">Agregar</button> 
        <a name="cancelar" id="cancelar" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    
 </div>

 </section>                         
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include_once '../../templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../Layout/js/app.min.js"></script>

</body>
</html>
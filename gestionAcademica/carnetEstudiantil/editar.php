<?php include_once '../includes/verificarAcceso.php'; ?>
<?php
// Verificar si se recibió el ID del carnet a editar
if (isset($_GET['id'])) {
  $idCarnet = $_GET['id'];

  $conexion = mysqli_connect('localhost', 'root', '', 'boostersystem');

  if (!$conexion) {
    die('Error de conexión a la base de datos: ' . mysqli_connect_error());
  }

  // Obtener los datos del carnet a editar
  $sql = "SELECT * FROM carnet WHERE idCarnet = $idCarnet";
  $resultado = mysqli_query($conexion, $sql);

  // Comprobar si se encontró el carnet
  if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_assoc($resultado);

    // Consultar la lista de estudiantes
    $sqlEstudiantes = "SELECT * FROM estudiante";
    $resultadoEstudiantes = mysqli_query($conexion, $sqlEstudiantes);

    
    //formulario de edición
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
         <link rel="shortcut icon" href="../../img/logo.png">
         
    
         <script src="../js/alerta.js"></script>
    
       </head>
       <body class="hold-transition skin-blue sidebar-mini">

        
        <?php include_once '../../templates/cabecera.php'; ?>
        <?php include_once '../../templates/menu.php'; ?>
    
    <div class="content-wrapper">
    
            <!-- Main content -->
            <section class="content">
    
                <section class="estilo">
                <div class="container">
          <h1>Editar Carnet</h1>
          <form action="guardar_edicion.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['idCarnet']; ?>">
            <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" name="titulo" value="<?php echo $row['titulo']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="portada" class="form-label">Portada actual</label>
              <br>
              <img src="<?php echo $row['portada']; ?>" alt="Portada actual" style="max-width: 200px;">
            </div>
            <div class="mb-3">
              <label for="nuevaPortada" class="form-label">Cargar nueva portada</label>
              <input type="file" class="form-control" name="nuevaPortada">
            </div>
            <div class="mb-3">
              <label for="archivo" class="form-label">Archivo actual</label>
              <br>
              <a href="<?php echo $row['archivo']; ?>">Descargar archivo actual</a>
            </div>
            <div class="mb-3">
              <label for="nuevoArchivo" class="form-label">Cargar nuevo archivo</label>
              <input type="file" class="form-control" name="nuevoArchivo">
            </div>
            <div class="mb-3">
              <label for="estudiante" class="form-label">Estudiante</label>
              <select class="form-control" name="estudiante" required>
                <?php
                while ($estudiante = mysqli_fetch_assoc($resultadoEstudiantes)) {
                  $selected = ($estudiante['idEstudiante'] == $row['estudiante_idEstudiante']) ? 'selected' : '';
                  echo '<option value="' . $estudiante['idEstudiante'] . '" ' . $selected . '>' . $estudiante['nombresEstudiante'] . ' ' . $estudiante['apellidosEstudiante'] . '</option>';
                }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
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

    <?php
  } else {
    echo 'El carnet especificado no existe.';
  }

  mysqli_close($conexion);
} else {
  echo 'No se especificó el ID del carnet a editar.';
}
?>

<?php include_once 'includes/verificarAcceso.php'; ?>
<?php
include_once "includes/conexion.php";
$where = '';
$nombreMaterial = isset($_POST['nombreMaterial']) ? $_POST['nombreMaterial'] : '';
$tipoMaterial = isset($_POST['tipoMaterial']) ? $_POST['tipoMaterial'] : '';

if(isset($_POST['consultarMaterial'])){
    if(empty($_POST['tipoMaterial'])){
        $where = "WHERE nombre like '".$nombreMaterial."%'";
    }else if(empty($_POST['nombreMaterial'])){
        $where = "WHERE tipo='".$tipoMaterial."'";
    }else{
        $where = "WHERE nombre like '".$nombreMaterial."%' and tipo = '".$tipoMaterial."'";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Consultar Material</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
  <h1>Consulta Material didactico</h1>
  <a class="btn btn-primary" download="miExcelConsultaMaterial" href="includes/miExcelConsultaMaterial.php">Informe&nbsp; <i class="fa fa-download"></i> </a>
    <hr>
    <h3>Filtros</h3>
    <form class="form-inline" action="consultarMaterial.php" method="post">
        <div class="form-group">
            <label for="nombreMaterial">Nombre:</label>
            <input type="text" id="nombreMaterial" name="nombreMaterial" di>
        </div>
        <div class="form-group">
            <label for="tipoMaterial">Tipo:</label>
            <select id="tipoMaterial" name="tipoMaterial">
              <option value="">Seleccione una opción</option>
              <option value="libro">Libro</option>
              <option value="cartilla">Cartilla</option>
              <option value="guia">Guia</option>
            </select>
        </div>
        <div class="form-group">
        <button type="submit" value="consultarMaterial" name="consultarMaterial">Consultar</button>
      </div>
    </form>
    <hr>
  <br>
        <table class="table table-striped table-dark" id="table_id">
            <thead>
                <tr>
                    <th>N.</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Fecha de publicacion</th>
                    <th>Archivo</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Autor</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $SQL = "SELECT * FROM materiaDidactico $where";
                $result = mysqli_query($conexion, $SQL);


                if (mysqli_num_rows($result) > 0) {
                    while ($fila = mysqli_fetch_assoc($result)) {

                        $idMateriaDidactico = $fila['idMateriaDidactico'];
                        $nombreMaterial = $fila['nombre'];
                        $categoriaMaterial = $fila['categoria'];
                        $fechaMaterial = $fila['fechaPublicacion'];
                        $archivoMaterial = $fila['archivoMaterial'];
                        $descripcionMaterial = $fila['descripcion'];
                        $tipoMaterial = $fila['tipo'];
                        $autorMaterial = $fila['autor'];
                ?>
                        <tr>
                            <td><?php echo $idMateriaDidactico; ?></td>
                            <td><?php echo $nombreMaterial; ?></td>
                            <td><?php echo $categoriaMaterial; ?></td>
                            <td><?php echo $fechaMaterial; ?></td>
                            <td><?php echo $archivoMaterial; ?></td>
                            <td><?php echo $descripcionMaterial; ?></td>
                            <td><?php echo $tipoMaterial; ?></td>
                            <td><?php echo $autorMaterial; ?></td>
                            <td>
                            <a href="includes/descargarMaterial.php?id=<?php echo $fila['idMateriaDidactico']; ?>" class="btn btn-warning">Descargar</a>
                            <a href="confirmarEliminacion.php?id=<?php echo $fila['idMateriaDidactico']; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr class="text-center">
                        <td colspan="8">No existen registros</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
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

<script src="js/buscarUsuarios.js"></script>

</body>
</html>

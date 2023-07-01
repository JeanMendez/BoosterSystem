<?php include_once '../includes/verificarAcceso.php'; ?>
<?php
$idUsuario = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");
$consulta = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

// Verificar si se encontró el usuario
if (!$usuario) {
    // Manejar el caso de usuario no encontrado, redireccionar o mostrar un mensaje de error
    exit("El usuario no existe");
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
     <link rel="shortcut icon" href="../../img/logo.png">

     <script src="../js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once '../../templates/cabecera.php'; ?>
    <?php include_once '../../templates/menu.php'; ?>

<!-- inicia contenido -->
<div class="content-wrapper">

<!-- Main contenido -->

<section class="content">

<section class="estilo">
  <h2>Editar usuario</h2>
  <hr style="border: 1px solid gray;">

  <form action="../includes/functions.php" method="POST">
  <div class="form-group">
<label for="tipoDocumentoUsuario">Tipo de documento:</label>
<select id="tipoDocumentoUsuario" name="tipoDocumentoUsuario" required>
  <?php
  $consultaTiposDocumento = "SHOW COLUMNS FROM usuarios LIKE 'tipoDocumentoUsuario'";
  $resultadoTiposDocumento = mysqli_query($conexion, $consultaTiposDocumento);
  $rowTiposDocumento = mysqli_fetch_assoc($resultadoTiposDocumento);
  $enumValuesDocumento = explode(",", str_replace("'", "", substr($rowTiposDocumento['Type'], 5, (strlen($rowTiposDocumento['Type'])-6))));
  foreach ($enumValuesDocumento as $valueDocumento) {
    $selected = ($valueDocumento == $usuario['tipoDocumentoUsuario']) ? 'selected' : '';
    echo "<option value='$valueDocumento' $selected>$valueDocumento</option>";
  }
  ?>
</select>
</div>

<div class="form-group">
  <label for="documentoUsuario">Número de documento:</label>
  <input type="text" id="documentoUsuario" name="documentoUsuario" value="<?php echo $usuario['documentoUsuario']; ?>" required>
</div>
<div class="form-group">
  <label for="nombresUsuario">Nombre:</label>
  <input type="text" id="nombresUsuario" name="nombresUsuario" value="<?php echo $usuario['nombresUsuario']; ?>" required>
</div>
<div class="form-group">
  <label for="apellidosUsuario">Apellidos:</label>
  <input type="text" id="apellidosUsuario" name="apellidosUsuario" value="<?php echo $usuario['apellidosUsuario']; ?>" required>
</div>
<div class="form-group">
  <label for="telefonoUsuario">Teléfono:</label>
  <input type="text" id="telefonoUsuario" name="telefonoUsuario" value="<?php echo $usuario['telefonoUsuario']; ?>" required>
</div>
<div class="form-group">
  <label for="correoUsuario">Correo electrónico:</label>
  <input type="email" id="correoUsuario" name="correoUsuario" value="<?php echo $usuario['correoUsuario']; ?>" required>
</div>
<div class="form-group">
  <label for="passwordUsuario">Contraseña:</label>
  <input type="password" name="passwordUsuario" id="passwordUsuario" value="<?php echo $usuario['passwordUsuario']; ?>" required>
</div>
<div class="form-group">
<label for="estadoUsuario">Estado:</label>
<select id="estadoUsuario" name="estadoUsuario" required>
  <?php
  $consultaEstados = "SHOW COLUMNS FROM usuarios LIKE 'estadoUsuario'";
  $resultadoEstados = mysqli_query($conexion, $consultaEstados);
  $rowEstados = mysqli_fetch_assoc($resultadoEstados);
  $enumValues = explode(",", str_replace("'", "", substr($rowEstados['Type'], 5, (strlen($rowEstados['Type'])-6))));
  foreach ($enumValues as $value) {
    $selected = ($value == $usuario['estadoUsuario']) ? 'selected' : '';
    echo "<option value='$value' $selected>$value</option>";
  }
  ?>
</select>
</div>
<div class="form-group">
  <label for="rol_idRol">Rol:</label>
  <select id="rol_idRol" name="rol_idRol" required>
    <option value="">Seleccione una opción</option>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    $consultaRoles = "SELECT idRol, nombreRol FROM rol";
    $resultadoRoles = mysqli_query($conexion, $consultaRoles);

    if (mysqli_num_rows($resultadoRoles) > 0) {
      while ($row = mysqli_fetch_assoc($resultadoRoles)) {
        $idRol = $row['idRol'];
        $nombreRol = $row['nombreRol'];
        $selected = ($idRol == $usuario['rol_idRol']) ? 'selected' : '';
        echo "<option value='$idRol' $selected>$nombreRol</option>";
      }
    } else {
      echo "<option value=''>No hay roles disponibles</option>";
    }
    ?>
  </select>
</div>
<div class="form-group">
  <input type="hidden" name="accion" value="editar_registro">
  <input type="hidden" name="id" value="<?php echo $usuario['idUsuario']; ?>">
  <button type="submit" value="Guardar" name="registrar">Guardar cambios</button>
</div>
</form>
</section>   



</section>
</div><!-- fin del contenido -->

<?php include_once '../../templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../Layout/js/app.min.js"></script>

</body>
</html>
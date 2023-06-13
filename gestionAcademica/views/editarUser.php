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
     <link rel="shortcut icon" href="../../Imagenes/logo.png">

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
  <h3 class="text-center">Editar usuario</h3>
    <form action="../includes/functions.php" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre"  value="<?php echo $usuario['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" id="apellidos" name="apellidos"  value="<?php echo $usuario['apellidos']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" name="correo" id="correo"  value="<?php echo $usuario['correo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tipoDocumento">Tipo de documento:</label>
                                <select type="text" name="tipoDocumento" id="tipoDocumento" value="<?php echo $usuario['tipoDocumento']; ?>">
                                    <option value="">Seleccione una opción</option>
                                    <option value="CC">Cédula de ciudadanía</option>
                                    <option value="TI">Tarjeta de identidad</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="numeroDocumento">Número de documento:</label>
                                <input type="text" name="numeroDocumento" id="numeroDocumento" value="<?php echo $usuario['numeroDocumento']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" name="contrasena" id="contrasena" value="<?php echo $usuario['contrasena']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol:</label>
                                <input type="text" name="rol" id="rol" value="<?php echo $usuario['rol']; ?>">
                            </div>
                            <input type="hidden" name="accion" value="editar_registro">
                            <input type="hidden" name="id" value="<?php echo $usuario['idUsuario']; ?>">
                            <br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="../usuariosRegistrados.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
</div>
    </form>
</section>   

</section>
</div><!-- fin del contenido -->

<?php include_once '../templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../Layout/js/app.min.js"></script>

</body>
</html>
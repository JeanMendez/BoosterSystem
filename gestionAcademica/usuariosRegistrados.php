<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Instituto Gerardo Valencia Cano</title>
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
     <link rel="shortcut icon" href="../Imagenes/logo.png">

     <script src="../js/alerta.js"></script>

   </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    
    <?php include_once './templates/cabecera.php'; ?>
    <?php include_once './templates/menu.php'; ?>

<!-- inicia contenido -->
<div class="content-wrapper">

<!-- Main contenido -->
<section class="content">

  <section class="estilo">
  <h1>Lista de usuarios</h1>
        <br>
        <div>
        <a href="registrarUser.php" class="btn btn-success">
             Nuevo usuario <i class="fa fa-plus"></i>  </a>
        </div>
        <hr>
    
      <div class="container-fluid">
  <form class="d-flex">
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar user">
      <hr>
      </form>
  </div>

  <br>
        
        <table class="table table-striped table-dark" id="table_id">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Tipo de documento</th>
                    <th>Número de documento</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
                $SQL = "SELECT * FROM usuarios ";
                $dato = mysqli_query($conexion, $SQL);

                if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {

                        $nombre = $fila['nombre'];
                        $apellidos = $fila['apellidos'];
                        $correo = $fila['correo'];
                        $tipoDocumento = $fila['tipoDocumento'];
                        $numeroDocumento = $fila['numeroDocumento'];
                        $contrasena = $fila['contrasena'];
                        $rol = $fila['rol'];
                ?>
                        <tr>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $apellidos; ?></td>
                            <td><?php echo $correo; ?></td>
                            <td><?php echo $tipoDocumento; ?></td>
                            <td><?php echo $numeroDocumento; ?></td>
                            <td><?php echo $contrasena; ?></td>
                            <td><?php echo $rol; ?></td>
                            <td>
                            <a href="views/editarUser.php?id=<?php echo $fila['idUsuario']; ?>" class="btn btn-warning">Editar</a>
                            <a class="btn btn-danger" href="views/eliminarUser.php?id=<?php echo $fila['idUsuario'] ?>">Eliminar</a>

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

<?php include_once './templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/js/app.min.js"></script>

<script src="js/buscarUsuarios.js"></script>

</body>
</html>
<?php include_once 'includes/verificarAcceso.php'; ?>
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
    
    <?php include_once '../templates/cabecera.php'; ?>
    <?php include_once '../templates/menu.php'; ?>

<!-- inicia contenido -->
<div class="content-wrapper">

<!-- Main contenido -->
<section class="content">

  <section class="estilo">
  <h1>Reultados pruebas de admision</h1>
  <div>
    <a class="btn btn-primary" download="miExcelResultadosPrueba" href="includes/miExcelResultadosPrueba.php">Informe&nbsp; <i class="fa fa-download"></i> </a>
        </div>
        <hr>
  <br>
        
        <table class="table table-striped table-dark" id="table_id">
            <thead>
                <tr>
                    <th>N.</th>
                    <th>Tipo de documento</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Puntaje</th>
                    <th>Resultado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
                $SQL = "SELECT * FROM interesados, resultadoprueba WHERE interesados.documentoInteresados = resultadoprueba.documentoAspirante";
                $result = mysqli_query($conexion, $SQL);


                if (mysqli_num_rows($result) > 0) {
                    while ($fila = mysqli_fetch_assoc($result)) {

                        $idInteresados = $fila['idInteresados'];
                        $tipoDocumentoInteresados = $fila['tipoDocumentoInteresados'];
                        $documentoInteresados = $fila['documentoInteresados'];
                        $nombreInteresados = $fila['nombreInteresados'];
                        $apellidoInteresados = $fila['apellidoInteresados'];
                        $telefonoInteresados = $fila['telefonoInteresados'];
                        $correoInteresados = $fila['correoInteresados'];
                        $puntaje = $fila['puntaje'];
                        $estado = $fila['estado'];
                ?>
                        <tr>
                            <td><?php echo $idInteresados; ?></td>
                            <td><?php echo $tipoDocumentoInteresados; ?></td>
                            <td><?php echo $documentoInteresados; ?></td>
                            <td><?php echo $nombreInteresados; ?></td>
                            <td><?php echo $apellidoInteresados; ?></td>
                            <td><?php echo $telefonoInteresados; ?></td>
                            <td><?php echo $correoInteresados; ?></td>
                            <td><?php echo $puntaje; ?></td>
                            <td><?php echo $estado; ?></td>
                            <td>
                            <a href="./includes/informarEstado.php?id=<?php echo $fila['idInteresados']; ?>" class="btn btn-success">Informar</a>
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
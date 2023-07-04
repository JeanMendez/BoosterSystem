<?php include_once 'includes/verificarAcceso.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cargar resultados prueba</title>
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
        <form action="includes/cargarResultados.php" method="POST">
          <section class="content">
            <section class="estilo">
                <h2>Asignacion de resultados de<br> la prueba de admision</h2><br>

                <div class="filtros">
                  <label>Documento:</label>
                  <input type="text" id="documento" name="documento" required>
                </div> 

                <div class="filtros">
                  <label>Puntaje:</label>
                  <input type="text" id="puntaje" name="puntaje" required>
                </div>  

                <div class="filtros">
                  <label>Resultado:</label>
                  <select id="estado" name="estado">
                    <option value="aprobado">Aprobado</option>
                    <option value="reprobado">Reprobado</option>
                  </select>
                </div>  
                
                &nbsp;&nbsp;&nbsp;<button id="btn-asignar">Cargar</button>
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
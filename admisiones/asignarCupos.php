<?php include_once 'includes/verificarAcceso.php'; ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Asignar Cupos</title>
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
        <form action="includes/asignarCupos.php" method="POST">
          <section class="content">
            <section class="estilo">
                <h2>Asignar cupos</h2><br><br>

                <div class="filtros">
                  <label>Jornada Academica:</label>
                  <select id="jornadaAcademica" name="jornadaAcademica">
                    <option value="mañana">Mañana</option>
                    <option value="tarde">Tarde</option>
                  </select>
                </div> 

                <div class="filtros">
                  <label>Grado:</label>
                  <select id="grado" name="grado">
                    <option value="primero">Primero</option>
                    <option value="segundo">Segundo</option>
                    <option value="tercero">Tercero</option>
                    <option value="cuarto">Cuarto</option>
                    <option value="quinto">Quinto</option>
                    <option value="sexto">Sexto</option>
                    <option value="septimo">Septimo</option>
                    <option value="octavo">Octavo</option>
                    <option value="noveno">Noveno</option>
                    <option value="decimo">Decimo</option>
                    <option value="once">Once</option>
                  </select>
                </div>  

                <div class="filtros">
                  <label>Cupos Disponibles:</label>
                  <select id="cuposDisponibles" name="cuposDisponibles">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                  </select>
                </div>  
                
                <button id="btn-asignar">Asignar</button>
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

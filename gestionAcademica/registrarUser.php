<?php include_once 'includes/verificarAcceso.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrar usuarios</title>
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
    <h2>Registro de usuarios</h2>
    <hr style="border: 1px solid gray;">

    <form action="./includes/validar.php" method="POST">
        <div class="form-group">
            <label for="tipoDocumentoUsuario">Tipo de documento:</label>
            <select id="tipoDocumentoUsuario" name="tipoDocumentoUsuario" required>
                <?php
                $consultaTiposDocumento = "SHOW COLUMNS FROM usuarios LIKE 'tipoDocumentoUsuario'";
                $resultadoTiposDocumento = mysqli_query($conexion, $consultaTiposDocumento);
                $rowTiposDocumento = mysqli_fetch_assoc($resultadoTiposDocumento);
                $enumValuesDocumento = explode(",", str_replace("'", "", substr($rowTiposDocumento['Type'], 5, (strlen($rowTiposDocumento['Type']) - 6))));
                foreach ($enumValuesDocumento as $valueDocumento) {
                    echo "<option value='$valueDocumento'>$valueDocumento</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="documentoUsuario">Número de documento:</label>
            <input type="text" id="documentoUsuario" name="documentoUsuario" required>
        </div>
        <div class="form-group">
            <label for="nombresUsuario">Nombre:</label>
            <input type="text" id="nombresUsuario" name="nombresUsuario" required>
        </div>
        <div class="form-group">
            <label for="apellidosUsuario">Apellidos:</label>
            <input type="text" id="apellidosUsuario" name="apellidosUsuario" required>
        </div>
        <div class="form-group">
            <label for="telefonoUsuario">Teléfono:</label>
            <input type="text" id="telefonoUsuario" name="telefonoUsuario" required>
        </div>
        <div class="form-group">
            <label for="correoUsuario">Correo electrónico:</label>
            <input type="email" id="correoUsuario" name="correoUsuario" required>
        </div>
        <div class="form-group">
            <label for="passwordUsuario">Contraseña:</label>
            <input type="password" id="passwordUsuario" name="passwordUsuario" required>
        </div>
        <div class="form-group">
            <label for="estadoUsuario">Estado:</label>
            <select id="estadoUsuario" name="estadoUsuario" required>
                <?php
                $consultaEstados = "SHOW COLUMNS FROM usuarios LIKE 'estadoUsuario'";
                $resultadoEstados = mysqli_query($conexion, $consultaEstados);
                $rowEstados = mysqli_fetch_assoc($resultadoEstados);
                $enumValues = explode(",", str_replace("'", "", substr($rowEstados['Type'], 5, (strlen($rowEstados['Type']) - 6))));
                foreach ($enumValues as $value) {
                    echo "<option value='$value'>$value</option>";
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
                        echo "<option value='$idRol'>$nombreRol</option>";
                    }
                } else {
                    echo "<option value=''>No hay roles disponibles</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group" id="opcionesAdicionales">
    
        </div>
        <div class="form-group">
            <button type="submit" value="Guardar" name="registrar">Registrar</button>
        </div>
    </form>
</section>

<script>
    document.getElementById('rol_idRol').addEventListener('change', function () {
        var rol_idRol = this.value;
        var opcionesAdicionales = document.getElementById('opcionesAdicionales');

        // Restablecer opciones adicionales en cada cambio de selección
        opcionesAdicionales.innerHTML = '';

        // Verificar si se seleccionó un rol específico
     if (rol_idRol == '1') {
            // Agregar opciones para el rol de estudiante
            opcionesAdicionales.innerHTML = `
            <div class="form-group">
                <label for="fechaMatricula">Fecha de matrícula:</label>
                <input type="date" id="fechaMatricula" name="fechaMatricula" required>
            </div>
            <div class="form-group">
                <label for="descripcionMatricula">Descripción de matrícula:</label>
                <textarea id="descripcionMatricula" name="descripcionMatricula" required></textarea>
            </div>
            <div class="form-group">
                <label for="archivoPension">Archivo de pensión:</label>
                <input type="file" id="archivoPension" name="archivoPension">
            </div>
            <div class="form-group">
                <label for="cursoSeleccionado">Curso:</label>
                <select id="cursoSeleccionado" name="cursoSeleccionado" required>
              <?php
              $consultaCursos = "SELECT idCurso, nombreCurso FROM cursos";
              $resultadoCursos = mysqli_query($conexion, $consultaCursos);

              if (mysqli_num_rows($resultadoCursos) > 0) {
                  while ($row = mysqli_fetch_assoc($resultadoCursos)) {
                      $idCurso = $row['idCurso'];
                      $nombreCurso = $row['nombreCurso'];
                      echo "<option value='$idCurso'>$nombreCurso</option>";
                  }
              } else {
                  echo "<option value=''>No hay cursos disponibles</option>";
              }
              ?>
              </div>
                </select>
            `;
        }
    });
</script>


</section>
</div><!-- fin del contenido -->

<?php include_once '../templates/pie.php'; ?>

<!-- jQuery 2.1.4 -->
<script src="../Layout/js/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../Layout/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Layout/js/app.min.js"></script>

</body>
</html>

<?php

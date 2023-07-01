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
                    <h1>Lista de usuarios</h1>
                    <br>
                    <div>
                        <a href="registrarUser.php" class="btn btn-success">Nuevo usuario <i class="fa fa-plus"></i></a>
                        <a class="btn btn-primary" href="includes/excel.php">Excel <i class="fa fa-table"
                                aria-hidden="true"></i></a>
                                <a href="views/registrarAsignatura.php" class="btn btn-success">Asignar asignatura a cursos<i class="fa fa-plus"></i></a>
                        <a class="btn btn-warning" href="includes/sesion/cerrarSesion.php">Log Out <i
                                class="fa fa-power-off" aria-hidden="true"></i></a>
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

                    <table class="table table-striped table-dark table_id">
                        <thead>
                            <tr>
                                <th>Tipo de documento</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Estado</th>
                                <th>Rol</th>
                                <th>Fecha Matricula</th>
                                <th>Descripción</th>
                                <th>Archivo pension</th>
                                <th>Curso</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dato = mysqli_query($conexion, "SELECT u.*, m.fechaMatricula, m.descripcionMatricula, m.archivoPension, m.cursos_idCurso
                            FROM usuarios u
                            LEFT JOIN estudiante e ON u.idUsuario = e.usuarios_idUsuario
                            LEFT JOIN matricula m ON e.idEstudiante = m.estudiante_idEstudiante");


                            

                            if ($dato->num_rows > 0) {
                                while ($fila = mysqli_fetch_array($dato)) {
                                    $tipoDocumentoUsuario = $fila['tipoDocumentoUsuario'];
                                    $documentoUsuario = $fila['documentoUsuario'];
                                    $nombresUsuario = $fila['nombresUsuario'];
                                    $apellidosUsuario = $fila['apellidosUsuario'];
                                    $telefonoUsuario = $fila['telefonoUsuario'];
                                    $correoUsuario = $fila['correoUsuario'];
                                    $passwordUsuario = $fila['passwordUsuario'];
                                    $estadoUsuario = $fila['estadoUsuario'];
                                    $rol_idRol = $fila['rol_idRol'];
                                    $fechaMatricula = $fila['fechaMatricula'];
                                    $descripcionMatricula = $fila['descripcionMatricula'];
                                    $archivoPension = $fila['archivoPension'];
                                    $cursos_idCurso = $fila['cursos_idCurso'];

                                    // Obtener el nombre del rol
                                    $consultaRol = "SELECT nombreRol FROM rol WHERE idRol = $rol_idRol";
                                    $resultadoRol = mysqli_query($conexion, $consultaRol);
                                    $rowRol = mysqli_fetch_assoc($resultadoRol);
                                    $nombreRol = $rowRol['nombreRol'];

                                    echo '<tr>';
                                    echo '<td>' . $tipoDocumentoUsuario . '</td>';
                                    echo '<td>' . $documentoUsuario . '</td>';
                                    echo '<td>' . $nombresUsuario . '</td>';
                                    echo '<td>' . $apellidosUsuario . '</td>';
                                    echo '<td>' . $telefonoUsuario . '</td>';
                                    echo '<td>' . $correoUsuario . '</td>';
                                    echo '<td>' . $passwordUsuario . '</td>';
                                    echo '<td>' . $estadoUsuario . '</td>';
                                    echo '<td>' . $nombreRol . '</td>';
                                    echo '<td>' . $fechaMatricula . '</td>';
                                    echo '<td>' . $descripcionMatricula . '</td>';
                                    echo '<td>' . $archivoPension . '</td>';
                                    echo '<td>' . $cursos_idCurso . '</td>';
                                    echo '<td>';
                                    echo '<a href="views/editarUser.php?id=' . $fila['idUsuario'] . '" class="btn btn-warning">Editar</a>';
                                    echo '<a class="btn btn-danger" href="views/eliminarUser.php?id=' . $fila['idUsuario'] . '">Eliminar</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo "<tr><td colspan='14'>No se encontraron usuarios registrados</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </section>
        </div>

        <?php include_once '../templates/pie.php'; ?>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="../Layout/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../Layout/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../Layout/js/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../Layout/js/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../Layout/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../Layout/js/demo.js"></script>
    <script src="js/buscador.js"></script>
</body>

</html>

<?php
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");

if (isset($_POST['registrar'])) {
    $tipoDocumentoUsuario = $_POST['tipoDocumentoUsuario'];
    $documentoUsuario = $_POST['documentoUsuario'];
    $nombresUsuario = $_POST['nombresUsuario'];
    $apellidosUsuario = $_POST['apellidosUsuario'];
    $telefonoUsuario = $_POST['telefonoUsuario'];
    $correoUsuario = $_POST['correoUsuario'];
    $passwordUsuario = $_POST['passwordUsuario'];
    $estadoUsuario = $_POST['estadoUsuario'];
    $rol_idRol = $_POST['rol_idRol'];

    if (
        strlen($tipoDocumentoUsuario) >= 1 &&
        strlen($documentoUsuario) >= 1 &&
        strlen($nombresUsuario) >= 1 &&
        strlen($apellidosUsuario) >= 1 &&
        strlen($telefonoUsuario) >= 1 &&
        strlen($correoUsuario) >= 1 &&
        strlen($passwordUsuario) >= 1 &&
        strlen($estadoUsuario) >= 1 &&
        strlen($rol_idRol) >= 1 
    ) {
        // Validar el rol seleccionado
        $consultaRol = "SELECT idRol FROM rol WHERE idRol = $rol_idRol";
        $resultadoRol = mysqli_query($conexion, $consultaRol);

        if (mysqli_num_rows($resultadoRol) === 0) {
            // El rol seleccionado no existe, mostrar mensaje de error
            echo "<script>alert('El rol seleccionado no es válido. Por favor, seleccione un rol válido.');
            window.location.href = '../registrarUser.php';</script>";
            exit();
        }

        // Verificar si el número de documento ya existe
        $consultaExistencia = "SELECT * FROM usuarios WHERE documentoUsuario = '$documentoUsuario'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);

        if (mysqli_num_rows($resultadoExistencia) > 0) {
            // El número de documento ya existe, mostrar mensaje de error
            echo "<script>alert('El número de documento ya existe. No se puede crear el usuario.');
            window.location.href = '../registrarUser.php';</script>";
            exit();
        } else {
            // El número de documento no existe, insertar el nuevo usuario
            $consulta = "INSERT INTO usuarios (tipoDocumentoUsuario, documentoUsuario, nombresUsuario, apellidosUsuario,
            telefonoUsuario, correoUsuario, passwordUsuario, estadoUsuario, rol_idRol)
            VALUES ('$tipoDocumentoUsuario', '$documentoUsuario', '$nombresUsuario', '$apellidosUsuario',
            '$telefonoUsuario', '$correoUsuario', '$passwordUsuario', '$estadoUsuario', '$rol_idRol')";

            mysqli_query($conexion, $consulta);
            $idUsuario = mysqli_insert_id($conexion); // Obtener el ID del usuario recién registrado

            $consultaDocente = "SELECT idDocente FROM docente WHERE documentoDocente = $documentoUsuario";
            $resultadoDocente = mysqli_query($conexion, $consultaDocente);
            $rowDocente = mysqli_fetch_assoc($resultadoDocente);
            $idDocente = $rowDocente['idDocente'];

            // Insertar en la tabla DOCENTE_POR_CURSOS si el campo asignaturaSeleccionada está presente
            if (isset($_POST['asignaturaSeleccionada'])) {
                $asignaturaSeleccionada = $_POST['asignaturaSeleccionada'];
                if (isset($_POST['cursosSeleccionados'])) {
                    $cursosSeleccionados = $_POST['cursosSeleccionados'];
                    foreach ($cursosSeleccionados as $curso) {
                        $consultaDocenteCursos = "INSERT INTO docente_por_cursos (docente_idDocente, cursos_idCurso, asignaturas_idAsignatura)
                                                VALUES ($idDocente, $curso, $asignaturaSeleccionada)";

                        mysqli_query($conexion, $consultaDocenteCursos);
                    }
                }
            }

            // Insertar en la tabla DOCENTE_POR_CURSOS
            if (isset($_POST['cursosSeleccionados'])) {
                $cursosSeleccionados = $_POST['cursosSeleccionados'];
                foreach ($cursosSeleccionados as $curso) {
                    $consultaDocenteCursos = "INSERT INTO docente_por_cursos (docente_idDocente, cursos_idCurso)
                                              VALUES ($idDocente, $curso)";

                    mysqli_query($conexion, $consultaDocenteCursos);
                }
            }

            $consultaEstudiante = "SELECT idEstudiante FROM Estudiante WHERE documentoEstudiante = $documentoUsuario";
            $resultadoEstudiante = mysqli_query($conexion, $consultaEstudiante);
            $rowEstudiante = mysqli_fetch_assoc($resultadoEstudiante);
            $idEstudiante = $rowEstudiante['idEstudiante'];

            // Insertar en la tabla de matrícula si los campos existen
            if (isset($_POST['fechaMatricula']) && isset($_POST['descripcionMatricula']) && isset($_POST['cursoSeleccionado'])) {
                $fechaMatricula = $_POST['fechaMatricula'];
                $descripcionMatricula = $_POST['descripcionMatricula'];
                $cursoSeleccionado = $_POST['cursoSeleccionado'];

                $consultaMatricula = "INSERT INTO matricula (estudiante_idEstudiante, cursos_idCurso, fechaMatricula, descripcionMatricula)
                         VALUES ($idEstudiante, $cursoSeleccionado, '$fechaMatricula', '$descripcionMatricula')";

                mysqli_query($conexion, $consultaMatricula);
                $idMatricula = mysqli_insert_id($conexion);
            }

            mysqli_close($conexion);

            header('Location: ../UsuariosRegistrados.php');
            exit();
        }
    } else {
        echo "Por favor, completa todos los campos obligatorios.";
        exit();
    }
}
?>

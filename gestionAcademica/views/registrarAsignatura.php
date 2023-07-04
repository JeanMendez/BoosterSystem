<?php include_once '../includes/verificarAcceso.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Asignaturas por Curso</title>
</head>
<body>
    <h2>Asociar Asignatura a Cursos</h2>
    <form method="POST" action="../includes/validarAsignatura.php">
        <label for="nombreAsignatura">Nombre de la Asignatura:</label>
        <input type="text" name="nombreAsignatura" id="nombreAsignatura" required>
        <br><br>
        <label>Cursos:</label>
        <br>
        <?php
        // Conexión a la base de datos
        $conexion = mysqli_connect("localhost", "root", "", "boostersystem");

        if (!$conexion) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }

        // Consulta para obtener los cursos disponibles
        $consultaCursos = "SELECT idCurso, nombreCurso FROM cursos";
        $resultadoCursos = mysqli_query($conexion, $consultaCursos);

        if (mysqli_num_rows($resultadoCursos) > 0) {
            while ($rowCurso = mysqli_fetch_assoc($resultadoCursos)) {
                echo "<input type='checkbox' name='cursosSeleccionados[]' value='" . $rowCurso['idCurso'] . "'>" . $rowCurso['nombreCurso'] . "<br>";
            }
        } else {
            echo "No hay cursos disponibles";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
        ?>
        <br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>

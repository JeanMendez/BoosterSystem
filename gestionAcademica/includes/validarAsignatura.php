<?php

$conexion = mysqli_connect("localhost", "root", "", "boostersystem");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener los datos enviados desde el formulario
$nombreAsignatura = $_POST['nombreAsignatura'];
$cursosSeleccionados = $_POST['cursosSeleccionados'];

// Insertar la asignatura en la tabla "ASIGNATURAS"
$insertarAsignatura = "INSERT INTO asignaturas (nombreAsignatura) VALUES ('$nombreAsignatura')";
if (mysqli_query($conexion, $insertarAsignatura)) {
    $idAsignatura = mysqli_insert_id($conexion); // Obtener el ID de la asignatura recién insertada

    // Insertar la relación entre el curso y la asignatura en la tabla "ASIGNATURAS_POR_CURSO"
    $valoresInsertar = array();
    foreach ($cursosSeleccionados as $curso) {
        $valoresInsertar[] = "($curso, $idAsignatura)";
    }
    $valoresInsertados = implode(',', $valoresInsertar);
    $insertarRelacion = "INSERT INTO asignaturas_por_curso (cursos_idCurso, asignaturas_idAsignatura) VALUES $valoresInsertados";
    if (mysqli_query($conexion, $insertarRelacion)) {
        echo "La asignatura se asoció correctamente al curso.";
    } else {
        echo "Error al asociar la asignatura al curso: " . mysqli_error($conexion);
    }
} else {
    echo "Error al insertar la asignatura: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<?php
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");

// Verifica si se ha enviado el formulario de registro de calificaciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $curso = $_POST['curso'];
    $asignatura = $_POST['asignatura'];
    $estudiante = $_POST['estudiante'];
    $cantidadNotas = $_POST['cantidad_notas'];

    // Obtener la nota definitiva
    $sumaNotas = 0;

    for ($i = 1; $i <= $cantidadNotas; $i++) {
        $nota = $_POST["nota$i"];
        $sumaNotas += $nota;
    }

    $notaDefinitiva = $sumaNotas / $cantidadNotas;

    // Realiza la inserción de la nota definitiva en la base de datos
    $query = "INSERT INTO CALIFICACIONES (definitiva, estudiante_idEstudiante, asignaturas_idAsignatura) VALUES ($notaDefinitiva, $estudiante, $asignatura)";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Nota definitiva registrada exitosamente.";
    } else {
        echo "Error al registrar la nota definitiva: " . mysqli_error($conn);
    }
}

mysqli_close($conexion);
?>

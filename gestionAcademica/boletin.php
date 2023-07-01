<?php
include_once 'includes/verificarAcceso.php';

// Obtener los datos de estudiantes desde la base de datos
$sqlEstudiantes = "SELECT * FROM estudiante";
$resultEstudiantes = $conexion->query($sqlEstudiantes);

// Verificar si se seleccionó un estudiante
if (isset($_POST['estudiante_id'])) {
    $estudianteId = $_POST['estudiante_id'];

    // Obtener los datos del estudiante seleccionado desde la base de datos
    $sqlEstudiante = "SELECT * FROM estudiante WHERE idEstudiante = '$estudianteId'";
    $resultEstudiante = $conexion->query($sqlEstudiante);

    // Verificar si se encontró al estudiante
    if ($resultEstudiante->num_rows === 0) {
        echo "Estudiante no encontrado";
        exit();
    }

    // Obtener los datos de las calificaciones del estudiante desde la base de datos
    $sqlCalificaciones = "SELECT asignaturas.nombreAsignatura, calificaciones.puntaje
                          FROM calificaciones
                          INNER JOIN asignaturas ON calificaciones.asignaturas_idAsignatura = asignaturas.idAsignatura
                          WHERE calificaciones.estudiante_idEstudiante = '$estudianteId'";
    $resultCalificaciones = $conexion->query($sqlCalificaciones);

    // Obtener el nombre del estudiante
    $rowEstudiante = $resultEstudiante->fetch_assoc();
    $nombreEstudiante = $rowEstudiante['nombresEstudiante'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletín de Notas</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stilos2.css">
</head>
<body>
    <div class="contract-bg">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header">
                            <img src="../img/logo.png" alt="Logo del colegio" class="logo" width="100%">
                        </div>
                        <hr>
                        <h2 style="color: white; text-align: center;">Boletín de Notas</h2>

                        <form method="POST" action="">
                            <label>Estudiante:</label>
                            <select name="estudiante_id" onchange="this.form.submit()">
                                <option value="">Seleccione un estudiante</option>
                                <?php while ($row = $resultEstudiantes->fetch_assoc()) : ?>
                                    <option value="<?php echo $row['idEstudiante']; ?>" <?php if ($estudianteId == $row['idEstudiante']) echo "selected"; ?>>
                                        <?php echo $row['nombresEstudiante']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </form>

                        <?php if (isset($estudianteId)) : ?>
                            <p>Fecha: <?php echo date('d \d\e M \d\e\l Y'); ?></p>
                            <p>Estudiante: <strong><?php echo $nombreEstudiante; ?></strong></p>

                            <?php
                            // Obtener los datos de las calificaciones en un arreglo
                            $calificaciones = array();
                            while ($row = $resultCalificaciones->fetch_assoc()) {
                                $calificaciones[] = $row;
                            }
                            ?>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Asignatura</th>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Desempeño</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($calificaciones as $calificacion) : ?>
                                        <tr>
                                            <td><?php echo $calificacion['nombreAsignatura']; ?></td>
                                            <td><?php echo $calificacion['puntaje']; ?></td>
                                            <td><?php echo determinarDesempenio($calificacion['puntaje']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <p>Observaciones:</p>
                            <ul style="font-size: 14px; color: white;">
                                <?php echo generarObservaciones($calificaciones); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <a name="" id="" class="btn btn-primary" href="../inicio.php" role="button">Salir</a>
        </div>
    </div>

    <?php
    function determinarDesempenio($puntaje)
    {
        if ($puntaje >= 1 && $puntaje <= 2.9) {
            return "Mala";
        } elseif ($puntaje >= 3 && $puntaje <= 3.9) {
            return "Regular";
        } elseif ($puntaje >= 4 && $puntaje <= 5) {
            return "Excelente";
        }
    }

    function generarObservaciones($calificaciones)
    {
        $totalPuntajes = 0;
        $totalAsignaturas = count($calificaciones);

        foreach ($calificaciones as $calificacion) {
            $puntaje = $calificacion['puntaje'];
            $totalPuntajes += $puntaje;
        }

        $observaciones = "";

        if ($totalAsignaturas > 0) {
            $promedio = $totalPuntajes / $totalAsignaturas;

            if ($promedio >= 1 && $promedio <= 2.9) {
                $observaciones = "El estudiante no cumplió con lo propuesto en clase. Debe mejorar en todas las asignaturas.";
            } elseif ($promedio >= 3 && $promedio <= 3.9) {
                $observaciones = "El estudiante estuvo ahí, pero debe mejorar en algunos aspectos. Puede lograr mejores resultados en todas las asignaturas.";
            } elseif ($promedio >= 4 && $promedio <= 5) {
                $observaciones = "El estudiante cumple con todo. ¡Sigue así en todas las asignaturas!";
            }
        } else {
            $observaciones = "No se encontraron calificaciones para este estudiante.";
        }

        return $observaciones;
    }
    ?>
</body>
</html>

<?php
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");

    $jornadaAcademica = trim($_POST['jornadaAcademica']);
    $grado = trim($_POST['grado']);
    $cantidad = trim($_POST['cuposDisponibles']);

    if (strlen($jornadaAcademica) >= 1 && strlen($grado) >= 1 && strlen($cantidad) >= 1) {

        $consultaExistencia = "SELECT * FROM cupos WHERE  jornadaAcademica = '$jornadaAcademica' and grado = '$grado'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);
        if (mysqli_num_rows($resultadoExistencia) > 0) {
            // El número de documento ya existe, mostrar mensaje de error
            echo "<script>alert('La jornada y grado seleccionados ya cuentan con cupos asignados porfavor ir al apartado de reasignar');
            window.location.href = '../consultarCupos.php';</script>";
        } else {
            $consulta = "INSERT INTO cupos(jornadaAcademica, grado, cantidad)
            VALUES ('$jornadaAcademica', '$grado', '$cantidad')";

            mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
            echo "<script>alert('La asignacion de cupos fue exitosa');
            window.location.href = '../asignarCupos.php';</script>";
            
            exit();
        }
    }else {
        // Manejar el caso en el que faltan campos obligatorios
        echo "Por favor, completa todos los campos obligatorios.";
    }
?>
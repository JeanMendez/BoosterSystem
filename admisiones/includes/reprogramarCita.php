<?php
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    
    $fecha = trim($_POST['fechaHora']);
    $documentoAspirante = trim($_POST['numeroDocumento']);


    if (strlen($fecha) >= 1 && strlen($documentoAspirante) >= 1) {
        
        $consultaExistencia = "SELECT * FROM citaprueba WHERE documentoAspirante = '$documentoAspirante'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);

        if (mysqli_num_rows($resultadoExistencia) > 0) {
            // El número de documento ya existe, mostrar mensaje de error
            echo "<script>alert('El número de documento ya existe. No se puede asinar la cita, dirijase al apartado de reprogramacion.');
            window.location.href = '../consultarPersonasconCitas.php';</script>";

        $consulta = "UPDATE citaprueba set fecha = '$fecha' WHERE citaprueba.documentoAspirante = '$documentoAspirante'";

        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        header('Location: ../consultarPersonasconCitas.php');
            
            exit();
        }
    }else {
        // Manejar el caso en el que faltan campos obligatorios
        echo "Por favor, completa todos los campos obligatorios.";
    }
    
?>
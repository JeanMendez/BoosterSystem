<?php
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    
    $documentoAspirante = trim($_POST['documento']);
    $puntaje = trim($_POST['puntaje']);
    $estado = trim($_POST['estado']);

    if (strlen($documentoAspirante) >= 1 && strlen($puntaje) >= 1 && strlen($puntaje) >= 1) {
        
        $consultaExistencia = "SELECT * FROM resultadoprueba WHERE documentoAspirante = '$documentoAspirante'";
        $consultaExistencia2 = "SELECT * FROM citaprueba WHERE documentoAspirante =  '$documentoAspirante' and fecha < DATE(NOW())";
        $consultaExistencia3 = "SELECT * FROM citaprueba WHERE documentoAspirante = '$documentoAspirante'";
        $consultaExistencia4 = "SELECT * FROM interesados WHERE documentoInteresados = '$documentoAspirante'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);
        $resultadoExistencia2 = mysqli_query($conexion, $consultaExistencia2);
        $resultadoExistencia3 = mysqli_query($conexion, $consultaExistencia3);
        $resultadoExistencia4 = mysqli_query($conexion, $consultaExistencia4);

        if (mysqli_num_rows($resultadoExistencia) > 0) {
            echo "<script>alert('El número de documento ya cuenta con resultado de la prueba, no se le permite asignar otro puntaje.');
            window.location.href = '../cargarResultadosPrueba.php';</script>";
        } else if (mysqli_num_rows($resultadoExistencia3) > 0) {
            if (mysqli_num_rows($resultadoExistencia2) > 0) {
                $consulta = "INSERT INTO resultadoprueba(documentoAspirante, puntaje, estado) VALUES  ('$documentoAspirante', '$puntaje', '$estado')";

                mysqli_query($conexion, $consulta);
                mysqli_close($conexion);
                echo "<script>alert('Los resultados fueron cargados satisfactoriamente.');
                window.location.href = '../cargarResultadosPrueba.php';</script>";
                
                exit();
            }else{
                echo "<script>alert('La fecha no coincide con la presentacion de la prueba porfavor verifique que se haya presentado la prueba.');
                window.location.href = '../cargarResultadosPrueba.php';</script>";
            }
        }else{
            if(mysqli_num_rows($resultadoExistencia4) > 0){
                echo "<script>alert('El número de documento no se le a programado la cita asi que no se puede asignar un resultado a un interesado que no haya presentado la prueba.');
                window.location.href = '../cargarResultadosPrueba.php';</script>";
            }else{
                echo "<script>alert('El número de documento no aparece registrado, porfavor verifique que resgistre como persona interesada.');
                window.location.href = '../cargarResultadosPrueba.php';</script>";
            }
        }
    }else {
        // Manejar el caso en el que faltan campos obligatorios
        echo "Por favor, completa todos los campos obligatorios.";
    }
?>
<?php
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    
    $idCupos = trim($_POST['idCupos']);

        $consulta = "DELETE FROM cupos WHERE idCupos = '$idCupos'";

        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        header('Location: ../consultarCupos.php');
            
            exit();       
    
        // Manejar el caso en el que faltan campos obligatorios
        echo "Por favor, completa todos los campos obligatorios.";    
?>
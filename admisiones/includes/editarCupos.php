<?php
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    
    $cantidad = trim($_POST['cantidad']);
    $idCupos = trim($_POST['idCupos']);

        $consulta = "UPDATE cupos set cantidad = '$cantidad' WHERE idCupos = '$idCupos'";

        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);
        header('Location: ../consultarCupos.php');
            
            exit();       
    
        // Manejar el caso en el que faltan campos obligatorios
        echo "Por favor, completa todos los campos obligatorios.";    
?>
<?php
    $idMateriaDidactico = $_POST['idMateriaDidactico'];
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    $consulta = "DELETE FROM materiaDidactico WHERE idMateriaDidactico = '$idMateriaDidactico'";
    if($resultado = mysqli_query($conexion, $consulta)){
        echo "<script>alert('El material didactico se a eliminado con exito.');
            window.location.href = ' ../consultarMaterial.php';</script>";
    }else{
        echo "algo anda mal";
    }  
    exit(); 
?>
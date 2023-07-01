<?php
    $docInteresados = $_POST['documentoInteresados'];
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    $consulta = "DELETE FROM citaprueba WHERE documentoAspirante = '$docInteresados'";
    if($resultado = mysqli_query($conexion, $consulta)){
        echo "<script>alert('La cita a sido cancelada con exito.');
            window.location.href = ' ../consultarPersonasconCitas.php';</script>";
    }else{
        echo "algo anda mal";
    }  
    exit(); 
?>
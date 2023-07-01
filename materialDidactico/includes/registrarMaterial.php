<?php
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");

if (isset($_POST['registrar'])) {
    $nombreMaterial = trim($_POST['nombreMaterial']);
    $categoriaMaterial = trim($_POST['categoriaMaterial']);
    $fechaMaterial = trim($_POST['fechaMaterial']);
    $archivoMaterial = trim($_POST['archivoMaterial']);
    $descripcionMaterial = trim($_POST['descripcionMaterial']);
    $tipoMaterial = trim($_POST['tipoMaterial']);
    $autorMaterial = trim($_POST['autorMaterial']);

    if (strlen($nombreMaterial) >= 1 && strlen($categoriaMaterial) >= 1 && strlen($fechaMaterial) >= 1 && strlen($archivoMaterial) >= 1 && strlen($descripcionMaterial) >= 1 && strlen($tipoMaterial) >= 1 && strlen($autorMaterial) >= 1) {

        // Verificar si el número de documento ya existe
        $consultaExistencia = "SELECT * FROM materiaDidactico WHERE nombre = '$nombreMaterial'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);

        if (mysqli_num_rows($resultadoExistencia) > 0) {
            // El nombre existe
            echo "<script>alert('El libro ya se encuentra dentro de nuestra base de datos porfavor elija otro nombre.');
            window.location.href = '../publicarMaterial.php';</script>";
        } else {
            // El número nombre no existe
            $consulta = "INSERT INTO materiaDidactico(nombre, categoria, fechaPublicacion, archivoMaterial, descripcion, tipo, autor)
            VALUES ('$nombreMaterial', '$categoriaMaterial', '$fechaMaterial', '$archivoMaterial', '$descripcionMaterial', '$tipoMaterial', '$autorMaterial')";

            mysqli_query($conexion, $consulta);
            mysqli_close($conexion);

            echo "<script>alert('El libro se cargo exitosamente.');
            window.location.href = '../publicarMaterial.php';</script>";
            exit();
        }
    } else {
        // Manejar el caso en el que faltan campos obligatorios
        echo "Por favor, completa todos los campos obligatorios.";
    }
}
?>
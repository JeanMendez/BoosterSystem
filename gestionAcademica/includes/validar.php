<?php
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");

if (isset($_POST['registrar'])) {
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $correo = trim($_POST['correo']);
    $tipoDocumento = trim($_POST['tipoDocumento']);
    $numeroDocumento = trim($_POST['numeroDocumento']);
    $contrasena = trim($_POST['contrasena']);
    $rol = trim($_POST['rol']);

    if (strlen($nombre) >= 1 && strlen($apellidos) >= 1 && strlen($correo) >= 1 && strlen($tipoDocumento) >= 1
        && strlen($numeroDocumento) >= 1 && strlen($contrasena) >= 1 && strlen($rol) >= 1) {

        // Verificar si el número de documento ya existe
        $consultaExistencia = "SELECT * FROM usuarios WHERE numeroDocumento = '$numeroDocumento'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);

        if (mysqli_num_rows($resultadoExistencia) > 0) {
            // El número de documento ya existe, mostrar mensaje de error
            echo "<script>alert('El número de documento ya existe. No se puede crear el usuario.');
            window.location.href = '../registrarUser.php';</script>";
        } else {
            // El número de documento no existe, insertar el nuevo usuario
            $consulta = "INSERT INTO usuarios (nombre, apellidos, correo, tipoDocumento, numeroDocumento, contrasena, rol)
            VALUES ('$nombre', '$apellidos', '$correo', '$tipoDocumento', '$numeroDocumento', '$contrasena', '$rol')";

            mysqli_query($conexion, $consulta);
            mysqli_close($conexion);

            header('Location: ../UsuariosRegistrados.php');
            exit();
        }
    } else {
        // Manejar el caso en el que faltan campos obligatorios
        echo "Por favor, completa todos los campos obligatorios.";
    }
}
?>
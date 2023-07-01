<?php
$conexion = mysqli_connect("localhost", "root", "", "boostersystem");

if (isset($_POST['registrar'])) {
    $tipoDocumento = trim($_POST['tipoDocumento']);
    $numeroDocumento = trim($_POST['numeroDocumento']);
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $telefono = trim($_POST['telefono']);
    $correo = trim($_POST['correo']);

    if (strlen($tipoDocumento) >= 1 && strlen($numeroDocumento) >= 1 && strlen($nombre) >= 1 && strlen($apellidos) >= 1 && strlen($telefono) >= 1 && strlen($correo) >= 1) {

        // Verificar si el número de documento ya existe
        $consultaExistencia = "SELECT * FROM interesados WHERE documentoInteresados = '$numeroDocumento'";
        $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);

        if (mysqli_num_rows($resultadoExistencia) > 0) {
            // El número de documento ya existe, mostrar mensaje de error
            echo "<script>alert('El número de documento ya realizo el envio de informacion porfavor esperar a el correo especificando de la cita para la prueba de admision.');
            window.location.href = 'http://localhost/Proyecto/contactenos.php';</script>";
        } else {
            // El número de documento no existe, insertar el nuevo usuario
            $consulta = "INSERT INTO interesados(tipoDocumentoInteresados, documentoInteresados, nombreInteresados, apellidoInteresados, telefonoInteresados, correoInteresados)
            VALUES ('$tipoDocumento', '$numeroDocumento', '$nombre', '$apellidos', '$telefono', '$correo')";

            mysqli_query($conexion, $consulta);
            mysqli_close($conexion);

            header('Location: ../../contactenos.php');
            exit();
        }
    } else {
        // Manejar el caso en el que faltan campos obligatorios
        echo "Por favor, completa todos los campos obligatorios.";
    }
}
?>
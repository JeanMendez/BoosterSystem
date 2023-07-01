
<?php

include('conexion.php');
session_start();

if(isset($_SESSION['documentoUsuario'])){

    $documentoUsuario_sesion = $_SESSION['documentoUsuario'];
    

$consulta = "SELECT * FROM usuarios WHERE documentoUsuario = '$documentoUsuario_sesion'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    // Asigna los demás valores a las variables correspondientes
    $tipoDocumentoUsuario = $fila['tipoDocumentoUsuario'];
    $documentoUsuario = $fila['documentoUsuario'];
    $nombresUsuario = $fila['nombresUsuario'];
    $apellidosUsuario = $fila['apellidosUsuario'];
    $telefonoUsuario = $fila['telefonoUsuario'];
    $correoUsuario = $fila['correoUsuario'];
    $passwordUsuario = $fila['passwordUsuario'];
    $estadoUsuario = $fila['estadoUsuario'];
    $rol_idRol = $fila['rol_idRol'];
}

}else{
    header('Location: ../login');
}
?>
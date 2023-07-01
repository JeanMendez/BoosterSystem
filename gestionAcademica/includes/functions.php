<?php
include_once 'conexion.php';

if (isset($_POST['accion'])) { 
    switch ($_POST['accion']) {
        // Casos de registros
        case 'editar_registro':
            editar_registro();
            break; 
        case 'eliminar_registro':
            eliminar_registro();
            break;
        case 'acceso_user':
            acceso_user();
            break;
    }
}

function editar_registro() {
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    extract($_POST);

    $consulta = "UPDATE usuarios SET 
        tipoDocumentoUsuario = '$tipoDocumentoUsuario', 
        documentoUsuario = '$documentoUsuario', 
        nombresUsuario = '$nombresUsuario', 
        apellidosUsuario = '$apellidosUsuario', 
        correoUsuario = '$correoUsuario', 
        passwordUsuario = '$passwordUsuario', 
        estadoUsuario = '$estadoUsuario', 
        rol_idRol = '$rol_idRol' 
        WHERE documentoUsuario = '$documentoUsuario'";

    mysqli_query($conexion, $consulta);

    header('Location: ../UsuariosRegistrados.php');
}




function eliminar_registro() {
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    extract($_POST);
    $idUsuario = $_POST['id'];
    $consulta = "DELETE FROM usuarios WHERE idUsuario = $idUsuario";

    mysqli_query($conexion, $consulta);

    header('Location: ../usuariosRegistrados.php');
}

function acceso_user() {
    $documentoUsuario = $_POST['documentoUsuario'];
    $passwordUsuario = $_POST['passwordUsuario'];
    session_start();

    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    $consulta = "SELECT * FROM usuarios WHERE documentoUsuario='$documentoUsuario' AND passwordUsuario='$passwordUsuario'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);
    
    if ($filas) {
        $_SESSION['documentoUsuario'] = $documentoUsuario; // Establecer el número de documento en la sesión

        header('Location: ../../inicio.php');
    } else {
        header('Location: ../../login');
        session_destroy();
    }
}


?>

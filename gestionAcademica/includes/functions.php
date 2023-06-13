<?php
   
include_once 'conexion.php';

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;
		}
	}
    function editar_registro() {
        $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
        extract($_POST);
    
        $consulta = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', 
        correo = '$correo', tipoDocumento = '$tipoDocumento', numeroDocumento = '$numeroDocumento', 
        contrasena = '$contrasena', rol = '$rol' WHERE numeroDocumento = '$numeroDocumento'";
    
        mysqli_query($conexion, $consulta);
    
        header('Location: ../UsuariosRegistrados.php');
    }
    
    function eliminar_registro() {
        $conexion=mysqli_connect("localhost","root","","boostersystem");
        extract($_POST);
        $idUsuario= $_POST['id'];
        $consulta= "DELETE FROM usuarios WHERE idUsuario= $idUsuario";
    
        mysqli_query($conexion, $consulta);
    
    
        header('Location: ../usuariosRegistrados.php');
    
    }

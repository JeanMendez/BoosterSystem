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
    function eliminar_registro() {  
        $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
        extract($_POST);
        $idCupos = $_POST['id'];
        $consulta = "DELETE FROM cupos WHERE idCupos= $idCupos";
    
        mysqli_query($conexion, $consulta);
    
    
        header('Location: ./consultarCupos.php');
    }

    function editar_registro() {
        $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
        extract($_POST);
        $idCupo = $_POST['id'];
        $consulta = "UPDATE cupos SET cantidad = '$cantidad'";
    
        mysqli_query($conexion, $consulta);
    
        header('Location: ./consultarCupos.php');
    }

    ?>
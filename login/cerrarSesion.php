<?php

include('includes/conexion.php');
session_start();

if(isset($_SESSION['documentoUsuario'])){
    session_destroy();
    header('Location:'.$URL.'../');
}else{
    
}
?>

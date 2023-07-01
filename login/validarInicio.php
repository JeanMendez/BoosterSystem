<?php
session_start();

// Verificar si no hay una sesión activa
if (!isset($_SESSION['numeroDocumento'])) {
    header('Location: login.php');
    exit();
}
?>

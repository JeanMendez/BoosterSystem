<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "boostersystem";
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $bdname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}


$sql = "";
  



if (mysqli_query($conn, $sql)) {
    echo "Trigger de actualización creado exitosamente";
} else {
    echo "Error al crear el trigger de actualización: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>

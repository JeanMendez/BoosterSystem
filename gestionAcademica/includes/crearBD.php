<?php
$servername = "localhost";
$username = "root";
$password = "";

echo "Ingrese el nombre de la base de datos: ";
fscanf(STDIN, "%s", $bdname);

// Crear conexion
$conn = mysqli_connect($servername, $username, $password);

// Verificar la conexion
if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}

//crea base de datos
$sql = "CREATE DATABASE $bdname";
if (mysqli_query($conn, $sql)) {
    echo "Database created succesfully";
} else{
    echo "Error creating database: " . mysqli_error($conn);
}
// Cerrar la conexion
mysqli_close($conn);
?> 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "boostersystem";
// Crear conexion
$conn = mysqli_connect($servername, $username, $password, $bdname);

// Verificar la conexion
if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}

//Script SQL para generar tablas
$sql = "CREATE TABLE usuarios (
    idUsuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    apellidos VARCHAR(40) NOT NULL,
    correo VARCHAR(60),
    tipoDocumento VARCHAR(60),
    numeroDocumento VARCHAR(60) UNIQUE,
    contrasena VARCHAR(60),
    rol VARCHAR(60)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Directory created succesfully";
} else{
    echo "Error creating table: " . mysqli_error($conn);
}
// Cerrar la conexion
mysqli_close($conn);
?> 
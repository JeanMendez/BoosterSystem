<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "boostersystem2";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Consulta para cambiar el nombre de la base de datos
$oldName = "boostersystem2";
$newName = "boostersystem";
$sql = "ALTER DATABASE $oldName RENAME TO $newName";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "El nombre de la base de datos se cambió correctamente.";
} else {
    echo "Error al cambiar el nombre de la base de datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

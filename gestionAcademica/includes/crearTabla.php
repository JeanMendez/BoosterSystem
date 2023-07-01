<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "boostersystem2";
// Crear conexion
$conn = mysqli_connect($servername, $username, $password, $bdname);

// Verificar la conexion
if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}

<!-- scripts

CREATE TABLE IF NOT EXISTS rol (
    idRol INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombreRol VARCHAR(100) NOT NULL
  );

  
  CREATE TABLE IF NOT EXISTS usuarios (
    idUsuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    apellidos VARCHAR(40) NOT NULL,
    correo VARCHAR(60),
    tipoDocumento VARCHAR(60),
    numeroDocumento VARCHAR(60) UNIQUE,
    contrasena VARCHAR(60),
    rol_idRol INT UNSIGNED NOT NULL,
    FOREIGN KEY (rol_idRol) REFERENCES rol(idRol) ON DELETE CASCADE
  );
  
  CREATE TABLE IF NOT EXISTS estudiantes (
    idEstudiante INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombreEstudiante VARCHAR(100) NOT NULL,
    apellidosEstudiante VARCHAR(100) NOT NULL,
    fechaNacimiento DATE NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL
  );

  CREATE TABLE IF NOT EXISTS asignaturas (
    idAsignatura INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombreAsignatura VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    profesor_idProfesor INT UNSIGNED NOT NULL,
    FOREIGN KEY (profesor_idProfesor) REFERENCES profesor(idProfesor) ON DELETE CASCADE
  );

  CREATE TABLE IF NOT EXISTS periodos_academicos (
    idPeriodo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombrePeriodo VARCHAR(100) NOT NULL,
    fechaInicio DATE NOT NULL,
    fechaFin DATE NOT NULL
  );

  CREATE TABLE IF NOT EXISTS archivos_adjuntos (
    idArchivo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombreArchivo VARCHAR(100) NOT NULL,
    rutaArchivo VARCHAR(255) NOT NULL
  );

  CREATE TABLE IF NOT EXISTS observaciones_academicas (
    idObservacion INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estudiante_idEstudiante INT UNSIGNED NOT NULL,
    asignatura_idAsignatura INT UNSIGNED NOT NULL,
    periodo_idPeriodo INT UNSIGNED NOT NULL,
    observacion TEXT NOT NULL,
    FOREIGN KEY (estudiante_idEstudiante) REFERENCES estudiantes(idEstudiante) ON DELETE CASCADE,
    FOREIGN KEY (asignatura_idAsignatura) REFERENCES asignaturas(idAsignatura) ON DELETE CASCADE,
    FOREIGN KEY (periodo_idPeriodo) REFERENCES periodos_academicos(idPeriodo) ON DELETE CASCADE
  );

  CREATE TABLE IF NOT EXISTS horarios (
    idHorario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    asignatura_idAsignatura INT UNSIGNED NOT NULL,
    profesor_idProfesor INT UNSIGNED NOT NULL,
    grupo_idGrupo INT UNSIGNED NOT NULL,
    diaSemana VARCHAR(20) NOT NULL,
    horaInicio TIME NOT NULL,
    horaFin TIME NOT NULL,
    FOREIGN KEY (asignatura_idAsignatura) REFERENCES asignaturas(idAsignatura) ON DELETE CASCADE,
    FOREIGN KEY (profesor_idProfesor) REFERENCES profesor(idProfesor) ON DELETE CASCADE,
    FOREIGN KEY (grupo_idGrupo) REFERENCES grupos(idGrupo) ON DELETE CASCADE
  );

  CREATE TABLE IF NOT EXISTS grupos (
    idGrupo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombreGrupo VARCHAR(100) NOT NULL,
    nivelEducativo VARCHAR(50) NOT NULL,
    anioEscolar INT NOT NULL
  );

  CREATE TABLE IF NOT EXISTS calificaciones (
    idCalificacion INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    estudiante_idEstudiante INT UNSIGNED NOT NULL,
    asignatura_idAsignatura INT UNSIGNED NOT NULL,
    periodo_idPeriodo INT UNSIGNED NOT NULL,
    calificacion DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (estudiante_idEstudiante) REFERENCES estudiantes(idEstudiante) ON DELETE CASCADE,
    FOREIGN KEY (asignatura_idAsignatura) REFERENCES asignaturas(idAsignatura) ON DELETE CASCADE,
    FOREIGN KEY (periodo_idPeriodo) REFERENCES periodos_academicos(idPeriodo) ON DELETE CASCADE
  );

  CREATE TABLE IF NOT EXISTS profesor (
    idProfesor INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombreProfesor VARCHAR(100) NOT NULL,
    apellidosProfesor VARCHAR(100) NOT NULL
  );
  

-->

//Script SQL para generar tablas
$sql = "ALTER TABLE usuarios DROP COLUMN rol";
  
  

if (mysqli_query($conn, $sql)) {
    echo "Table Directory created succesfully";
} else{
    echo "Error creating table: " . mysqli_error($conn);
}
// Cerrar la conexion
mysqli_close($conn);
?> 
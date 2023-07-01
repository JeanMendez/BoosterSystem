<?php
include_once 'includes/verificarAcceso.php';

// Verificar si se ha iniciado sesión para un estudiante
if (isset($_SESSION['documentoUsuario']) && !empty($_SESSION['documentoUsuario'])) {
    $documentoUsuario_sesion = $_SESSION['documentoUsuario'];

    // Obtener el ID del estudiante según el documento del usuario
    $sqlEstudianteId = "SELECT idEstudiante FROM estudiante WHERE documentoEstudiante = '$documentoUsuario_sesion'";
    $resultEstudianteId = $conexion->query($sqlEstudianteId);

    // Verificar si se encontró al estudiante
    if ($resultEstudianteId->num_rows === 0) {
        echo "Estudiante no encontrado";
        exit();
    }

    // Obtener el ID del estudiante
    $rowEstudianteId = $resultEstudianteId->fetch_assoc();
    $estudianteId = $rowEstudianteId['idEstudiante'];

    // Obtener los datos del estudiante
    $sqlEstudiante = "SELECT * FROM estudiante WHERE idEstudiante = '$estudianteId'";
    $resultEstudiante = $conexion->query($sqlEstudiante);

    // Obtener los carnets del estudiante
    $sqlCarnets = "SELECT * FROM carnet WHERE estudiante_idEstudiante = '$estudianteId'";
    $resultCarnets = $conexion->query($sqlCarnets);

    // Obtener el nombre del estudiante
    $rowEstudiante = $resultEstudiante->fetch_assoc();
    $nombreEstudiante = $rowEstudiante['nombresEstudiante'];
} else {
    echo "No se ha iniciado sesión para un estudiante";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stilos2.css">
    
</head>
<body>
    <div class="container">
        <h1 class="text-center">Carnet del Estudiante</h1>
        <h2 class="text-center"><?php echo $nombreEstudiante; ?></h2>

        <div class="row">
            <?php while ($rowCarnet = $resultCarnets->fetch_assoc()) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="carnetEstudiantil/<?php echo $rowCarnet['portada']; ?>" alt="Portada">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rowCarnet['titulo']; ?></h5>
                            <a href="carnetEstudiantil/<?php echo $rowCarnet['archivo']; ?>" class="btn btn-primary">Descargar Carnet</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Bootstrap 4 JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3g+Ix8jwkfIQ2GYO4fWTFpBamoBOXLrO+56t1t4gKTj0U5KIv7" crossorigin="anonymous"></script>
</body>
</html>

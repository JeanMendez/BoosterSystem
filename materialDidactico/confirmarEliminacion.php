<?php include_once 'includes/verificarAcceso.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Material</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger text-center">
                    <br><p>¿Esta seguro de eliminar este material didactico?</p>
                </div>

    <div class="row">
        <div class="col-sm-10">
            <form action="includes/eliminarMaterial.php" method="POST">
                <input type="hidden" name="idMateriaDidactico" value="<?php echo $_GET['id']; ?>">
                <input style="margin-left: 180px;" type="submit" name="" value="Confirmar" class= " btn btn-danger">
                <a href="includes/consultarMaterial.php" class="btn btn-success">Cancelar</a>               
        </div>
    </div>
</body>
</html>
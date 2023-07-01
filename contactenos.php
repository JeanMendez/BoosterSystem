<!DOCTYPE html>
<html>
  <head>
    <title>Instituto Gerardo Valencia Cano</title>
    <link rel="stylesheet" type="text/css" href="css/stilos.css">
    <link rel="stylesheet" type="text/css" href="gestionAcademica/css/stilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/63de662e55.js" crossorigin="anonymous"></script>
    
  </head>
  <body>
    
  <!DOCTYPE html>
<html>
  <head>
    <title>Mi Colegio</title>
    <script src="https://kit.fontawesome.com/4730e8f7f3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/stilos.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/63de662e55.js" crossorigin="anonymous"></script>
</head>
    <body>
    <header>
      <div class="logo-container">
        <img src="img/logo.png" alt="Logo del Colegio">
      
      </div>
      <nav>
      <a href="./"><i class="fa-solid fa-house"></i></i>Inicio</a>
        <a href="QuienesSomos.php"><i class="fas fa-users fa-lg"></i>Quienes somos?</a>
        <a href="Galeria.php"><i class="fas fa-images fa-lg"></i>Galeria</a>
        <a href="contactenos.php"><i class="fas fa-question-circle fa-lg"></i>Contactenos</a>
        <a href="https://www.google.com"><i class="fas fa-question-circle fa-lg"></i>Ayuda</a>
        <a href="./login"><i class="fa-solid fa-right-to-bracket"></i>Login</a>
      </nav>
    </header>
  <div class="container">
    <div class="row align-items-start">
        <div class="col-4">
            
        </div>
        <div class="col-4">
            <br><h2>Contactenos</h2>
                <form class="form-horizontal" action="admisiones/includes/registrarInteresados.php" method="post" ><br>
                        <div class="form-group">
                                <label for="tipoDocumento">Tipo de documento:</label>
                                <select id="tipoDocumento" name="tipoDocumento" required>
                                  <option value="">Seleccione una opción</option>
                                  <option value="CC">Cédula de ciudadanía</option>
                                  <option value="TI">Tarjeta de identidad</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="numeroDocumento">Número de documento:</label>
                                <input type="text" id="numeroDocumento" name="numeroDocumento" required>
                              </div>
                              <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" required>
                              </div>
                              <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" id="apellidos" name="apellidos" required>
                              </div>
                              <div class="form-group">
                                <label for="correo">Telefono:</label>
                                <input type="text" id="telefono" name="telefono" required>
                              </div>
                              <div class="form-group">
                                <label for="correo">Correo electrónico:</label>
                                <input type="email" id="correo" name="correo" required>
                              </div>
                              <div class="form-group">
                                <button type="submit" value="Guardar" name="registrar">Enviar</button>
                              </div>
                </form>
        </div>
        <div class="col-4">
          
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="alertas.js"></script>
  </body>
</html>
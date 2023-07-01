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
        <a href="presentacion.php"><i class="fa-solid fa-file-pdf"></i></i>Presentacion</a>
        <a href="QuienesSomos.php"><i class="fas fa-users fa-lg"></i>Quienes somos?</a>
        <a href="Galeria.php"><i class="fas fa-images fa-lg"></i>Galeria</a>
        <a href="contactenos.php"><i class="fas fa-question-circle fa-lg"></i>Contactenos</a>
        <a href="https://www.google.com"><i class="fas fa-question-circle fa-lg"></i>Ayuda</a>
        <a href="./login"><i class="fa-solid fa-right-to-bracket"></i>Login</a>
      </nav>
    </header>
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">

        <div class="carousel-item active d-item">
          <img src="img/carrusel1.jpg" class="d-block w-100 d-img" alt="slider 1">
          
      </div>
      
        <div class="carousel-item d-item">
          <img src="img/carrusel2.jpg" class="d-block w-100 d-img" alt="slider 1">
      </div>

        <div class="carousel-item d-item">
          <img src="img/carrusel3.jpeg" class="d-block w-100 d-img" alt="slider 1">
      </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container-fluid pt-5">
      <div class="container pb-3">
        <div class="row">
          <div class="text-center pb-2">
            <h1 class="mb-4">Actividades Extracurriculares</h1>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
  <div class="boton-modal btn bg-image adow-sm border-top rounded mb-4" style="padding: 40px " onclick="abrirModal()">
    <div class="pl-4">
      <h4>Danzas</h4>
      <p class="m-0">
        "A todo el mundo le da igual tu habilidad para bailar bien. Levántate y baile. 
        Los grandes bailarines..."
      </p>
    </div>
  </div>
</div>

<!-- Ventana Modal -->
<input type="checkbox" id="btn-modal" >
<div class="container-modal" >
  <div class="content-modal" style="background: #f5f5f5;">
    <span class="cerrar-modal" onclick="cerrarModal()">&#10005;</span> <!-- Agrega la "x" en la esquina del modal -->
    
    <h2>¡Danzas!</h2>
    <p>La danza es una expresión artística que trasciende las habilidades técnicas. 
      Lo importante no es la perfección en cada paso, sino la pasión y el sentimiento que se transmite a través del movimiento. 
      Bailar es liberador, es una forma de comunicación sin palabras, donde el cuerpo se convierte en el medio para expresar emociones y contar historias.
<br>
</p>
    <div class="container">
        <img class="imagen" src="img/danzas.png" alt="">
        <img class="imagen" src="img/danza2.jfif" alt="">
        <img class="imagen" src="img/danzas3.jfif" alt="">
    </div>
    <div class="texto1">
        <h5>Horarios de 12:30 pm a 2:00 pm</h5>
        <h5>Lunes y Jueves</h5>
        
    </div>
  </div>
  <label for="btn-modal" class="cerrar-modal"></label>
</div>
<!-- Fin de Ventana Modal -->

<script type="text/javascript">
function abrirModal() {
  var modal = document.getElementById("btn-modal");
  modal.checked = true;
}

function cerrarModal() {
  var modal = document.getElementById("btn-modal");
  modal.checked = false;
}
</script>



          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="btn bg-image-1 adow-sm border-top rounded mb-4"
              style="padding: 40px">
              <div class="pl-4">
                <h4>Musica</h4>
                <p class="m-0">
                  La música todas las cosas que al mar 
                  tiramos nos la devuelve siempre la marea....
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="btn bg-image-2 adow-sm border-top rounded mb-4"
              style="padding: 40px">
              <div class="pl-4">
                <h4>Artes</h4>
                <p class="m-0">
                  “Descubrí que podía decir las cosas con 
                  color y formas, cosas que no podía decir de otra...
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="btn bg-image-3 adow-sm border-top rounded mb-4"
              style="padding: 40px" >
              <div class="pl-4">
                <h4>Deportes</h4>
                <p class="m-0">
                  Un atleta no puede correr con el dinero en sus bolsillos. 
                  Debe trabajar con la esperanza en su corazón y los...
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="btn bg-image-4 adow-sm border-top rounded mb-4"
              style="padding: 40px">
              <div class="pl-4">
                <h4>Porras</h4>
                <p class="m-0">
                  Todos tienen dentro de ellos una buena noticia. 
                  ¡La buena noticia es que no sabes lo genial...
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
            <div
              class="btn bg-image-5 adow-sm border-top rounded mb-4"
              style="padding: 40px">
              <div class="pl-4">
                <h4>Banda marcial</h4>
                <p class="m-0">
                  Hay dos grandes días en la vida de una persona: 
                  el día en que nacemos y el día en que descubrimos para qué...
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid-1 pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <h1 class="mb-4">Actividades Culturales</h1>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="img/diadelpadre.jpg" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Dia de los padres</h4>
                <p class="card-text">
                  Me enseñaste a montar en bici, me ayudaste con los deberes, 
                  me curaste las heridas… No querrás también pagarme las letras del coche, 
                  ¿verdad? Bueno, por ahora me conformaré con que sigas regalándome tu amor incondicional.
                </p>
              </div>
              <button class="btn btn-primary px-4 mx-auto mb-4" type="submit" onclick="mostrarAlerta1()">Informacion</button>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="img/diadelaindependencia.jpg" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Dia de la independencia</h4>
                <p class="card-text">
                  Me enseñaste a montar en bici, me ayudaste con los deberes, 
                  me curaste las heridas… No querrás también pagarme las letras del coche, 
                  ¿verdad? Bueno, por ahora me conformaré con que sigas regalándome tu amor incondicional.
                </p>
              </div>
              <button class="btn btn-primary px-4 mx-auto mb-4" type="submit" onclick="mostrarAlerta2()">Informacion</button>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card border-0 bg-light shadow-sm pb-2">
              <img class="card-img-top mb-2" src="img/halloween.jpg" alt="" />
              <div class="card-body text-center">
                <h4 class="card-title">Hallowen</h4>
                <p class="card-text">
                  “Está noche me quedaré espantada de ver un disfraz mejor que otro. 
                  No te sorprendas si escuchas gritos por las calles, son los niños que disfrutan celebrar esta fecha donde 
                  todo es fantasía porque el único objetivo es tener un día muy alegre y entretenido.”
                </p>
              </div>
              <button class="btn btn-primary px-4 mx-auto mb-4" type="submit" onclick="mostrarAlerta3()">Informacion</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid-2 text-white mt-5 py-5 px-sm-3 px-md-5" style="background-color: #003366;">
      <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">  
          <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px">
            <i class="fa-sharp fa-solid fa-school-flag"></i>
            <span class="text-white" style="font-size: 30px;">Instituto Gerardo <br> Valencia Cano</span>
          </a>
          <p>
            La educacion es nuestra primer amigo para construir nuestro futuro.
          </p>
          <div class="d-flex justify-content-start mt-4">
            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" 
            style="width: 38px; height: 38px" href="./404/error404.php">
              <i class="fab fa-twitter"></i></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="https://www.facebook.com/valencia.cano.9406"
              ><i class="fab fa-facebook-f"></i
            ></a>
            
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="./404/error404.php"
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Contacto:</h3>
          <div class="d-flex">
            <h4 class="fa fa-map-marker-alt text-primary">&#160;&#160;</h4>
            <div class="pl-3">
              <h5 class="text-white">Direccion</h5>
              <p>KR 77 J # 65 I - 22 sur, Bogota D.C Bosa</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-envelope text-primary">&#160;&#160;</h4>
            <div class="pl-3">
              <h5 class="text-white">Correo</h5>
              <p>gerardovalenciacano.24
                @gmail.com</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-phone-alt text-primary">&#160;&#160;</h4>
            <div class="pl-3">
              <h5 class="text-white">Telefono</h5>
              <p>7755223 - 7809976</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Siguenos en:</h3>
          <div class="d-flex">
            <h4 class="fa fa-facebook-f text-primary">&#160;&#160;</h4>
            <div class="pl-3">
              <h5 class="text-white">Facebook</h5>
              <p>valencia.cano.9406</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-twitter text-primary">&#160;&#160;</h4>
            <div class="pl-3">
              <h5 class="text-white">Twitter</h5>
              <p>valencia.cano.9406</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-instagram text-primary">&#160;&#160;</h4>
            <div class="pl-3">
              <h5 class="text-white">Instagram</h5>
              <p>7755223 - 7809976</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Enlaces rapidos</h3>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-white mb-2" href="Index.html"
              ><i class="fa fa-angle-right mr-2">&#160;&#160;</i>Inicio</a>
            <a class="text-white mb-2" href="QuienesSomos.php"
              ><i class="fa fa-angle-right mr-2">&#160;&#160;</i>¿Quienes somos?</a>
            <a class="text-white mb-2" href="Galeria.php"
              ><i class="fa fa-angle-right mr-2">&#160;&#160;</i>Galeria</a>
            <a class="text-white mb-2" href="./404/error404.php"
              ><i class="fa fa-angle-right mr-2">&#160;&#160;</i>Actividades</a>
            <a class="text-white mb-2" href="presentacion.php"
              ><i class="fa fa-angle-right mr-2">&#160;&#160;</i>Presentacion</a>
          </div>
        </div>
      </div>
      <div
        class="container-fluid-3 pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
      >
        <p class="m-0 text-center text-white">
          &copy;
          <a class="text-primary font-weight-bold" href="#">Instituto Gerardo Valencia Cano</a>.
          Todos los derechos reservados.

          Diseñado por
          <a class="text-primary font-weight-bold" href="404/error404.php"
            >Gaes 2</a
          >
          <br />Distribuido por:
          <a href="404/error404.php" target="_blank">Gaes 2</a>
        </p>
      </div>
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="js/function.js"></script>
  </body>
</html>
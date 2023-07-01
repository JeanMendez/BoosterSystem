<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>

  </header>
  <main class="container">

    <br>
    <div class="card">
      <div class="card-header">
        <h4>Cronograma</h4>
        <br>
      </div>
      <div class="card-body">
        <div class="table-responsive-sm">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Portada</th>
                <th scope="col">PDF</th>

              </tr>
            </thead>
            <tbody>
              <?php
              // Conexión a la base de datos
              $conexion = mysqli_connect('localhost', 'root', '', 'boostersystem');

              // Verificar si la conexión fue exitosa
              if (!$conexion) {
                die('Error de conexión a la base de datos: ' . mysqli_connect_error());
              }

              // Consulta SQL para obtener los registros del cronograma
              $sql = "SELECT * FROM cronograma";

              // Ejecutar la consulta
              $resultado = mysqli_query($conexion, $sql);

              // Comprobar si se encontraron registros
              if (mysqli_num_rows($resultado) > 0) {
                // Generar las filas de la tabla con los datos recuperados
                while ($row = mysqli_fetch_assoc($resultado)) {
                  echo '<tr>';
                  echo '<td>' . $row['titulo'] . '</td>';
                  echo '<td><img src="cronograma/' . $row['portada'] . '" alt="Portada" width="50"></td>';
                  echo '<td><a href="cronograma/' . $row['archivo'] . '" target="_blank">Ver/Descargar</a></td>';
                  echo '<td>';
                  echo '</tr>';

                
                }
              } else {
                // No se encontraron registros
                echo '<tr><td colspan="4">No se encontraron registros en el cronograma</td></tr>';
              }

             
              mysqli_close($conexion);
              ?>
            </tbody>
          </table>
        </div>

      </div>

    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

</body>

</html>

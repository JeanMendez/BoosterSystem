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
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar</a>
      </div>
      <div class="card-body">
        <div class="table-responsive-sm">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Portada</th>
                <th scope="col">PDF</th>
                <th scope="col">Acciones</th>

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
                  echo '<td><img src="./' . $row['portada'] . '" alt="Portada" width="50"></td>';
                  echo '<td><a href="./' . $row['archivo'] . '" target="_blank">Ver/Descargar</a></td>';
                  echo '<td>';
                  echo '<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal' . $row['idCronograma'] . '">Editar</button>';
                  echo '<a class="btn btn-danger" href="#" role="button" onclick="eliminarArchivo(' . $row['idCronograma'] . ', \'' . $row['archivo'] . '\', \'' . $row['portada'] . '\')">Eliminar</a>';
                  echo '</td>';
                  echo '</tr>';

                  // Modal de edición
                  echo '<div class="modal fade" id="editarModal' . $row['idCronograma'] . '" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">';
                  echo '<div class="modal-dialog">';
                  echo '<div class="modal-content">';
                  echo '<div class="modal-header">';
                  echo '<h5 class="modal-title" id="editarModalLabel">Editar Cronograma</h5>';
                  echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                  echo '</div>';
                  echo '<div class="modal-body">';
                  echo '<form action="editar.php" method="post" enctype="multipart/form-data">';
                  echo '<input type="hidden" name="idCronograma" value="' . $row['idCronograma'] . '">';
                  echo '<div class="mb-3">';
                  echo '<label for="titulo" class="form-label">Título</label>';
                  echo '<input type="text" class="form-control" id="titulo" name="titulo" value="' . $row['titulo'] . '" required>';
                  echo '</div>';
                  echo '<div class="mb-3">';
                  echo '<label for="portada" class="form-label">Portada actual</label>';
                  echo '<img src="./' . $row['portada'] . '" alt="Portada actual" width="100">';
                  echo '</div>';
                  echo '<div class="mb-3">';
                  echo '<label for="nuevaPortada" class="form-label">Nueva Portada</label>';
                  echo '<input type="file" class="form-control" id="nuevaPortada" name="nuevaPortada">';
                  echo '</div>';
                  echo '<div class="mb-3">';
                  echo '<label for="pdf" class="form-label">PDF actual</label>';
                  echo '<a href="./' . $row['archivo'] . '" target="_blank">Ver/Descargar</a>';
                  echo '</div>';
                  echo '<div class="mb-3">';
                  echo '<label for="nuevoPDF" class="form-label">Nuevo PDF</label>';
                  echo '<input type="file" class="form-control" id="nuevoPDF" name="nuevoPDF">';
                  echo '</div>';
                  echo '<div class="modal-footer">';
                  echo '<button type="submit" class="btn btn-primary">Guardar cambios</button>';
                  echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>';
                  echo '</div>';
                  echo '</form>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                }
              } else {
                // No se encontraron registros
                echo '<tr><td colspan="4">No se encontraron registros en el cronograma</td></tr>';
              }

              // Cerrar la conexión a la base de datos
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function eliminarArchivo(idCronograma, archivo, portada) {
      if (confirm('¿Estás seguro de eliminar este archivo y su portada?')) {
        $.ajax({
          url: 'eliminar.php',
          type: 'POST',
          data: {
            idCronograma: idCronograma,
            archivo: archivo,
            portada: portada
          },
          success: function(response) {
            // Realizar acciones adicionales después de eliminar el archivo, si es necesario
            console.log(response);
            location.reload(); // Recargar la página
          },
          error: function(xhr, status, error) {
            // Manejar errores de AJAX, si es necesario
            console.error(error);
          }
        });
      }
    }
  </script>
</body>

</html>

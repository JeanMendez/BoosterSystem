<?php
require_once ("conexion.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>

<table class="table table-striped table-dark table_id">

                   
<thead>    
<tr>
<th>Tipo de documento</th>
<th>Documento</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Telefono</th>
<th>Correo</th>
<th>Contraseña</th>
<th>Estado</th>
<th>Rol</th>
<th>Fecha Matricula</th>
<th>Descripción</th>
<th>Archivo pension</th>
<th>Curso</th>
<th>Acciones</th>


</tr>
</thead>
<tbody>

<?php

$dato = mysqli_query($conexion, "SELECT u.*, m.fechaMatricula, m.descripcionMatricula, m.archivoPension, m.cursos_idCurso
FROM usuarios u
LEFT JOIN estudiante e ON u.idUsuario = e.usuarios_idUsuario
LEFT JOIN matricula m ON e.idEstudiante = m.estudiante_idEstudiante");


                            

if ($dato->num_rows > 0) {
while ($fila = mysqli_fetch_array($dato)) {

?>
<tr>
<td><?php echo $fila['documentoUsuario']; ?></td>
<td><?php echo $fila['nombresUsuario']; ?></td>
<td><?php echo $fila['apellidosUsuario']; ?></td>
<td><?php echo $fila['telefonoUsuario']; ?></td>
<td><?php echo $fila['correoUsuario']; ?></td>
<td><?php echo $fila['passwordUsuario']; ?></td>
<td><?php echo $fila['estadoUsuario']; ?></td>
<td><?php echo $fila['rol_idRol']; ?></td>
<td><?php echo $fila['fechaMatricula']; ?></td>
<td><?php echo $fila['descripcionMatricula']; ?></td>
<td><?php echo $fila['archivoPension']; ?></td>
<td><?php echo $fila['cursos_idCurso']; ?></td>


<?php
}
?>
<?php
}
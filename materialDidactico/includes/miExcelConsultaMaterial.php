<?php
include('conexion.php');
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset='utf-8'");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "Reporte de consulta de material didactico_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$consulta = ("SELECT * FROM materiaDidactico;");
$resultado = mysqli_query($conexion, $consulta);

?>

<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>N.</th>
    <th>Nombre</th>
    <th>Categoria</th>
    <th>Fecha de publicacion</th>
    <th>Archivo</th>
    <th>Descripcion</th>
    <th>Tipo</th>
    <th>Autor</th>
    </tr>
</thead>
<?php
$i =1;
    while ($fila = mysqli_fetch_array($resultado)) { ?>
    <tbody>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $fila['nombre'];?></td>
            <td><?php echo $fila['categoria']; ?></td>
            <td><?php echo $fila['fechaPublicacion'] ; ?></td>
            <td><?php echo $fila['archivoMaterial']; ?></td>
            <td><?php echo $fila['descripcion'] ; ?></td>
            <td><?php echo $fila['tipo']; ?></td>
            <td><?php echo $fila['autor'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>
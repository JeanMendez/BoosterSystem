<?php
include('conexion.php');
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset='utf-8'");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "Reporte de citas para la prueba de admision_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$consulta = ("SELECT * FROM interesados, citaprueba WHERE interesados.documentoInteresados = citaprueba.documentoAspirante;");
$resultado = mysqli_query($conexion, $consulta);

?>

<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>#</th>
    <th>Tipo de documento</th>
    <th>Documento</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Telefono</th>
    <th>Correo</th>
    <th>Fecha</th>
    </tr>
</thead>
<?php
$i =1;
    while ($fila = mysqli_fetch_array($resultado)) { ?>
    <tbody>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $fila['tipoDocumentoInteresados'];?></td>
            <td><?php echo $fila['documentoInteresados']; ?></td>
            <td><?php echo $fila['nombreInteresados'] ; ?></td>
            <td><?php echo $fila['apellidoInteresados']; ?></td>
            <td><?php echo $fila['telefonoInteresados'] ; ?></td>
            <td><?php echo $fila['correoInteresados']; ?></td>
            <td><?php echo $fila['fecha'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>
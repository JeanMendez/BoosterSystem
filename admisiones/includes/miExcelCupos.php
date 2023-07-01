<?php
include('conexion.php');
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset='utf-8'");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "Reporte de cupos_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$consulta = ("SELECT * FROM cupos ORDER BY jornadaAcademica");
$resultado = mysqli_query($conexion, $consulta);

?>

<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>#</th>
    <th>Jornada Academica</th>
    <th>Grado</th>
    <th>Cantidad</th>
    </tr>
</thead>
<?php
$i =1;
    while ($fila = mysqli_fetch_array($resultado)) { ?>
    <tbody>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $fila['jornadaAcademica']; ?></td>
            <td><?php echo $fila['grado']; ?></td>
            <td><?php echo $fila['cantidad'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>
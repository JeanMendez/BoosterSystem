<?php
	include_once 'conexion.php';
	$idMateriaDidactico = $_GET['id'];
	$consulta = "SELECT * FROM materiaDidactico WHERE idMateriaDidactico = '$idMateriaDidactico'";
	$resultado = mysqli_query($conexion, $consulta);

	if (mysqli_num_rows($resultado) == 1) {
		$fila = mysqli_fetch_assoc($resultado);
		$archivo = $fila['archivoMaterial'];
		echo $archivo;
		$rutaArchivo = "files/".$archivo;

		if (file_exists($rutaArchivo)) {
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.$archivo.'"');
			readfile($rutaArchivo);
		}else{
			echo "El archivo no existe en el servidor";
		}
	}else{
		echo "El archivo no se encontro en la base de datos";
	}

?>
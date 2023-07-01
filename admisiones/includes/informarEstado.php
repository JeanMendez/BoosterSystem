<?php
    $idInteresados = $_GET['id'];
    $conexion = mysqli_connect("localhost", "root", "", "boostersystem");
    $consulta = "SELECT * FROM interesados, resultadoprueba WHERE interesados.documentoInteresados = resultadoprueba.documentoAspirante";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se encontró el usuario
    if (!$idInteresados) {
        // Manejar el caso de usuario no encontrado, redireccionar o mostrar un mensaje de error
        exit("El id no existe");
    }

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $nombreInteresados = $fila['nombreInteresados'];
            $apellidoInteresados = $fila['apellidoInteresados'];
            $correoInteresados = $fila['correoInteresados'];
            $puntaje = $fila['puntaje'];
            $estado = $fila['estado'];
        }
    }
    
    if ($estado == "aprobado") {
        $mail = mail("$correoInteresados", "Resultado prueba de admision", "Buen dia ".$nombreInteresados." ".$apellidoInteresados." permitame informarle que usted a aprobado para entrar a la institucion Gerardo Valecia Cano, paso con exito la prueba de admision con un puntaje de ".$puntaje." muchas felicidades");
    }else{
        $mail = mail("$correoInteresados", "Resultado prueba de admision", "Buen dia ".$nombreInteresados." ".$apellidoInteresados." permitame informarle que usted a reprobado la prueba de admision de la institucion Gerardo Valecia Cano, el puntaje de ".$puntaje." no fue suficiente para aprobar.");
    }
    

    if ($mail) {
        echo "<script>alert('El correo se envio exitosamente.');
            window.location.href = '../consultarResultadosPrueba.php';</script>";
    }else{
             echo "<script>alert('Noooooooooooooooooooooooooooooooooooooo')</script>";   
    }
?>
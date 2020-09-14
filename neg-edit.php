<?php
    $idNegociacion = $_POST["idNegociacion"];
    $idConcurso = $_POST["idConcurso"];
    $fecha = $_POST["fecha"];
    $estado = $_POST["estado"];
    $resultado = $_POST["resultado"];

    $ruta = getcwd().'/docs/actas/';
    $archivo = $ruta.$_FILES["acta"]["name"];
    if (!file_exists($ruta)) {
        mkdir($ruta,0777,true);
    }
    move_uploaded_file($_FILES["acta"]["tmp_name"], $archivo);

    $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
    $sentencia = "UPDATE negociacion SET fecha='$fecha',estado='$estado',acta='$archivo',resultado=$resultado WHERE idNegociacion=$idNegociacion;";
    mysqli_query($enlace,$sentencia);

    if ($resultado==1) {
        $today = date("Y-m-d");
        $sentencia2 = "INSERT INTO convenios VALUES (NULL,' ','$today',0,'$idConcurso','$idNegociacion');";
        mysqli_query($enlace,$sentencia2);
    }
    header("Location: negociaciones.php");
?>
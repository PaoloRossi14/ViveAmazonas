<?php
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
    $sentencia = "INSERT INTO negociacion VALUES (NULL,'$fecha','$estado','$archivo','$resultado','$idConcurso');";
    mysqli_query($enlace,$sentencia);
    header("Location: negociaciones.php");
?>
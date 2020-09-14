<?php
    $idProponente = substr($_POST["idProponente"],12);
    $idConcurso = substr($_POST["idConcurso"],10);
    $fecha = $_POST["fecha"];

    $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
    $sentencia = "INSERT INTO negociacion VALUES (NULL,'$fecha','Pendiente',' ',' ','$idConcurso');";
    mysqli_query($enlace,$sentencia);
    header("Location: principal.php");
?>
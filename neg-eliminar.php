<?php
    $idNegociacion = $_GET["idNegociacion"];
    $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
    $sentencia = "DELETE FROM negociacion WHERE idNegociacion='$idNegociacion';";
    mysqli_query($enlace,$sentencia);
    header("Location: negociaciones.php");
?>
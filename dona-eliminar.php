<?php
    $idDonatario = $_GET["idDonatario"];
    $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
    $sentencia = "DELETE FROM donatarios WHERE idDonatario='$idDonatario';";
    mysqli_query($enlace,$sentencia);
    header("Location: donatarios.php");
?>
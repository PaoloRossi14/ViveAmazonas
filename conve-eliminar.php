<?php
    $idConvenio = $_GET["idConvenio"];
    $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
    $sentencia = "DELETE FROM convenios WHERE idConvenio='$idConvenio';";
    mysqli_query($enlace,$sentencia);
    header("Location: convenios.php");
?>
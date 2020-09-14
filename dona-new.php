<?php
$idConvenio = $_POST["idConvenio"];

$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
$sentencia = "SELECT * FROM convenios WHERE idConvenio=$idConvenio;";
$resultado = mysqli_query($enlace,$sentencia);
$registro = mysqli_fetch_row($resultado);

$monto = $registro[3];
$today = date("Y-m-d");

$sentencia2 = "INSERT INTO donatarios VALUES (NULL,0,'$monto','$today','$idConvenio');";
mysqli_query($enlace,$sentencia2);
header("Location: donatarios.php");
?>
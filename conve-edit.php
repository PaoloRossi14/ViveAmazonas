<?php
$idConvenio = $_POST["idConvenio"];
$fuenteFinanciera = $_POST["fuenteFinanciera"];
$vigencia = $_POST["vigencia"];
$monto = $_POST["monto"];

$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
$sentencia = "UPDATE convenios SET fuenteFinanciera='$fuenteFinanciera',vigencia='$vigencia',monto='$monto' WHERE idConvenio=$idConvenio;";
$resultado = mysqli_query($enlace,$sentencia);
$registro = mysqli_fetch_row($resultado);
header("Location: convenios.php");
?>
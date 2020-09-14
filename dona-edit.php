<?php
$idDonatario = $_POST["idDonatario"];
$capitalUtilizado = $_POST["capitalUtilizado"];
$idConvenio = $_POST["idConvenio"];

$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
$sentencia = "SELECT * FROM convenios WHERE idConvenio=$idConvenio;";
$resultado = mysqli_query($enlace,$sentencia);
$registro = mysqli_fetch_row($resultado);

$monto = $registro[3];
$today = date("Y-m-d");

$capitalRestante = $monto - $capitalUtilizado;

echo "$capitalRestante";
$sentencia2 = "UPDATE donatarios SET capitalUtilizado='$capitalUtilizado',capitalRestante='$capitalRestante',fechaActualizacion='$today' WHERE idDonatario=$idDonatario;";
mysqli_query($enlace,$sentencia2);
header("Location: donatarios.php");


?>
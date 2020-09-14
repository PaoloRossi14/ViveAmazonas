<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idEvaluacion = $_GET["idEvaluacion"];
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "delete from evaluaciones where idEvaluacion='$idEvaluacion';";
		mysqli_query($enlace,$sentencia);
		header("Location: evaluaciones.php");
	?>
</body>
</html>
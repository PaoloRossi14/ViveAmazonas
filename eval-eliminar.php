<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idEvaluador = $_GET["idEvaluador"];
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "delete from evaluadores where idEvaluador='$idEvaluador';";
		mysqli_query($enlace,$sentencia);
		header("Location: evaluadores.php");
	?>
</body>
</html>
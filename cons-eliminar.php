<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idConsulta = $_GET["idConsulta"];
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "delete from consultas where idConsulta='$idConsulta';";
		mysqli_query($enlace,$sentencia);
		header("Location: consultas.php");
	?>
</body>
</html>
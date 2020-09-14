<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$nombrePerfil = $_POST["nombrePerfil"];
		$estado = $_POST["estado"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "INSERT INTO perfiles VALUES (NULL,'$nombrePerfil','$estado');";
		mysqli_query($enlace,$sentencia);
		header("Location: perfiles.php");
	?>
</body>
</html>
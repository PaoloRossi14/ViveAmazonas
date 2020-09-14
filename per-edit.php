<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idPerfil = $_POST["idPerfil"];
		$nombrePerfil = $_POST["nombrePerfil"];
		$estado = $_POST["estado"];
		
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "UPDATE perfiles SET
						idPerfil='$idPerfil',
						nombrePerfil='$nombrePerfil',
						estado='$estado'
						WHERE idPerfil='$idPerfil';";
		mysqli_query($enlace,$sentencia);
		header("Location: perfiles.php");
	?>
</body>
</html>
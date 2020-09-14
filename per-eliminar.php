<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idPerfil = $_GET["idPerfil"];
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "delete from perfiles where idPerfil='$idPerfil';";
		mysqli_query($enlace,$sentencia);
		header("Location: perfiles.php");
	?>
</body>
</html>
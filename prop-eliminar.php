<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idProponente = $_GET["idProponente"];
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "delete from proponentes where idProponente='$idProponente';";
		mysqli_query($enlace,$sentencia);
		header("Location: proponentes.php");
	?>
</body>
</html>
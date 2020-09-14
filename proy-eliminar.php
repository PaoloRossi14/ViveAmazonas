<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idProyecto = $_GET["idProyecto"];
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "delete from proyectos where idProyecto='$idProyecto';";
		mysqli_query($enlace,$sentencia);
		header("Location: proyectos.php");
	?>
</body>
</html>
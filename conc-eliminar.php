<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idConcurso = $_GET["idConcurso"];
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "delete from concursos where idConcurso='$idConcurso';";
		mysqli_query($enlace,$sentencia);
		header("Location: concursos.php");
	?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idConcurso = $_POST["idConcurso"];
		$idProyecto = $_POST["idProyecto"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "INSERT INTO evaluaciones VALUES (NULL,' ',0,' ',0,0,0,NULL,'0','$idConcurso','$idProyecto');";
		mysqli_query($enlace,$sentencia);
		header("Location: evaluaciones.php");

		$sentencia2 = "UPDATE proyectos SET estado='En evaluación' WHERE idProyecto='$idProyecto';";
		mysqli_query($enlace,$sentencia2);
	?>
</body>
</html>
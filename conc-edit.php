<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idConcurso = $_POST["idConcurso"];
		$nombreConcurso = $_POST["nombreConcurso"];
		$fechaInicio = $_POST["fechaInicio"];
		$fechaFin = $_POST["fechaFin"];
		$estado = $_POST["estado"];
		$fechaCreacion = $_POST["fechaCreacion"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "UPDATE concursos SET
						idConcurso='$idConcurso',
						nombreConcurso='$nombreConcurso',
						fechaCreacion='$fechaCreacion',
						fechaInicio='$fechaInicio',
						fechaFin='$fechaFin',
						estado='$estado'
						WHERE idConcurso='$idConcurso';";
		mysqli_query($enlace,$sentencia);
		header("Location: concursos.php");
	?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$cargo = $_POST["cargo"];
		$nivelEvaluacion = $_POST["nivelEvaluacion"];
		$permisoModificacion = $_POST["permisoModificacion"];
		$idConcurso = $_POST["idConcurso"];
		$idUsuario = $_POST["idUsuario"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "INSERT INTO evaluadores VALUES (NULL,'$cargo','$nivelEvaluacion','$permisoModificacion','$idConcurso','$idUsuario');";
		mysqli_query($enlace,$sentencia);
		header("Location: evaluadores.php");
	?>
</body>
</html>
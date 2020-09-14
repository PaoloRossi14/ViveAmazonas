<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idEvaluador = $_POST["idEvaluador"];
		$cargo = $_POST["cargo"];
		$nivelEvaluacion = $_POST["nivelEvaluacion"];
		$permisoModificacion = $_POST["permisoModificacion"];
		$idConcurso = $_POST["idConcurso"];
		$idUsuario = $_POST["idUsuario"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "UPDATE evaluadores SET
						idEvaluador='$idEvaluador',
						cargo='$cargo',
						nivelEvaluacion='$nivelEvaluacion',
						permisoModificacion='$permisoModificacion',
						idConcurso='$idConcurso',
						idUsuario='$idUsuario'
						WHERE idEvaluador='$idEvaluador';";
		mysqli_query($enlace,$sentencia);
		header("Location: evaluadores.php");
	?>
</body>
</html>
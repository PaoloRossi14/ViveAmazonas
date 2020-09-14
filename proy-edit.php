<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idProyecto = $_POST["idProyecto"];
		$nombreProyecto = $_POST["nombreProyecto"];
		$idConcurso = $_POST["idConcurso"];
		$idProponente = $_POST["idProponente"];
		$estatus = $_POST["estatus"];
		$presupuesto = $_POST["presupuesto"];
		$documentacion = $_POST["documentacion"];
		$reunion = $_POST["reunion"];
		$tipo = $_POST["tipo"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "UPDATE proyectos SET
						idProyecto='$idProyecto',
						nombreProyecto='$nombreProyecto',
						idConcurso='$idConcurso',
						idProponente='$idProponente',
						estado='$estatus',
						presupuesto='$presupuesto',
						documentacion='$documentacion',
						reunion='$reunion',
						tipo='$tipo'
						WHERE idProyecto='$idProyecto';";
		mysqli_query($enlace,$sentencia);
		header("Location: proyectos.php");
	?>
</body>
</html>
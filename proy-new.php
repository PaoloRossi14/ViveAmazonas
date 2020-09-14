<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$nombreProyecto = $_POST["nombreProyecto"];
		$idConcurso = $_POST["idConcurso"];
		$idProponente = $_POST["idProponente"];
		$estatus = "Enviado";
		$presupuesto = $_POST["presupuesto"];
		$documentacion = $_POST["documentacion"];
		$reunion = $_POST["reunion"];		
		if ($presupuesto<=100000) {
			$tipo = "B";
		}
		else {
			$tipo = "A";
		}

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "INSERT INTO proyectos VALUES (NULL,'$nombreProyecto',$idConcurso,$idProponente,'$estatus','$presupuesto','$documentacion','$reunion','$tipo',' ');";
		mysqli_query($enlace,$sentencia);
		header("Location: proyectos.php");
	?>
</body>
</html>
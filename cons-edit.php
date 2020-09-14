<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idConsulta= $_POST["idConsulta"];
		$idConcurso= $_POST["idConcurso"];
		$idProponente= $_POST["idProponente"];
		$consulta= $_POST["consulta"];
		$fechaConsulta = $_POST["fechaConsulta"];
		$estado = $_POST["estado"];
		$respuesta= $_POST["respuesta"];

		$today = date('Y-m-d');

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "UPDATE consultas SET
						idConsulta='$idConsulta',
						idConcurso='$idConcurso',
						idProponente='$idProponente',
						consulta='$consulta',
						fechaConsulta='$fechaConsulta',
						estado='$estado',
						respuesta='$respuesta',
						fechaRespuesta='$today'
						WHERE idConsulta='$idConsulta';";
		mysqli_query($enlace,$sentencia);
		header("Location: consultas.php");
	?>
</body>
</html>
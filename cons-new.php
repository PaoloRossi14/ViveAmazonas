<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idProponente = substr($_POST["idProponente"],12);
		$idConcurso = substr($_POST["idConcurso"],10);
		$consulta = $_POST["consulta"];
		$fechaConsulta = substr($_POST["fechaConsulta"],7);
		$estado = "Sin Responder";

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "INSERT INTO consultas VALUES (NULL,'$idConcurso','$idProponente','$consulta','$fechaConsulta','$estado',NULL,NULL);";
		mysqli_query($enlace,$sentencia);
		header("Location: principal.php");
	?>
</body>
</html>
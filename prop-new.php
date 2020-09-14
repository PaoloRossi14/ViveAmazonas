<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$empresa = $_POST["empresa"];
		$RUC = $_POST["RUC"];
		$correo = $_POST["correo"];
		$telefono = $_POST["telefono"];
		$solicitante = $_POST["solicitante"];
		$fechaCreacion = $_POST["fechaCreacion"];
		$idUsuario = $_POST["idUsuario"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "INSERT INTO proponentes VALUES (NULL,'$empresa','$RUC','$correo','$telefono','$solicitante','$fechaCreacion','$idUsuario');";
		mysqli_query($enlace,$sentencia);
		header("Location: proponentes.php");
	?>
</body>
</html>
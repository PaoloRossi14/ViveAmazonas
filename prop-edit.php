<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idProponente = $_POST["idProponente"];
		$empresa = $_POST["empresa"];
		$RUC = $_POST["RUC"];
		$correo = $_POST["correo"];
		$telefono = $_POST["telefono"];
		$solicitante = $_POST["solicitante"];
		$fechaCreacion = $_POST["fechaCreacion"];
		$idUsuario = $_POST["idUsuario"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "UPDATE proponentes SET
						idProponente='$idProponente',
						empresa='$empresa',
						RUC='$RUC',
						correo='$correo',
						telefono='$telefono',
						solicitante='$solicitante',
						fechaCreacion='$fechaCreacion',
						idUsuario='$idUsuario'
						WHERE idProponente='$idProponente';";
		mysqli_query($enlace,$sentencia);
		header("Location: proponentes.php");
	?>
</body>
</html>
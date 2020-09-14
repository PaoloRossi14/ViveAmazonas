<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$id = $_POST["id"];
		$nickname = $_POST["nickname"];
		$password = $_POST["password"];
		$estado = $_POST["estado"];
		$fechaCreacion = $_POST["fechaCreacion"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "UPDATE usuario SET
						id='$id',
						nickname='$nickname',
						password='$password',
						estado='$estado',
						fechaCreacion='$fechaCreacion' 
						WHERE id='$id';";
		mysqli_query($enlace,$sentencia);
		header("Location: usuarios.php");
	?>
</body>
</html>
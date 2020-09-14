<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$nickname = $_POST["nickname"];
		$password = $_POST["password"];
		$estado = $_POST["estado"];
		$fechaCreacion = $_POST["fechaCreacion"];
		if (isset($_POST["guardar"])) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "INSERT INTO usuario VALUES (NULL,'$nickname','$password','$estado','$fechaCreacion');";
			mysqli_query($enlace,$sentencia);	
		}
		header("Location: usuarios.php");
	?>
</body>
</html>
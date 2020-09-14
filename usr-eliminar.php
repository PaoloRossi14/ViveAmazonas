<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$id = $_GET["id"];
		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "delete from usuario where id='$id';";
		mysqli_query($enlace,$sentencia);
		header("Location: usuarios.php");
	?>
</body>
</html>
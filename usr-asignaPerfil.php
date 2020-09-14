<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$id = $_POST["id"];
		$perfil = $_POST["perfil"];
		include("inc/clases.php");
		$objUsuario = new Usuario();
		$objUsuario->asignarPerfil($id, $perfil);
		header("Location:usuarios.php");
	?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<script>
		function alerta() {
			return confirm("Esta seguro que desea realizar la acción?");
		}
	</script>
	<title>Usuarios | Vive Amazonas</title>
</head>
<body>
	<?php
	session_start();
	if (!isset($_SESSION["idUsuario"])){
		session_destroy();
		header("Location:intruso.php");
		exit;
	}
	else{
		include("inc/menu.php");
		include("inc/clases.php");
	?>
	<div id="contenido">
		<h1>Nuevo Usuario</h1><br><br>
		<form action="usr-new.php" method="POST">
			Nickname: <input type="text" name="nickname"><br><br>
			Password: <input type="text" name="password"><br><br>
			Estado: <input name="estado" type="radio" value="A" checked> Activo
					<input name="estado" type="radio" value="I"> Inactivo<br><br>
			<?php
			$today = date('Y-m-d');
			echo "Fecha de Creación: <input type='text' name='fechaCreacion' value='",$today,"' readonly><br><br>";
			?>
			<input type="submit" name="guardar" class="btn" value="Guardar" onclick="return alerta();"><br><br>
			<input type='submit' name="cancelar" class = 'btn' value='Cancelar'>
		</form>
	</div>
	<footer>
		Copyright © ViveAmazonas 2020
	</footer>
	<?php
	}
	?>
</body>
</html>

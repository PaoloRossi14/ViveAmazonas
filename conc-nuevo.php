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
	<title>Concursos | Vive Amazonas</title>
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
		<h1>Nuevo Concurso</h1><br><br>
		<form onsubmit="return alerta();" action="conc-new.php" method="POST" enctype="multipart/form-data">
			Nombre del Concurso: <input type="text" name="nombreConcurso"><br><br>
			Fecha de Inicio: <input type="text" name="fechaInicio"><br><br>
			Fecha de Finalización: <input type="text" name="fechaFin"><br><br>
			Estado: <input name="estado" type="radio" value="A"> Activo
					<input name="estado" type="radio" value="I"> Inactivo
			<br><br>
			<?php
				$today = date("Y-m-d");
				echo "Fecha de Creación: <input type='text' name='fechaCreacion' value='$today' readonly><br><br>";
			?>
			Bases del Concurso: <input type="file" name="bases" accept="application/pdf"><br><br>
			<input type="submit" class="btn" value="Guardar">
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
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
	<title>Negociaciones | Vive Amazonas</title>
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
		<h1>Nueva Negociación</h1><br>
		<form onsubmit="return alerta();" action="neg-new.php" method="POST" enctype="multipart/form-data">
			Código de Concurso: <input type="text" name="idConcurso"><br><br>
			Fecha de Negociación: <input type="text" name="fecha"><br><br>
			Estado: <input name="estado" type="radio" value="Pendiente" checked>Pendiente
					<input name="estado" type="radio" value="Confirmado">Confirmado
					<input name="estado"type="radio" value="Rechazado">Rechazado
					<input name="estado" type="radio" value="Finalizado">Finalizado<br><br>
			Resultado: <input name="resultado" type="radio" value="0" checked>No Aceptó
						<input name="resultado" type="radio" value="1">Aceptó<br><br>
			Acta: <input type="file" name="acta" accept="application/pdf"><br><br>
			<input type="submit" class="btn" Value="Guardar">
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>ViveAmazonas</title>
</head>
<body>
	<header>
		<div class="logo-up">
			<img src="images/small-logo.svg">
		</div>
		<h1>Portal de Gestión de Proyectos</h1>
	</header>
	<div class="salida">
		<div class="wallpaper">
			<div class="overlay">
				<div class="sub-title">Ud. ha salido del sistema</div><br>
				<form action="index.html" class="volver">
					<input type="submit" value="Volver a la web">
				</form><br>
				<img src="images/welcome.svg">
				<?php
					session_start();
					session_destroy();
					//header("Location:index.html");
				?>
			</div>
		</div>
	</div>
	<footer>
		Copyright © ViveAmazonas 2020
	</footer>
</body>
</html>
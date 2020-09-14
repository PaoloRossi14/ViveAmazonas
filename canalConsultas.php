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
	<title>Canal de Consultas | Vive Amazonas</title>
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
	<main>
		<div class="container">
			<div class="contact-box">
				<div class="left"></div>
				<div class="right">
					<h2>Consúltanos!</h2>
					<form onsubmit="return alerta();" action="cons-new.php" method="POST">
						<?php
						$idUsuario = $_SESSION["idUsuario"];
						$objProponente = new Proponente();
						$resultado = $objProponente->obtenerPropYConcxIdUsuario($idUsuario);
						$registro = mysqli_fetch_row($resultado);
						echo "<input type='text' name='idProponente' class='field' value='Proponente: ".$registro[0]."' readonly>";
						echo "<input type='text' name='idConcurso' class='field' value='Concurso: ".$registro[1]."' readonly>";
						$today = date('Y-m-d');
						echo "<input type='text' name='fechaConsulta' class='field' value='Fecha: ".$today."' readonly>";
						?>
						<textarea name="consulta" class="field area" placeholder="Consulta"></textarea>
						<input type="submit" class="btn" value="Enviar">
					</form>
				</div>
			</div>
		</div>
	</main>
	<footer>
		Copyright © ViveAmazonas 2020
	</footer>
	<?php
	}
	?>
</body>
</html>
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
	<title>Evaluaciones | Vive Amazonas</title>
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
		<h1>Nueva Evaluacion</h1><br><br>
		<form onsubmit="return alerta();" action="evaluacion-new.php" method="POST">
			Nombre del Concurso: <select name="idConcurso">
				<?php
					$objConcurso = new Concurso();
					$resultado = $objConcurso->obtenerConcursos();
					$numFilas = mysqli_num_rows($resultado);
					for ($i=1; $i <= $numFilas; $i++) {
						$registro = mysqli_fetch_row($resultado); 
						echo "<option value='",$registro[0],"'>",$registro[1],"</option>";
					}				
					echo "</select><br><br>";
				?>
			Proyecto a evaluar: <select name="idProyecto">
				<?php
					$objProyecto = new Proyecto();
					$resultado = $objProyecto->obtenerProyectos();
					$numFilas = mysqli_num_rows($resultado);
					for ($i=1; $i <= $numFilas; $i++) {
						$registro = mysqli_fetch_row($resultado); 
						echo "<option value='",$registro[0],"'>",$registro[1],"</option>";
					}				
					echo "</select><br><br>";
				?>
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
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
	<title>Evaluadores | Vive Amazonas</title>
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
		<h1>Nuevo Evaluador</h1><br><br>
		<form onsubmit="return alerta();" action="eval-new.php" method="POST">
			Cargo del Evaluador: <input type="text" name="cargo"><br><br>
			Usuario del Evaluador: <select name="idUsuario">
				<?php
					$objUsuario = new Usuario();
					$resultado = $objUsuario->obtenerUsuarios();
					$numFilas = mysqli_num_rows($resultado);
					for ($i=1; $i <= $numFilas; $i++) {
						$registro = mysqli_fetch_row($resultado); 
						echo "<option value='",$registro[0],"'>",$registro[1],"</option>";
					}				
					echo "</select><br><br>";
				?>
			Nivel de evaluación: <input type="radio" name="nivelEvaluacion" value="1"> 1
								<input type="radio" name="nivelEvaluacion" value="2"> 2
								<input type="radio" name="nivelEvaluacion" value="3"> 3
								<input type="radio" name="nivelEvaluacion" value="4"> 4
			<br><br>
			Permiso de modificación: <input type="radio" name="permisoModificacion" value="0"> 0
									<input type="radio" name="permisoModificacion" value="1"> 1
			<br><br>
			Concurso Asignado: <select name="idConcurso">
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
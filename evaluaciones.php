<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
		<h1>Relación de Evaluaciones</h1><br><br>
		<form action="evaluaciones.php" method="POST">
			<fieldset>
				<legend><b>Datos de la Búsqueda</b></legend><br>
				<label>Id del Concurso: </label>
				<input type="text" name="idConcurso">
				<input type="submit" class="btn" name="buscar" value="Buscar"><label>   </label>
				<input type="submit" class="btn" name="todos" value="Ver todos"><br><br>
			</fieldset>
			<br><br>
			<?php
				if (!isset($_POST["buscar"]) or isset($_POST["todos"])) {
					$objEvaluaciones = new Evaluaciones();
					$resultado = $objEvaluaciones->obtenerEvaluaciones();
					$numFilas = mysqli_num_rows($resultado);
				}
				else {
					$idConcurso = $_POST["idConcurso"];
					$objEvaluaciones = new Evaluaciones();
					$resultado = $objEvaluaciones->obtenerEvaluacionesxIdConcurso($idConcurso);
					$numFilas = mysqli_num_rows($resultado);
				}

				if ($numFilas==0) {
					echo "No existen Evaluaciones registradas <br>";
				}
				else{
					echo "<table>";
					echo "	<tr>";
					echo "		<th>Código Evaluación</th>";
					echo "		<th>Expedientes</th>";
					echo "		<th>Elegilibilidad</th>";
					echo "		<th>Calificación</th>";
					echo "		<th>Fecha de Calificación</th>";
					echo "		<th>Estado</th>";
					echo "		<th>Código Concurso</th>";
					echo "		<th>Código Proyecto</th>";
					echo "		<th>Opciones</th>";
					echo "	</tr>";
					
					for ($i=1; $i <= $numFilas; $i++) { 
						$registro = mysqli_fetch_row($resultado);
						echo "	<tr>";
						echo "		<td>",$registro[0],"</td>";
						echo "		<td>",$registro[1],"</td>";
						echo "		<td>",$registro[3],"</td>";
						echo "		<td>",$registro[5],"</td>";
						echo "		<td>",$registro[7],"</td>";
						echo "		<td>",$registro[8],"</td>";
						echo "		<td>",$registro[9],"</td>";
						echo "		<td>",$registro[10],"</td>";
						echo "		<td><a href='evaluacion-editar.php?idEvaluacion=$registro[0]'><i class='far fa-edit'></i></a> <a href='evaluacion-eliminar.php?idEvaluacion=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";
						echo "	</tr>";
					}
					echo "</table>";
				}
			?>
			<br><br>
		</form>
		<form action="evaluacion-nuevo.php" class="centro" method="POST">
			<input type="submit" class="btn" value="Nuevo">
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
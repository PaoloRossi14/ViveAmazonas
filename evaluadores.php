<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
		<h1>Relación de Evaluadores</h1><br><br>
		<form action="evaluadores.php" method="POST">
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
					$objEvaluadores = new Evaluadores();
					$resultado = $objEvaluadores->obtenerEvaluadores();
					$numFilas = mysqli_num_rows($resultado);
				}
				else {
					$idConcurso = $_POST["idConcurso"];
					$objEvaluadores = new Evaluadores();
					$resultado = $objEvaluadores->obtenerEvaluadoresxIdConcurso($idConcurso);
					$numFilas = mysqli_num_rows($resultado);
				}

				if ($numFilas==0) {
					echo "No existen Evaluadores registrados <br>";
				}
				else{
					echo "<table>";
					echo "	<tr>";
					echo "		<th>Código Evaluador</th>";
					echo "		<th>Cargo</th>";
					echo "		<th>Nivel de Evaluación</th>";
					echo "		<th>Permiso de Modificación</th>";
					echo "		<th>Código Concurso</th>";
					echo "		<th>Código Usuario</th>";
					echo "		<th>Opciones</th>";
					echo "	</tr>";
					
					for ($i=1; $i <= $numFilas; $i++) { 
						$registro = mysqli_fetch_row($resultado);
						echo "	<tr>";
						echo "		<td>",$registro[0],"</td>";
						echo "		<td>",$registro[1],"</td>";
						echo "		<td>",$registro[2],"</td>";
						echo "		<td>",$registro[3],"</td>";
						echo "		<td>",$registro[4],"</td>";
						echo "		<td>",$registro[5],"</td>";
						echo "		<td><a href='eval-editar.php?idEvaluador=$registro[0]'><i class='far fa-edit'></i></a> <a href='eval-eliminar.php?idEvaluador=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";
						echo "	</tr>";
					}
					echo "</table>";
				}
			?>
			<br><br>
		</form>
		<form action="eval-nuevo.php" class="centro" method="POST">
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
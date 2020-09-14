<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Consultas | Vive Amazonas</title>
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
		<h1>Relación de Consultas</h1><br><br>
		<form action="consultas.php" method="POST">
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
					$objConsulta = new Consulta();
					$resultado = $objConsulta->obtenerConsultas();
					$numFilas = mysqli_num_rows($resultado);
				}
				else {
					$idConcurso = $_POST["idConcurso"];
					$objConsulta = new Consulta();
					$resultado = $objConsulta->obtenerConsultasxIdConcurso($idConcurso);
					$numFilas = mysqli_num_rows($resultado);
				}

				if ($numFilas==0) {
					echo "No existen consultas registradas <br>";
				}
				else{
					echo "<table>";
					echo "	<tr>";
					echo "		<th>Código Consulta</th>";
					echo "		<th>Código Concurso</th>";
					echo "		<th>Código Proponente</th>";
					echo "		<th>Consulta</th>";
					echo "		<th>Fecha Consulta</th>";
					echo "		<th>Estado</th>";
					echo "		<th>Respuesta</th>";
					echo "		<th>Fecha Respuesta</th>";
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
						echo "		<td>",$registro[6],"</td>";
						echo "		<td>",$registro[7],"</td>";
						echo "		<td><a href='cons-editar.php?idConsulta=$registro[0]'><i class='far fa-edit'></i></a> <a href='cons-eliminar.php?idConsulta=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";
						echo "	</tr>";
					}
					echo "</table>";
				}
			?>
			<br><br>
		</form>
		<form>
			<input type="submit" class = "btn" value="Publicar">
		</form>
	</div>
	<footer>
		Copyright © ViveAmazonas 2020
	</footer>
	<?php
	}
	?>
	</main>
</body>
</html>
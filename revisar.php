<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Evaluación | Vive Amazonas</title>
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
		<h1>Relación de Proyectos</h1><br><br>
		<form action="revisar.php" method="POST">
			<fieldset>
				<legend><b>Datos de la Búsqueda</b></legend><br>
				<label>Id del Proyecto: </label>
				<input type="text" name="idProyecto">
				<input type="submit" class="btn" name="buscar" value="Buscar"><label>   </label>
				<input type="submit" class="btn" name="todos" value="Ver todos"><br><br>
			</fieldset>
			<br><br>
			<?php
				if (!isset($_POST["buscar"]) or isset($_POST["todos"])) {
					$idUsuario = $_SESSION["idUsuario"];
					$objProyecto = new Proyecto();
					$resultado = $objProyecto-> obtenerProyectosRevisar($idUsuario);
					$numFilas = mysqli_num_rows($resultado);
				}
				else {
					$idProyecto = $_POST["idProyecto"];
					$idUsuario = $_SESSION["idUsuario"];
					$objProyecto = new Proyecto();
					$resultado = $objProyecto-> obtenerProyectosRevisarxIdProyecto($idUsuario,$idProyecto);
					$numFilas = mysqli_num_rows($resultado);
				}
				if ($numFilas == 0) {
					echo "No tiene proyectos por revisar.<br>";
				}
				else {
					echo "<table>";
					echo "	<tr>";
					echo "		<th>Código Proyecto</th>";
					echo "		<th>Nombre Proyecto</th>";
					echo "		<th>Empresa Proponente</th>";
					echo "		<th>RUC</th>";
					echo "		<th>Estatus del Proyecto</th>";
					echo "		<th>Presupuesto</th>";
					echo "		<th>Estado Documentación</th>";
					echo "		<th>Tipo Proyecto</th>";
					echo "		<th>Expediente</th>";
					echo "		<th>Calificar</th>";
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
						$documento = substr($registro[8],25);
						echo "		<td><a href='mostrarBases.php?documento=$documento'><i class='far fa-file-alt'></a></td>";
						echo "		<td><a href='calificar.php?idProyecto=$registro[0]'><i class='fas fa-pencil-alt'></a></td>";
						echo "	</tr>";
					}
					echo "</table>";
				}	
			?>
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
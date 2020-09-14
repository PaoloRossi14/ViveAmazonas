<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Mi Proyecto | Vive Amazonas</title>
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
		<h1>Información sobre mi Proyecto</h1><br><br>
		<?php
			$idUsuario = $_SESSION["idUsuario"];
			$objProyecto = new Proyecto();
			$resultado = $objProyecto->obtenerProyectoxIdUsuario($idUsuario);
			$numFilas = mysqli_num_rows($resultado);
			$registro = mysqli_fetch_row($resultado);

			if ($numFilas == 0) {
				echo "No existen proyectos registrados con tu usuario<br>";
			}
			else {
				echo "<h3>Bienvenido(a): ",$registro[1],"! </h3>";
				echo "Aquí encontrarás todo lo relacionado a tu proceso de postulación.<br><br>";
				echo "<table>";
				echo "	<tr>";
				echo "		<th>Código Proyecto</th>";
				echo "		<th>Nombre Proyecto</th>";
				echo "		<th>Código Concurso</th>";
				echo "		<th>Estatus del Proyecto</th>";
				echo "		<th>Presupuesto</th>";
				echo "		<th>Estado Documentación</th>";
				echo "		<th>Reunión Programada</th>";
				echo "		<th>Tipo Proyecto</th>";
				echo "	</tr>";

				for ($i=1; $i <= $numFilas; $i++) { 	
					echo "	<tr>";
					echo "		<td>",$registro[2],"</td>";
					echo "		<td>",$registro[3],"</td>";
					echo "		<td>",$registro[4],"</td>";
					echo "		<td>",$registro[5],"</td>";
					echo "		<td>",$registro[6],"</td>";
					echo "		<td>",$registro[7],"</td>";
					echo "		<td>",$registro[8],"</td>";
					echo "		<td>",$registro[9],"</td>";
					echo "	</tr>";
				}
				echo "</table><br><br>";

				if ($registro[5]=='Ganador') {
					echo "<form action='reunionNegociacion.php' method='POST'>";
					echo "<div class='centro'>";
					echo "<input type='submit' class='btn' value='Agendar'>";
					echo "</div>";
					echo "</form><br>";
				}
			}
		?>
		
		<div class="container">
			<div class="twoColumns">
				<div class="column light">
					<form action="subirDocumentacion.php" method="POST" enctype="multipart/form-data">
						<h3>Carga tu documentación aquí:</h3><br>
						<input type="file" value="Enviar" name="archivo" accept="application/pdf"><br><br><br>
						Ten en cuenta que solo podrás subir archivos en fomato pdf y con un peso no mayor a 500 kb<br><br>
						<input type="submit" class="btn" value="Enviar">
					</form>
				</div>
				<div class="column dark">
					<?php
					echo "<div class='bases'>";
					$idUsuario = $_SESSION["idUsuario"];
					$objProyecto = new Proyecto();
					$resultado = $objProyecto->obtenerProyectoxIdUsuario($idUsuario);
					$registro = mysqli_fetch_row($resultado);
					$idConcurso = $registro[4];
					echo "<h3>Consulta las bases del concurso aquí:</h3><br>";
					echo "<img src='images/documents.svg'><br><br><br>";
					echo "<div class='centro btn'>";
					echo "<a href='mostrarBases.php?documento=docs/bases/$idConcurso/BasesC$idConcurso.pdf'>Ver Bases</a>";
					echo "</div>";
					echo "</div>";
					?>
				</div>
			</div>
		</div>

	</div>
	<footer>
		Copyright © ViveAmazonas 2020
	</footer>
	<?php
	}
	?>
</body>
</html>
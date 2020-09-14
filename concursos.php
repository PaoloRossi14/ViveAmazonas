<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Concursos | Vive Amazonas</title>
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
		<h1>Relación de Concursos</h1><br><br>
		<form action="conc-nuevo.php" method="POST">
			<?php
				$objConcurso = new Concurso();
				$resultado = $objConcurso->obtenerConcursos();
				$numFilas = mysqli_num_rows($resultado);

				if ($numFilas==0) {
					echo "No existen Concursos registrados <br>";
				}
				else{
					echo "<table>";
					echo "	<tr>";
					echo "		<th>Código Concurso</th>";
					echo "		<th>Nombre Concurso</th>";
					echo "		<th>Fecha Inicio</th>";
					echo "		<th>Fecha Fin</th>";
					echo "		<th>Estado</th>";
					echo "		<th>Bases</th>";
					echo "		<th>Opciones</th>";
					echo "	</tr>";
					
					for ($i=1; $i <= $numFilas; $i++) { 
						$registro = mysqli_fetch_row($resultado);
						echo "	<tr>";
						echo "		<td>",$registro[0],"</td>";
						echo "		<td>",$registro[1],"</td>";
						echo "		<td>",$registro[3],"</td>";
						echo "		<td>",$registro[4],"</td>";
						echo "		<td>",$registro[6],"</td>";
						$dirBase = substr($registro[5],25);
						echo "		<td> <a href='mostrarBases.php?documento=$dirBase'>Ver bases</a></td>";
						echo "		<td><a href='conc-editar.php?idConcurso=$registro[0]'><i class='far fa-edit'></i></a> <a href='conc-eliminar.php?idConcurso=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";
						echo "	</tr>";
					}
					echo "</table>";
				}
			?>
			<br><br>
			<div class="centro">
				<input type="submit" class="btn" Value="Nuevo">
			</div>
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
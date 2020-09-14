<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Proponentes | Vive Amazonas</title>
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
		<h1>Relación de Proponentes</h1><br><br>
		<form action="prop-nuevo.php" method="POST">
			<?php
			$objProponente = new Proponente();
			$resultado = $objProponente->obtenerProponentes();
			$numFilas = mysqli_num_rows($resultado);

			if ($numFilas==0) {
				echo "No existen Proponentes registrados <br>";
			}
			else {
				echo "<table>";
					echo "	<tr>";
					echo "		<th>Código Proponente</th>";
					echo "		<th>Nombre Empresa</th>";
					echo "		<th>RUC</th>";
					echo "		<th>Correo electrónico</th>";
					echo "		<th>Teléfono</th>";
					echo "		<th>Solicitante</th>";
					echo "		<th>Fecha Creación</th>";
					echo "		<th>Id Usuario</th>";
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
						echo "		<td><a href='prop-editar.php?idProponente=$registro[0]'><i class='far fa-edit'></i></a> <a href='prop-eliminar.php?idProponente=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";
						echo "	</tr>";
					}
					echo "</table>";
			}
			?>
			<br><br>
			<div class="centro">
				<input type="submit" class="btn" value="Nuevo">
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
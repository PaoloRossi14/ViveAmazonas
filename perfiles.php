<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Perfiles | Vive Amazonas</title>
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
		<h1>Relación de Perfiles</h1><br><br>
		<form action="per-nuevo.php" method="POST">
			<?php
				$objPerfil = new Perfil();
				$resultado = $objPerfil->obtenerPerfiles();
				$numFilas = mysqli_num_rows($resultado);

				if ($numFilas==0) {
					echo "No existen Perfiles registrados <br>";
				}
				else{
					echo "<table>";
					echo "	<tr>";
					echo "		<th>Id del Perfil</th>";
					echo "		<th>Nombre del Perfil</th>";
					echo "		<th>Estado</th>";
					echo "		<th>Opciones</th>";
					echo "	</tr>";
					
					for ($i=1; $i <= $numFilas; $i++) { 
						$registro = mysqli_fetch_row($resultado);
						echo "	<tr>";
						echo "		<td>",$registro[0],"</td>";
						echo "		<td>",$registro[1],"</td>";
						echo "		<td>",$registro[2],"</td>";
						echo "		<td><a href='per-editar.php?idPerfil=$registro[0]'><i class='far fa-edit'></i></a> <a href='per-eliminar.php?idPerfil=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";
						echo "	</tr>";
					}
					echo "</table><br><br>";
				}
			?>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Usuarios | Vive Amazonas</title>
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
		<h1>Relación de Usuarios</h1><br>
		<form action="usuarios.php" method="POST">
			<fieldset>
				<legend><b>Datos de la Búsqueda</b></legend><br>
				<label>Nickname: </label>
				<input type="text" name="nickname">
				<input type="submit" class="btn" name="buscar" value="Buscar"><label>   </label>
				<input type="submit" class="btn" name="todos" value="Ver todos"><br><br>
			</fieldset>
			<?php
				if (!isset($_POST["buscar"]) or isset($_POST["todos"])) {
					$objUsuario = new Usuario();
					$resultado = $objUsuario->obtenerUsuarios();
					$numFilas = mysqli_num_rows($resultado);
				}
				else {
					$nickname = $_POST["nickname"];
					$objUsuario = new Usuario();
					$resultado = $objUsuario->obtenerUsuarioxNick($nickname);
					$numFilas = mysqli_num_rows($resultado);
				}
				if ($numFilas == 0) {
					echo "<br>No exiten usuarios registrados<br><br>";
				}
				else {
					echo "<br>";
					echo "<table>";
					echo "	<tr>";
					echo "		<th>Id</th>";
					echo "		<th>Nickname</th>";
					echo "		<th>Password</th>";
					echo "		<th>Estado</th>";
					echo "		<th>Fecha de Creación</th>";					
					echo "		<th>Acción</th>";
					echo "		<th>Perfiles</th>";					
					echo "	</tr>";
					for ($i=1; $i <= $numFilas; $i++) { 
						$registro = mysqli_fetch_row($resultado);
						echo "	<tr>";
						echo "		<td>",$registro[0],"</td>";
						echo "		<td>",$registro[1],"</td>";
						echo "		<td>",$registro[2],"</td>";
						echo "		<td>",$registro[3],"</td>";
						echo "		<td>",$registro[4],"</td>";
						echo "		<td><a href='usr-editar.php?id=$registro[0]'><i class='far fa-edit'></i></a><a href='usr-eliminar.php?id=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";
						echo "		<td><a href='usr-asignarPerfil.php?id=$registro[0]'><i class='fas fa-user-plus'></i></a></td>";						
						echo "	</tr>";	
					}
					echo "</table>";
					echo "<br><br>";
				}
			?>
		</form>
		<form action="usr-nuevo.php" method="POST" class="centro">
			<input type="submit" class="btn " value="Nuevo">
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

<!--
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
	<script src="script.js"></script>
-->
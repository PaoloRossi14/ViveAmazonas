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
		<h1>Nuevo Proponente</h1><br><br>
		<form onsubmit="return alerta();" action="prop-new.php" method="POST">
			Nombre de la Empresa: <input type="text" name="empresa"><br><br>
			RUC: <input type="text" name="RUC"><br><br>
			Correo electrónico: <input type="text" name="correo"><br><br>
			Teléfono: <input type="text" name="telefono"><br><br>
			Solicitante: <input type="text" name="solicitante"><br><br>
			<?php
			$today = date('Y-m-d');
			echo "Fecha de Creación: <input type='text' name='fechaCreacion' value='",$today,"' readonly><br><br>";
			echo "Usuario: <select name='idUsuario'>";
			$objUsuario = new Usuario();
			$resultado = $objUsuario->obtenerUsuarios();
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
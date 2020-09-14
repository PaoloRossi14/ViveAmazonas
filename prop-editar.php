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
		<h1>Modificación de la información del Proponente</h1><br><br>
		<?php
			$idProponente = $_GET["idProponente"];
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "select * from proponentes where idProponente='$idProponente';";
			$resultado = mysqli_query($enlace,$sentencia);
			$fila = mysqli_fetch_row($resultado);
			echo "<form onsubmit='return alerta();' action='prop-edit.php' method='POST'>";
			echo "Id del Proponente: <input type='text' name='idProponente' value='$fila[0]' readonly><br><br>";
			echo "Nombre Empresa: <input type='text' name='empresa' value='$fila[1]'><br><br>";
			echo "RUC: <input type='text' name='RUC' value='$fila[2]'><br><br>";
			echo "Correo electrónico: <input type='text' name='correo' value='$fila[3]'><br><br>";
			echo "Teléfono: <input type='text' name='telefono' value='$fila[4]'><br><br>";
			echo "Solicitante: <input type='text' name='solicitante' value='$fila[5]'><br><br>";
			echo "Fecha Creación: <input type='text' name='fechaCreacion' value='$fila[6]' readonly><br><br>";
			echo "Usuario: <select name='idUsuario'>";
			$objUsuario = new Usuario();
			$resultado = $objUsuario->obtenerUsuarios();
			$numFilas = mysqli_num_rows($resultado);
			for ($i=1; $i <= $numFilas; $i++) {
				$registro = mysqli_fetch_row($resultado);
				if ($registro[0]==$fila[7]) {
					echo "<option selected value='",$registro[0],"'>",$registro[1],"</option>";
				}
				else {
					echo "<option value='",$registro[0],"'>",$registro[1],"</option>";
				}
			}				
			echo "</select><br><br>";
			echo "<input type='submit' class='btn' value='Guardar'>";
			echo "</form>";
		?>
	</div>
	<footer>
		Copyright © ViveAmazonas 2020
	</footer>
	<?php
	}
	?>
</body>
</html>
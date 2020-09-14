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
		<h1>Modificación de la información del Concurso</h1><br><br>
		<?php
			$idConcurso = $_GET["idConcurso"];
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "select * from concursos where idConcurso='$idConcurso';";
			$resultado = mysqli_query($enlace,$sentencia);
			$fila = mysqli_fetch_row($resultado);

			echo "<form onsubmit='return alerta();' action='conc-edit.php' method='POST'>";
			echo "Id del Concurso: <input type='text' name='idConcurso' value='$fila[0]' readonly><br><br>";
			echo "Nombre del Concurso: <input type='text' name='nombreConcurso' value='$fila[1]'><br><br>";
			echo "Fecha de Inicio: <input type='text' name='fechaInicio' value='$fila[3]'><br><br>";
			echo "	Fecha de Finalización: <input type='text' name='fechaFin' value='$fila[4]'><br><br>";
			echo "	Estado: ";
			if ($fila[5]=='A') {
				echo "<input name='estado' type='radio' value='A' checked> Activo";
				echo "<input name='estado' type='radio' value='I'> Inactivo";
			}
			else {
				echo "<input name='estado' type='radio' value='A'>Activo";
				echo "<input name='estado' type='radio' value='I' checked>Inactivo";
			}
			echo "<br><br>";
			echo "Fecha de Creación: <input type='text' name='fechaCreacion' value='$fila[2]' readonly><br><br>";
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
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
		<h1>Modificación de la información del Proyecto</h1><br><br>
		<?php
			$idProyecto = $_GET["idProyecto"];
			$objProyecto = new Proyecto();
			$resultado = $objProyecto->obtenerProyectosxid($idProyecto);
			$fila = mysqli_fetch_row($resultado);
			echo "<form onsubmit='return alerta();' action='proy-edit.php' method='POST'>";
			echo "Código Proyecto: <input type='text' name='idProyecto' value='$fila[0]' readonly><br><br>";
			echo "Nombre Proyecto: <input type='text' name='nombreProyecto' value='$fila[1]'><br><br>";

			echo "Concurso: ";
			echo "<select name='idConcurso'>";
			$objConcurso = new Concurso();
			$resultado = $objConcurso->obtenerConcursos();
			$numFilas = mysqli_num_rows($resultado);
			for ($i=1; $i <= $numFilas; $i++) {
				$registro = mysqli_fetch_row($resultado);
				if ($registro[0]==$fila[2]) {
					echo "<option selected value='",$registro[0],"'>",$registro[1],"</option>";
				}
				else {
					echo "<option value='",$registro[0],"'>",$registro[1],"</option>";
				} 
			}				
			echo "</select><br><br>";

			echo "Id Proponente: <input type='text' name='idProponente' value='$fila[3]'><br><br>";
			echo "Estatus del Proyecto: <input type='text' name='estatus' value='$fila[4]' readonly><br><br>";
			echo "Presupuesto: <input type='text' name='presupuesto' value='$fila[5]'><br><br>";
			echo "Estado Documentación: ";
			if ($fila[6]=='Completa') {
				echo "<input name='documentacion' type='radio' value='Completa' checked>Completa";
				echo "<input name='documentacion' type='radio' value='Incompleta'>Incompleta";
			}
			else {
				echo "<input name='documentacion' type='radio' value='Completa'>Completa";
				echo "<input name='documentacion' type='radio' value='Incompleta' checked>Incompleta";
			}
			echo "	<br><br>";
			echo "	Reunión Programada: <input type='text' name='reunion' value='$fila[7]'><br><br>";
			echo "	Tipo Proyecto: <input type='text' name='tipo' value='$fila[8]'><br><br>";		
			echo "	<input type='submit' class='btn' value='Guardar'>";
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
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
	<title>Evaluadores | Vive Amazonas</title>
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
		<h1>Modificación de la información del Evaluador</h1><br><br>
		<?php
			$idEvaluador = $_GET["idEvaluador"];
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "select * from evaluadores where idEvaluador='$idEvaluador';";
			$resultado = mysqli_query($enlace,$sentencia);
			$fila = mysqli_fetch_row($resultado);
			echo "<form onsubmit='return alerta();' action='eval-edit.php' method='POST'>";
			echo "Id del Evaluador: <input type='text' name='idEvaluador' value='$fila[0]' readonly><br><br>";
			echo "Cargo del Evaluador: <input type='text' name='cargo' value='$fila[1]'><br><br>";
			echo "Id de Usuario del Evaluador: <input type='text' name='idUsuario' value='$fila[5]' readonly><br><br>";
			echo "Nivel de Evaluación: ";
			if ($fila[2]=='1') {
				echo "<input name='nivelEvaluacion' type='radio' value='1' checked> 1";
				echo "<input name='nivelEvaluacion' type='radio' value='2'> 2";
				echo "<input name='nivelEvaluacion' type='radio' value='3'> 3";
				echo "<input name='nivelEvaluacion' type='radio' value='4'> 4";
			}
			else {
				if ($fila[2]=='2') {
					echo "<input name='nivelEvaluacion' type='radio' value='1'> 1";
					echo "<input name='nivelEvaluacion' type='radio' value='2' checked> 2";
					echo "<input name='nivelEvaluacion' type='radio' value='3'> 3";
					echo "<input name='nivelEvaluacion' type='radio' value='4'> 4";
				}
				else {
					if ($fila[2]=='3') {
						echo "<input name='nivelEvaluacion' type='radio' value='1'> 1";
						echo "<input name='nivelEvaluacion' type='radio' value='2'> 2";
						echo "<input name='nivelEvaluacion' type='radio' value='3' checked> 3";
						echo "<input name='nivelEvaluacion' type='radio' value='4'> 4";
					}
					else {
						echo "<input name='nivelEvaluacion' type='radio' value='1'> 1";
						echo "<input name='nivelEvaluacion' type='radio' value='2'> 2";
						echo "<input name='nivelEvaluacion' type='radio' value='3'> 3";
						echo "<input name='nivelEvaluacion' type='radio' value='4' checked> 4";
					}
				}
			}
			echo "<br><br>";
			echo "Permiso de modificación: ";
			if ($fila[3]=='0') {
				echo "<input name='permisoModificacion' type='radio' value='0' checked> 0";
				echo "<input name='permisoModificacion' type='radio' value='1'> 1";
			}
			else {
				echo "<input name='permisoModificacion' type='radio' value='0'> 0";
				echo "<input name='permisoModificacion' type='radio' value='1' checked> 1";
			}
			echo "<br><br>";
			echo "Concurso asignado: ";
				$objConcurso = new Concurso();
				$resultado = $objConcurso->obtenerConcursos();
				$numFilas = mysqli_num_rows($resultado);
				for ($i=1; $i <= $numFilas; $i++) {
					$registro = mysqli_fetch_row($resultado);
					if ($registro[0]==$fila[4]) {
					 	echo "<input name='idConcurso' type='radio' value='",$registro[0],"' checked>",$registro[1],"     ";
					}
					else {
						echo "<input name='idConcurso' type='radio' value='",$registro[0],"'>",$registro[1],"     ";
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
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
	<title>Evaluaciones | Vive Amazonas</title>
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
		<h1>Modificación de la información de la Evaluación</h1><br><br>
		<?php
			$idEvaluacion = $_GET["idEvaluacion"];
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "select * from evaluaciones where idEvaluacion='$idEvaluacion';";
			$resultado = mysqli_query($enlace,$sentencia);
			$fila = mysqli_fetch_row($resultado);
			echo "<form onsubmit='return alerta();' action='evaluacion-edit.php' method='POST'>";
			echo "Id de la Evaluación: <input type='text' name='idEvaluacion' value='$fila[0]' readonly><br><br>";
			echo "Expedientes: <input type='text' name='expedientes' value='$fila[1]'><br><br>";
			echo "Id Evaluador DIGE: <input type='text' name='idEvalDige' value='$fila[2]'><br><br>";
			echo "Elegibilidad: <input type='text' name='elegibilidad' value='$fila[3]'><br><br>";
			echo "Id Evaluador CTI: <input type='text' name='idEvalCti' value='$fila[4]'><br><br>";
			echo "Calificación: <input type='text' name='calificacion' value='$fila[5]'><br><br>";
			echo "Id Evaluador CTE: <input type='text' name='idEvalCte' value='$fila[6]'><br><br>";
			echo "Fecha Calificación Final: <input type='text' name='fechaCalificacionFinal' value='$fila[7]' readonly><br><br>";
			echo "Estado: ";
			if ($fila[8]=='0') {
				echo "<input name='estado' type='radio' value='0' checked> En calificación";
				echo "<input name='estado' type='radio' value='1'> Calificación Terminada";
			}
			else {
				echo "<input name='estado' type='radio' value='0'> En calificación";
				echo "<input name='estado' type='radio' value='1' checked> Calificación Terminada";
			}
			echo "<br><br>";
			echo "Id Concurso: <input type='text' name='idConcurso' value='$fila[9]' readonly><br><br>";
			echo "Id Proyecto: <input type='text' name='idProyecto' value='$fila[10]' readonly><br><br>";
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
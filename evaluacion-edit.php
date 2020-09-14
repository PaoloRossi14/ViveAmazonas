<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$idEvaluacion = $_POST["idEvaluacion"];
		$expedientes = $_POST["expedientes"];
		$idEvalDige = $_POST["idEvalDige"];
		$elegibilidad = $_POST["elegibilidad"];
		$idEvalCti = $_POST["idEvalCti"];
		$calificacion = $_POST["calificacion"];
		$idEvalCte = $_POST["idEvalCte"];
		$fechaCalificacionFinal = date('Y-m-d');
		$estado = $_POST["estado"];
		$idConcurso = $_POST["idConcurso"];
		$idProyecto = $_POST["idProyecto"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "UPDATE evaluaciones SET
						idEvaluacion='$idEvaluacion',
						expedientes='$expedientes',
						idEvalDige='$idEvalDige',
						elegibilidad='$elegibilidad',
						idEvalCti='$idEvalCti',
						calificacion='$calificacion',
						idEvalCte='$idEvalCte',
						fechaCalificacionFinal='$fechaCalificacionFinal',
						estado='$estado',
						idConcurso='$idConcurso',
						idProyecto='$idProyecto'
						WHERE idEvaluacion='$idEvaluacion';";
		mysqli_query($enlace,$sentencia);

		if ($estado == 1) {
			$sentencia2 = "UPDATE proyectos SET estado='Calificado' WHERE idProyecto='$idProyecto';";
			mysqli_query($enlace,$sentencia2);
		}

		header("Location: evaluaciones.php");
	?>
</body>
</html>
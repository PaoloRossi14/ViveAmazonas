<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$nombreConcurso = $_POST["nombreConcurso"];
		$fechaInicio = $_POST["fechaInicio"];
		$fechaFin = $_POST["fechaFin"];
		$estado = $_POST["estado"];
		$fechaCreacion = $_POST["fechaCreacion"];
		$idUsuarioCreacion = $_POST["idUsuarioCreacion"];

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "SELECT idConcurso FROM concursos;";
		$resultado = mysqli_query($enlace,$sentencia);
		$numFilas = mysqli_num_rows($resultado);
		$id = $numFilas + 1;

		$ruta = getcwd().'/docs/bases/'.$id.'/';
		$archivo = $ruta.$_FILES["bases"]["name"];

		if (!file_exists($ruta)) {
			mkdir($ruta,0777,true);
		}
		$resultado = move_uploaded_file($_FILES["bases"]["tmp_name"], $archivo);

		$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
		$sentencia = "INSERT INTO concursos VALUES ('$id','$nombreConcurso','$fechaCreacion','$fechaInicio','$fechaFin','$archivo','$estado',' ');";
		mysqli_query($enlace,$sentencia);
		header("Location: concursos.php");
	?>
</body>
</html>
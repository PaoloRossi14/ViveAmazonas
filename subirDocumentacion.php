<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	session_start();
	$idUsuario = $_SESSION["idUsuario"];
	if ($_FILES["archivo"]["error"]>0) {
		echo "Ocurrió un error al cargar el archivo";
	}
	else {
		$permitidos = array("application/pdf");
		$kbMax = 500;
		if (in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $kbMax*1024) {

			$ruta = getcwd().'/docs/documentacion/'.$idUsuario.'/';
			$archivo = $ruta.$_FILES["archivo"]["name"];

			if (!file_exists($ruta)) {
				mkdir($ruta,0777,true);
			}

			if (!file_exists($archivo)) {
				$resultado = move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
				if ($resultado) {
					echo "Archivo Guardado";
					$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
					$sentencia = "SELECT y.idProyecto FROM proponentes p, proyectos y WHERE p.idUsuario='$idUsuario' AND p.idProponente=y.idProponente;";
					$resultado= mysqli_query($enlace,$sentencia);
					$registro = mysqli_fetch_row($resultado);
					$idProyecto = $registro[0];
					$sentencia2 = "UPDATE proyectos SET documentacion='Completa',archivo='$archivo' WHERE idProyecto='$idProyecto';";
					mysqli_query($enlace,$sentencia2);
					header("Location: miProyecto.php");
				}
				else {
					echo "Ocurrió un error al guardar!";
				}
			}
			else {
				echo "El archivo ya existe.";
			}
		}
		else {
			echo "Archivo no permitido o excede el tamaño máximo permitido";
		}

	}
	?>
</html>
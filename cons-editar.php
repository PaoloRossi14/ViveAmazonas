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
	<title>Consultas | Vive Amazonas</title>
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
		<h1>Edición de Consulta</h1><br><br>
		<?php
			$idConsulta = $_GET["idConsulta"];
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "select * from consultas where idConsulta='$idConsulta';";
			$resultado = mysqli_query($enlace,$sentencia);
			$fila = mysqli_fetch_row($resultado);

			echo "<form onsubmit='return alerta();' action='cons-edit.php' method='POST'>";
			echo "Código Consulta: <input type='text' name='idConsulta' value='$fila[0]' readonly><br><br>";
			echo "Código Concurso: <input type='text' name='idConcurso' value='$fila[1]' readonly><br><br>";
			echo "Código Proponente: <input type='text' name='idProponente' value='$fila[2]' readonly><br><br>";		
			echo "Consulta: <textarea name='consulta' rows='5' readonly>$fila[3]</textarea><br><br>";		
			echo "<p>$fila[3]</p><br><br>";
			echo "Fecha de Consulta: <input type='text' name='fechaConsulta' value='$fila[4]' readonly><br><br>";
			echo "Estado Consulta:  ";
			if ($fila[5]=='Respondido') {
				echo "<input name='estado' type='radio' value='Respondido' checked> Respondido ";
				echo "<input name='estado' type='radio' value='Sin responder'> Sin responder";
			}
			else {
				echo "<input name='estado' type='radio' value='Respondido'>Respondido";
				echo "<input name='estado' type='radio' value='Sin responder' checked>Sin responder";
			}
			echo "<br><br>";
			echo "Respuesta: <input type='text' name='respuesta' value='$fila[6]'><br><br>";
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
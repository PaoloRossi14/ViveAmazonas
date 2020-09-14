<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Perfiles | Vive Amazonas</title>
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
		<h1>Asignaciones de Perfiles</h1>
		<br><br>
		<?php
			$id = $_GET["id"];
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM usuario WHERE id = $id;";
			$resultado = mysqli_query($enlace,$sentencia);
			$fila = mysqli_fetch_row($resultado);
			
			echo "<form action='usr-asignaPerfil.php' method='POST'>";
			echo "Id: <input name='id' type='text' value='$fila[0]' readonly><br><br>";
			echo "Nickame: <input name='nickname' type='text' value='$fila[1]' readonly><br><br>";
			echo "Estado: <input name='estado' type='text' value='$fila[3]'><br><br>";
			echo "Perfil: <select name='perfil'>";
			
			$sentencia1 = "SELECT nombrePerfil FROM perfiles WHERE nombrePerfil NOT IN (SELECT p.nombrePerfil FROM usuario u, perfilxusuario pu, perfiles p WHERE u.id = '$id' AND u.id = pu.idUsuario AND p.idPerfil = pu.idPerfil);";
			$resultado1 = mysqli_query($enlace,$sentencia1);
			$numFilas = mysqli_num_rows($resultado1);

			for ($i=1; $i <= $numFilas; $i++) { 
				$registro = mysqli_fetch_row($resultado1);
				echo "<option value='",$registro[0],"'>",$registro[0],"</option>";
			}
			echo "</select>";
			echo "<br><br>";
			echo "<h4>Perfiles asignados:</h4><br>";
			echo "<ul>";

			$sentencia2 = "SELECT p.nombrePerfil FROM usuario u, perfilxusuario pu, perfiles p WHERE u.id = '$id' AND u.id = pu.idUsuario AND p.idPerfil = pu.idPerfil;";
			$resultado2 = mysqli_query($enlace,$sentencia2);
			$numFilas = mysqli_num_rows($resultado2);

			for ($i=1; $i <= $numFilas; $i++) { 
				$registro = mysqli_fetch_row($resultado2);
				echo "<li>",$registro[0],"</li>";
			}
			echo "</ul><br>";
			echo "<input type='submit' class = 'btn' value='Grabar'>";
			echo "</form><br>";
			echo "<form action='usuarios.php' method='POST'>";
			echo "<input type='submit' class = 'btn' name='cancelar' value='Cancelar'>";
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
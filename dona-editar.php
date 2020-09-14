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
    <title>Donatarios | Vive Amazonas</title>
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
		<h1>Modificación de la información del Donatario</h1><br>
        <?php
        $idDonatario = $_GET["idDonatario"];
        $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
        $sentencia = "SELECT * FROM donatarios WHERE idDonatario=$idDonatario;";
        $resultado = mysqli_query($enlace,$sentencia);
        $registro = mysqli_fetch_row($resultado);

        echo "<form onsubmit='return alerta();' action='dona-edit.php' method='POST'>";
        echo "Id Donatario: <input type='text' name='idDonatario' value ='$registro[0]' readonly><br><br>";
        echo "Capital Utilizado: <input type='text' name='capitalUtilizado' value ='$registro[1]'><br><br>";
        echo "Id Convenio: <input type='text' name='idConvenio' value='$registro[4]' readonly><br><br>";
        echo "<input type='submit' class='btn' Value='Guardar'>";
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
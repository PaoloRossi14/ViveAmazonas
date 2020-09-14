<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Convenios | Vive Amazonas</title>
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
		<h1>Relación de Convenios</h1><br>
        <?php
        $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
        $sentencia = "SELECT * FROM convenios;";
        $resultado = mysqli_query($enlace,$sentencia);
        $numFilas = mysqli_num_rows($resultado);
        
        if ($numFilas == 0) {
            echo "<br>No existen convenios registradas<br><br>";
        }
        else {
            echo "<table>";
            echo "	<tr>";
            echo "		<th>Id</th>";
            echo "		<th>Fuente Financiera</th>";
            echo "		<th>Vigencia</th>";
            echo "		<th>Monto</th>";
            echo "		<th>Id Concurso</th>";					
            echo "		<th>Id Negociación</th>";
            echo "		<th>Opciones</th>";					
            echo "	</tr>";
            for ($i=1; $i <= $numFilas; $i++) { 
                $registro = mysqli_fetch_row($resultado);
                echo "	<tr>";
                echo "		<td>",$registro[0],"</td>";
                echo "		<td>",$registro[1],"</td>";
                echo "		<td>",$registro[2],"</td>";
                echo "		<td>",$registro[3],"</td>";
                echo "		<td>",$registro[4],"</td>";
                echo "		<td>",$registro[5],"</td>";
                echo "		<td><a href='conve-editar.php?idConvenio=$registro[0]'><i class='far fa-edit'></i></a><a href='conve-eliminar.php?idConvenio=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";				
                echo "	</tr>";	
            }
            echo "</table>";
            echo "<br><br>";
        }
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
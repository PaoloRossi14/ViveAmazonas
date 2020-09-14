<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
		<h1>Relación de Donatarios</h1><br>
        <form action="dona-nuevo.php" method="POST">
            <?php
            $enlace = mysqli_connect("localhost","root","","ViveAmazonas");
            $sentencia = "SELECT * FROM donatarios;";
            $resultado = mysqli_query($enlace,$sentencia);
            $numFilas = mysqli_num_rows($resultado);
            
            if ($numFilas == 0) {
                echo "<br>No existen donatarios registrados<br><br>";
            }
            else {
                echo "<table>";
                echo "	<tr>";
                echo "		<th>Id</th>";
                echo "		<th>Capital Utilizado</th>";
                echo "		<th>Capital Restante</th>";
                echo "		<th>Fecha de Actualización</th>";
                echo "		<th>Id Convenio</th>";					
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
                    echo "		<td><a href='dona-editar.php?idDonatario=$registro[0]'><i class='far fa-edit'></i></a><a href='dona-eliminar.php?idDonatario=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";				
                    echo "	</tr>";	
                }
                echo "</table>";
                echo "<br><br>";
            }
            ?>
            <div class="centro">
				<input type="submit" class="btn" Value="Nuevo">
			</div>
        </form>
    </div>
	<footer>
		Copyright © ViveAmazonas 2020
	</footer>
	<?php
	}
	?>
</body>
</html>
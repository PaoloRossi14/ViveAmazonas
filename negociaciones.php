<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Negociaciones | Vive Amazonas</title>
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
		<h1>Relación de Negociaciones</h1><br>
        <form action="neg-nuevo.php" method="POST">
            <?php
            $objNegociaciones = new Negociaciones();
            $resultado = $objNegociaciones->obtenerNegociaciones();
            $numFilas = mysqli_num_rows($resultado);
            
            if ($numFilas == 0) {
                echo "<br>No existen negociaciones registradas<br><br>";
            }
            else {
                echo "<table>";
                echo "	<tr>";
                echo "		<th>Id</th>";
                echo "		<th>Fecha</th>";
                echo "		<th>Estado</th>";
                echo "		<th>Acta</th>";
                echo "		<th>Resultado</th>";					
                echo "		<th>Código Concurso</th>";
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
                    echo "		<td><a href='neg-editar.php?idNegociacion=$registro[0]'><i class='far fa-edit'></i></a><a href='neg-eliminar.php?idNegociacion=$registro[0]'><i class='far fa-trash-alt'></i></a></td>";				
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
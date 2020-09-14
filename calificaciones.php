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
    <title>Calificaciones | Vive Amazonas</title>
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
		<h1>Relación de Calificaciones</h1><br><br>
        <?php
        $idUsuario = $_SESSION["idUsuario"];
        $objProyecto = new Proyecto();
        $resultado = $objProyecto-> obtenerProyectosCalificados($idUsuario);
        $numFilas = mysqli_num_rows($resultado);

        $objEvaluador = new Evaluadores();
        $resultado2 = $objEvaluador-> obtenerIdConcurso($idUsuario);
        $fila = mysqli_fetch_row($resultado2);
        $idConcurso = $fila[0];

        $objConcurso = new Concurso();
        $resultado3 = $objConcurso-> obtenerConcursosxId($idConcurso);
        $fila2 = mysqli_fetch_row($resultado3);
        $ganador = $fila2[7];

        if ($numFilas==0) {
            echo "No existen Proyectos Calificados.";
        }
        else {
            if ($ganador==' ') {
                echo "<form onsubmit='return alerta();' action='elegirGanador.php' method='POST'>";
                echo "<table>";
                echo "	<tr>";
                echo "		<th>Código Proyecto</th>";
                echo "		<th>Nombre Proyecto</th>";
                echo "		<th>Empresa Proponente</th>";
                echo "		<th>RUC</th>";
                echo "		<th>Estatus del Proyecto</th>";
                echo "		<th>Presupuesto</th>";
                echo "		<th>Estado Documentación</th>";
                echo "		<th>Tipo Proyecto</th>";
                echo "		<th>Calificación</th>";
                echo "		<th>Expediente</th>";
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
                    echo "		<td>",$registro[6],"</td>";
                    echo "		<td>",$registro[7],"</td>";
                    echo "		<td>",$registro[9],"</td>";
                    $documento = substr($registro[8],25);
                    echo "		<td><a href='mostrarBases.php?documento=$documento'><i class='far fa-file-alt'></a></td>";
                    echo "	</tr>";
                }
                echo "</table><br><br>";
                echo "<div class='centro'>";
                echo "<input type='submit' class='btn' value='Calificar'>";
                echo "</div>";
                echo "</form>";
            }
            else {
                echo "Ya existe un ganador para este concurso.";
            }
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
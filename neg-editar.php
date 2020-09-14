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
		<h1>Modificación de la información de la Negociación</h1><br>
        <?php
        $idNegociacion = $_GET["idNegociacion"];
        $objNegociacion = new Negociaciones();
        $respuesta = $objNegociacion->obtenerNegociacionesxId($idNegociacion);
        $registro = mysqli_fetch_row($respuesta);

        echo "<form onsubmit='return alerta();' action='neg-edit.php' method='POST' enctype='multipart/form-data'>";
        echo "Id Negociacion: <input type='text' name='idNegociacion' value ='$registro[0]' readonly><br><br>";
        echo "Código de Concurso: <input type='text' name='idConcurso' value ='$registro[5]' readonly><br><br>";
        echo "Fecha de Negociación: <input type='text' name='fecha' value='$registro[1]'><br><br>";
        echo "Estado: ";
        if ($registro[2]=="Pendiente") {
            echo "<input name='estado' type='radio' value='Pendiente' checked>Pendiente";
            echo "<input name='estado' type='radio' value='Confirmado'>Confirmado";
            echo "<input name='estado'type='radio' value='Rechazado'>Rechazado";
            echo "<input name='estado' type='radio' value='Finalizado'>Finalizado<br><br>";
        }
        else {
            if ($registro[2]=="Confirmado") {
                echo "<input name='estado' type='radio' value='Pendiente'>Pendiente";
                echo "<input name='estado' type='radio' value='Confirmado' checked>Confirmado";
                echo "<input name='estado'type='radio' value='Rechazado'>Rechazado";
                echo "<input name='estado' type='radio' value='Finalizado'>Finalizado<br><br>";
            }
            else {
                if ($registro[2]=="Rechazado") {
                    echo "<input name='estado' type='radio' value='Pendiente'>Pendiente";
                    echo "<input name='estado' type='radio' value='Confirmado'>Confirmado";
                    echo "<input name='estado'type='radio' value='Rechazado' checked>Rechazado";
                    echo "<input name='estado' type='radio' value='Finalizado'>Finalizado<br><br>";
                }
                else {
                    echo "<input name='estado' type='radio' value='Pendiente'>Pendiente";
                    echo "<input name='estado' type='radio' value='Confirmado'>Confirmado";
                    echo "<input name='estado'type='radio' value='Rechazado'>Rechazado";
                    echo "<input name='estado' type='radio' value='Finalizado' checked>Finalizado<br><br>";
                }
            }
        }
        echo "Resultado: ";
        if ($registro[4]=="0") {
            echo "<input name='resultado' type='radio' value='0' checked>No Aceptó";
            echo "<input name='resultado' type='radio' value='1'>Aceptó<br><br>";
        }
        else {
            echo "<input name='resultado' type='radio' value='0'>No Aceptó";
            echo "<input name='resultado' type='radio' value='1' checked>Aceptó<br><br>";
        }
        $documento = substr($registro[3],25);
        echo "Acta: <a href='mostrarBases.php?documento=$documento'>documento.pdf</a><br><br>";
        echo "<input type='file' name='acta' accept='application/pdf'><br><br>";
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
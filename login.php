<html>
	<head>
	</head>
	
	<body>
		<?php
			session_start();
			$codUsuario = $_POST["codusr"];
			$passUsuario = $_POST["passusr"];
			if ($codUsuario=="" || $passUsuario=="") {
				echo "Usuario o contraseña incorrecto";
			}
			else {
				$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
				$sentencia = "select *  from usuario where nickname='$codUsuario' and password='$passUsuario';";
				$resultado = mysqli_query($enlace,$sentencia);
				$registro = mysqli_fetch_row($resultado);
				$numFilas = mysqli_num_rows($resultado);
				
				if ($numFilas==0){
					echo "<br><font color='red'>El usuario o la contraseña no existe</font>";
					session_destroy();
					header("Location:logeo.php");
				}
				else{
					$_SESSION["idUsuario"]=$registro[0];
					header("Location:principal.php");
				}				
			}
		?>
	</body>
</html>
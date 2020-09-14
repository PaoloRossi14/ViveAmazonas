<html>
<head>
	<meta charset="utf-8">
	<title>Login | ViveAmazonas</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="wallpaper">
		<div class="login-box">
			<img class="avatar" src="images/small-logo.svg">
			<h1>Ingrese aquí</h1>
			<form action="login.php" method="POST">
				<label for="codusr">Usuario</label>
				<input type="text" placeholder="Ingrese su usuario" name="codusr">

				<label for="passusr">Contraseña</label>
				<input type="password" placeholder="Ingrese su contraseña" name="passusr">

				<input type="submit" value="Ingresar">

				<a href="index.html#contact">Olvidaste tu contraseña?</a><br>
				<a href="index.html#contact">No tienes una cuenta?</a>
			</form>
		</div>
	</div>
</body>
</html>
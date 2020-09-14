<?php
	$idUsuario = $_SESSION["idUsuario"];
	$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
	$sentencia = "SELECT a.nombrePerfil FROM perfiles a, perfilxusuario b, usuario c WHERE c.id = '$idUsuario' AND c.id = b.idUsuario AND b.idPerfil = a.idPerfil";
	$resultado = mysqli_query($enlace,$sentencia);
?>
<header>
	<img src="images/small-logo.svg">
	<h1>Portal de Gestión de Proyectos</h1>
</header>
<nav class="menu">
	<!-- <button type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars ml-1"></i></button> -->
	<ul id="navbar">
		<?php 
		while ($row = $resultado->fetch_row()) {
			if ($row[0] == "Inicio") {
		?>	
		<li><a href="principal.php">Inicio</a></li>
		<?php
			}
			if ($row[0] == "Seguridad") {
		?>
		<li><a href="#">Seguridad<i class="fa fa-caret-down"></i></a>
			<ul>
				<li><a href='usuarios.php'>Gestión de Usuarios</a></li>
				<li><a href='perfiles.php'>Gestión de Perfiles</a></li>	
			</ul>
		</li>
		<?php		
			}
			if ($row[0] == "Modulos") {
		?>
		<li><a href="#">Módulos<i class="fa fa-caret-down"></i></a>
			<ul>
				<li><a href='concursos.php'>Concursos</a></li>		
				<li><a href='proyectos.php'>Proyectos</a></li>		
				<li><a href='proponentes.php'>Proponentes</a></li>	
				<li><a href='consultas.php'>Consultas</a></li>
				<li><a href='evaluadores.php'>Evaluadores</a></li>	
				<li><a href='evaluaciones.php'>Evaluaciones</a></li>					
				<li><a href='negociaciones.php'>Negociaciones</a></li>
				<li><a href='convenios.php'>Convenios</a></li>
				<li><a href='donatarios.php'>Donatarios</a></li>
			</ul>
		</li>
		<?php		
			}
			if ($row[0] == "Evaluacion") {
		?>
		<li><a href="#">Evaluación<i class="fa fa-caret-down"></i></a>
			<ul>
				<li><a href='revisar.php'>Revisar</a></li>
				<li><a href='calificaciones.php'>Calificaciones</a></li>		
			</ul>
		</li>
		<?php
			}
			if ($row[0] == "Gestion") {
		?>
		<li><a href="#">Mi Gestión<i class="fa fa-caret-down"></i></a>
			<ul>	
				<li><a href='miProyecto.php'>Proyecto</a></li>		
				<li><a href='reuniones.php'>Reuniones</a></li>			
			</ul>
		</li>
		<?php
			}
			if ($row[0] == "CanalConsultas") {
		?>
		<li><a href="canalConsultas.php">Canal de Consultas</a></li>
		<?php
			}
		}
		?>
		<li><a class="salir" href="logout.php">Salir del Sistema</a></li>
	</ul>
</nav>
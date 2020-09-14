<?php
	class Usuario {
		private $id;
		private $nickname;
		private $password;
		private $estado;

		public function __construct() {}

		public function asignarDatos() {
			$this->id = $id;
			$this->nickname = $nickname;
			$this->password = $password;
			$this->estado = $estado;
		}

		public function obtenerUsuarios() {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM usuario;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}

		public function obtenerUsuarioxNick ($userName) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM usuario WHERE nickname LIKE '$userName%';";
			$resultado = mysqli_query($enlace,$sentencia);
			mysqli_close($enlace);
			return $resultado;
		}

		public function asignarPerfil ($id, $perfil) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT idPerfil FROM perfiles WHERE nombrePerfil = '$perfil';";
			$resultado = mysqli_query($enlace,$sentencia);
			$fila = mysqli_fetch_row($resultado);
			$sentencia = "INSERT INTO perfilxusuario VALUES (NULL,$id,$fila[0]);";
			mysqli_query($enlace,$sentencia);
		}
	}
	class Perfil {
		private $idPerfil;
		private $nombrePerfil;
		private $estado;

		public function __construct() {}

		public function obtenerPerfiles() {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM perfiles;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
	}
	class Proyecto {
		private $idProyecto;
		private $nombreProyecto;
		private $idConcurso;
		private $idProponente;
		private $estado;
		private $presupuesto;
		private $documentacion;
		private $reunion;
		private $tipo;

		public function __construct() {}

		public function obtenerProyectos() {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM proyectos p, proponentes t, concursos c WHERE p.idProponente = t.idProponente AND p.idConcurso = c.idConcurso ORDER BY p.idProyecto;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
		public function obtenerProyectosxid($idProyecto) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM proyectos WHERE idProyecto = $idProyecto;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}

		public function obtenerProyectosxIdConcurso($idConcurso) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM proyectos p, proponentes t, concursos c WHERE p.idProponente = t.idProponente AND p.idConcurso = c.idConcurso AND p.idConcurso = $idConcurso;";
			$resultado = mysqli_query($enlace,$sentencia);
			mysqli_close($enlace);
			return $resultado;
		}

		public function obtenerProyectoxIdUsuario($idUsuario) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT p.idProponente, p.empresa, y.idProyecto, y.nombreProyecto, y.idConcurso, y.estado, y.presupuesto, y.documentacion, y.reunion, y.tipo FROM usuario u, proponentes p, proyectos y WHERE u.id=$idUsuario AND u.id = p.idUsuario AND p.idProponente = y.idProponente;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}

		public function obtenerProyectosRevisar($idUsuario) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT y.idProyecto,y.nombreProyecto,p.empresa,p.RUC,y.estado,y.presupuesto,y.documentacion,y.tipo,y.archivo FROM evaluadores e, proyectos y, proponentes p WHERE e.idUsuario=$idUsuario AND e.idConcurso = y.idConcurso AND y.idProponente=p.idProponente AND y.estado='En evaluación';";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
		public function obtenerProyectosRevisarxIdProyecto($idUsuario,$idProyecto) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT y.idProyecto,y.nombreProyecto,p.empresa,p.RUC,y.estado,y.presupuesto,y.documentacion,y.tipo,y.archivo FROM evaluadores e, proyectos y, proponentes p WHERE e.idUsuario=$idUsuario AND e.idConcurso = y.idConcurso AND y.idProponente=p.idProponente AND y.idProyecto=$idProyecto AND y.estado='En evaluación';";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
		public function obtenerProyectosCalificados($idUsuario) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT y.idProyecto,y.nombreProyecto,p.empresa,p.RUC,y.estado,y.presupuesto,y.documentacion,y.tipo,y.archivo,v.calificacion,y.idConcurso FROM evaluadores e, proyectos y, proponentes p, evaluaciones v WHERE e.idUsuario=$idUsuario AND e.idConcurso = y.idConcurso AND y.idProponente=p.idProponente AND v.idProyecto=y.idProyecto AND y.estado='Calificado' ORDER BY v.calificacion DESC;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
	}

	class Proponente {
		private $idProponente;
		private $empresa;
		private $RUC;
		private $telefono;
		private $solicitante;
		private $fechaCreacion;
		private $idUsuario;
		
		public function __construct() {}

		public function obtenerProponentes() {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM proponentes;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
		public function obtenerPropYConcxIdUsuario($idUsuario) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT p.idProponente,y.idConcurso FROM proponentes p, proyectos y WHERE p.idProponente = y.idProponente AND p.idUsuario=$idUsuario;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
	}

	class Concurso {
		private $idConcurso;
		private $nombreConcurso;
		private $fechaCreacion;
		private $fechaInicio;
		private $fechaFin;
		private $estado;
		private $ganador;

		public function __construct() {}

		public function obtenerConcursos() {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM concursos;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
		public function obtenerConcursosxId($idConcurso) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM concursos WHERE idConcurso=$idConcurso;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
	}

	class Consulta {
		private $idConsulta;
		private $idConcurso;
		private $idProponente;
		private $consulta;
		private $fechaConsulta;
		private $estado;
		private $respuesta;
		private $fechaRespuesta;

		public function __construct() {}

		public function obtenerConsultas () {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM consultas;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}

		public function obtenerConsultasxIdConcurso ($idConcurso) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM consultas WHERE idConcurso = $idConcurso;";
			$resultado = mysqli_query($enlace,$sentencia);
			mysqli_close($enlace);
			return $resultado;
		}
	}

	class Evaluadores {
		private $idEvaluador;
		private $cargo;
		private $nivelEvaluacion;
		private $permisoModificacion;
		private $idConcurso;
		private $idUsuario;

		public function __construct() {}

		public function obtenerEvaluadores() {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM evaluadores;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}

		public function obtenerEvaluadoresxIdConcurso($idConcurso) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM evaluadores WHERE idConcurso = $idConcurso;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
		public function obtenerIdConcurso($idUsuario) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT idConcurso FROM evaluadores WHERE idUsuario=$idUsuario;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
	}

	class Evaluaciones {
		private $idEvaluacion;
		private $cargo;
		private $nivelEvaluacion;
		private $permisoModificacion;
		private $idConcurso;
		private $idUsuario;

		public function __construct() {}

		public function obtenerEvaluaciones() {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM evaluaciones;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}

		public function obtenerEvaluacionesxIdConcurso($idConcurso) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM evaluaciones WHERE idConcurso = $idConcurso;";
			$resultado = mysqli_query($enlace,$sentencia);
			return $resultado;
		}
	}

	class Negociaciones {
		private $idNegociacion;
		private $fecha;
		private $estado;
		private $acta;
		private $resultado;
		private $idConcurso;

		public function __construct() {}

		public function obtenerNegociaciones() {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM negociacion;";
			$respuesta = mysqli_query($enlace,$sentencia);
			return $respuesta;
		}

		public function obtenerNegociacionesxId($idNegociacion) {
			$enlace = mysqli_connect("localhost","root","","ViveAmazonas");
			$sentencia = "SELECT * FROM negociacion WHERE idNegociacion=$idNegociacion;";
			$respuesta = mysqli_query($enlace,$sentencia);
			return $respuesta;
		}
	}

	class Upload {
		
		public function __construct() {}

		public function uploadDocumentacion() {}
	}
	
?>
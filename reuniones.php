<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<title>Reuniones | Vive Amazonas</title>
    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
    <!-- Full Calendar -->
	<link rel='stylesheet' href='calendario/core/main.css'>
	<link rel='stylesheet' href='calendario/daygrid/main.css'>
	<script src='calendario/core/main.js'></script>
	<script src='calendario/daygrid/main.js'></script>
	<script src='calendario/interaction/main.js'></script>
	<!-- Plugins -->
	<script src='calendario/list/main.js'></script>
	<script src='calendario/timegrid/main.js'></script>
	<!-- Estilos de vistas -->
	<link rel='stylesheet' href='calendario/list/main.css'>
	<link rel='stylesheet' href='calendario/timegrid/main.css'>
    <script>
    	document.addEventListener('DOMContentLoaded', function() {
	        var calendarEl = document.getElementById('calendar');
	        var calendar = new FullCalendar.Calendar(calendarEl, {
	   			//defaultDate:new Date(2020,6,1),
	         	plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],
	         	//defaultView: 'timeGridWeek',
	         	header: {
	         		left: 'prev,next today Miboton',
	         		center: 'title',
	         		right: 'dayGridMonth,timeGridWeek,timeGridDay'
	         	},
                events: 'http://localhost:8080/Prueba/reuniones-obtener.php',
	         	dateClick: function(info) {
	         		$('#txtFecha').val(info.dateStr);
	         		$('#ModalEventos').modal('toggle');
	         		//calendar.addEvent({ title:"Evento x", date:info.dateStr });
	         		console.log(info);
	         	},
	         	eventClick: function(info) {
	         		console.log(info);
	         		console.log(info.event.id);
	         		console.log(info.event.title);
	         		console.log(info.event.extendedProps.descripcion);
	         		console.log(info.event.backgroundColor);
	         		console.log(info.event.textColor);
	         		console.log(info.event.start);
	         		console.log(info.event.end);
	         		//$('#tituloEvento').html(info.event.title);
	         		//$('#descripcionEvento').html(info.event.extendedProps.descripcion);
	         		//$('#ModalEventoCreado').modal('toggle');
	         		$('#txtId').val(info.event.id);
	         		$('#txtTitulo').val(info.event.title);
	         		$('#txtDescripcion').val(info.event.extendedProps.descripcion);
	         		mes = (info.event.start.getMonth()+1);
	         		dia = (info.event.start.getDate());
	         		anio = (info.event.start.getFullYear());

	         		mes = (mes<10)?"0"+mes:mes;
	         		dia = (dia<10)?"0"+dia:dia;

	         		hora = (info.event.start.getHours()+":"+info.event.start.getMinutes());
	         		$('#txtFecha').val(anio+"-"+mes+"-"+dia);
	         		$('#txtHora').val(hora);
	         		$('#txtColor').val(info.event.backgroundColor);
	         		$('#ModalEventos').modal('toggle');
	         	}
	        });
	        calendar.setOption('locale','es');
	        calendar.render();
	    });
    </script>
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
    <!-- Modal (Crear evento) -->
	<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Datos del Evento</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<div class="form-row">
			  <div class="form-group col-md-8">
		      		<label>Título:</label>
		      		<input type="text" class="form-control" name="txtTitulo" id="txtTitulo">
		      	</div>
		      	<div class="form-group col-md-4">
		      		<label>ID:</label>
		      		<input type="text" class="form-control" name="txtId" id="txtId">
		      	</div>
		      	<div class="form-group col-md-8">
		      		<label>Fecha:</label>
		      		<input type="text" class="form-control" name="txtFecha" id="txtFecha">
		      	</div>
		      	<div class="form-group col-md-4">
		      		<label>Hora:</label>
		      		<input type="text" class="form-control" name="txtHora" id="txtHora">
		      	</div>
		      	<div class="form-group col-md-12">
		      		<label>Descripción:</label>
		      		<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3"></textarea>
		      	</div>
		      	<div class="form-group col-md-12">
		      		<label>Color:</label>
		      		<input type="color" class="form-control" name="txtColor" id="txtColor" value="#ff0000">
		      	</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button id="btnAgregar" type="button" class="btn btn-success">Agregar</button>
	        <button id="btnModificar" type="button" class="btn btn-warning">Modificar</button>
	        <button id="btnBorrar" type="button" class="btn btn-danger">Borrar</button>
	        <button id="btnCancelar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	      </div>
	    </div>
	  </div>
	</div>
    <div id="agenda">
        <div id="calendar"></div>
    </div>
    <footer>
		Copyright © ViveAmazonas 2020
	</footer>
	<?php
	}
	?>
</body>
</html>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CalendarioWeb</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">		
	<script src='js/jquery.min.js'></script>
	<script src='js/moment.min.js'></script>

	<!-- full calendar -->
	<link rel='stylesheet' href='css/fullcalendar.min.css' />
	<script src='js/fullcalendar.min.js'></script>
	<script src='locale/pt-br.js'></script>
	
	<script src="js/bootstrap-clockpicker.js"></script>
	<link rel="stylesheet" href="css/bootstrap-clockpicker.css">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		
	<style>
	
			
		.container {
			height: 0%;
			width: 10%;
			right: 50px;
			margin-top: 0px;
		}
		
		.fc th{
			padding: 10px 0px;
			vertical-align:middle;
			background: #F2F2F2;
			
			
			
		}
		
		#CalendarioWeb{
			
			width: 60%;
			margin-left: auto;
			margin-right: auto;
			margin-top: 0px;
			
			
			
   
	}

		
	</style>
 
 </head>
 <body>
	<div class="container">
		<div class="row">
			<div class="col"></div>
			<div class="co-7"><br/>	<br/><div id="CalendarioWeb"></div></div>
			<div class="col"></div>
		</div>
	</div>
 
<script>
	$(document).ready(function(){
		$('#CalendarioWeb').fullCalendar({
			header:{
				left:'today,prev,next',
				center:'title',
				right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
			},dayClick:function(date,jsEvent,view){	

				$('#btnAgregar').prop("disabled",false);
				$('#btnModificar').prop("disabled",true);
				$('#btnEliminar').prop("disabled",true);
				
			
				limpiarFormulario();
				$('#txtFecha').val(date.format());
				$("#ModalEventos").modal();
					
			},
			 events:'https://github.com/foodipss/app/edit/master/turnoCalendario.php',
			
			eventClick:function(calEvent,jsEvent,view){
							
				$('#btnAgregar').prop("disabled",true);
				$('#btnModificar').prop("disabled",false);
				$('#btnEliminar').prop("disabled",false);
				
				
			//H2
			$('#tituloEvento').html(calEvent.title);
			
			
			//Mostrar a informação do turno
			$('#txtDescripcion').val(calEvent.descripcion);
			$('#txtID').val(calEvent.id);
			$('#txtTitulo').val(calEvent.title);
			$('#txtColor').val(calEvent.color);
			
			FechaHora= calEvent.start._i.split(" ");
			$('#txtFecha').val(FechaHora[0]);
			
			
			$("#ModalEventos").modal();
			
		},
		editable:true,
		eventDrop:function(calEvent){
			$('#txtID').val(calEvent.id);
			$('#txtTitulo').val(calEvent.title);
			$('#txtColor').val(calEvent.color);
			$('#txtDescripcion').val(calEvent.descripcion);
			
			var fechaHora=calEvent.start.format().split("T");
			$('#txtFecha').val(fechaHora[0]);
			$('#txtHora').val(fechaHora[1]);
			
			RecolectarDatosGUI();
			EnviarInformacion('modificar',NuevoEvento,true);
		}
		
		
		
		
		});
		
	});
	
</script>

<!--Modal(Agregar, modificar, eliminar)-->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tituloEvento"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<input type="hidden" id="txtID" name="txtID">
				<input type="hidden" id="txtFecha" name="txtFecha">
				
			
			
				<div class="form-row">
					<div class="form-group col-md-8">
						<label>Titulo:</label>
						<input type="text" id="txtTitulo" class="form-control" placeholder="Titulo do Evento">
					</div>
					<div class="form-group col-md-4">
						<label>Hora Inicio:</label>
					
					<div class="input-group clockpicker" data-autoclose="true">	
						<input type="text" id="txtHora" value="10:30" class="form-control"/>
					</div>	
						
						
						
						
					
					
					
					
					</div>
					
			</div>
			<div class="form-group">
					<label>Constituição do Turno:</label>
					<textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Cor:</label>
					<input type="color" value="#ff0000"id="txtColor" class="form-control" style="height:36px;">
				</div>
				
				
			</div>
			<div class="modal-footer">
			
				<button type="button" id="btnAgregar" class="btn btn-sucess">Adicionar turno</button>
				<button type="button" id="btnModificar" class="btn btn-sucess">Modificar</button>
				<button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					
					
					

					
				</div>
			</div>
		</div>
	</div>		
<script>
var NuevoEvento;

	$('#btnAgregar').click(function(){
		
		RecolectarDatosGUI();
		EnviarInformacion('agregar', NuevoEvento);	
});
	$('#btnEliminar').click(function(){
		RecolectarDatosGUI();
		EnviarInformacion('eliminar', NuevoEvento);	
});	
	$('#btnModificar').click(function(){
		RecolectarDatosGUI();
		EnviarInformacion('modificar', NuevoEvento);	
});	


function RecolectarDatosGUI(){
	NuevoEvento= {
		id:$('#txtID').val(),
		title:$('#txtTitulo').val(),
		start:$('#txtFecha').val()+" "+$('#txtHora').val(),
		color:$('#txtColor').val(),
		descripcion:$('#txtDescripcion').val(),
		textColor:"#FFFFFF",
		end:$('#txtFecha').val()+" "+$('#txtHora').val()	
	};	
	
	
}
function EnviarInformacion(accion,objEvento,modal){
	$.ajax({
		type:'POST',
		url:'turnoCalendario.php?accion='+accion,
		data:objEvento,
		success:function(msg){
			if(msg){
				$('#CalendarioWeb').fullCalendar('refetchEvents');
				if(!modal){
					$("#ModalEventos").modal('toggle');	
				}
				
		 }
		},
		error:function(){
			alert("Hay un error..");
		}
		
	});
	
	
}


$('.clockpicker').clockpicker();
function limpiarFormulario(){
		$('#txtID').val('');
		$('#txtTitulo').val('Evento..');
		$('#txtColor').val('');
		$('#txtDescripcion').val('');
}

</script>

<?php require_once "index.php"; ?>
<div class="menu-calendario" id="MenuContent">
  <div class="calendario">
    <h3 align="center" style="font-size:30px"></h3>
   <div id="calendar"></div>
   </div>
</div>

</body>
</html>

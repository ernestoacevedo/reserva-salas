$(document).ready(function() {
	var hoy = new moment(new Date()).format('D/M/YYYY');														 // Variable utilizada para setear la fecha actual en el plugin de calendari
	$('#calendar-wrap').data('fecha',new moment(new Date()).format('DD/MM/YYYY')); 	// Se añade la fecha actual al wrapper del calendario
	var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
	var dayNames = ["L", "M", "M", "J", "V", "S", "D"];
	var events = [{
		"date": hoy,"link":"#","color":"green"
	}];

	$('#calendar').bic_calendar({
		//list of events in array
		events: events,
		//enable select
		enableSelect: true,
		//enable multi-select
		multiSelect: false,
		//set day names
		dayNames: dayNames,
		//set month names
		monthNames: monthNames,
		//show dayNames
		showDays: true,
		//show month controller
		displayMonthController: true,
		//show year controller
		displayYearController: true,
	});

	var actualizarTabla = function($tabla) {
		$tabla.each(function(i, elemento) {
			switch ($(this).data('reservado')) {
				case 1:
					$(this).css({
						'background': '#c0392b'
					});
					break;
				default:
					if ($(this).hasClass('horario')) {
						$(this).css({
							'background': '#2ecc71'
						});
					}
					break;
			}
		});
	};

	var inicializarTabla = function($tabla){
		$tabla.each(function(i,elemento){
			$(this).data('reservado',0);
		});
	};

	var obtenerReservas = function($fecha){
		inicializarTabla($('#tabla_horarios td'));
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			data: {fecha: $fecha},
			url: $('body').data('url')+'index.php/reservas/ObtenerReservas',
			success: function(respuesta){
				console.log(respuesta);
				$.each(respuesta,function(key,value){
					$('td[data-id-modulo='+value.modulo+']').siblings().eq(value.sala-1).data('reservado',1);
				});
				actualizarTabla($('#tabla_horarios td'));
			}
		});
	};

	obtenerReservas($('#calendar-wrap').data('fecha'));

	document.addEventListener('bicCalendarSelect', function(e) {
		moment.lang('es');
		$('#calendar-wrap').data('fecha',new moment(e.detail.date).format('DD/MM/YYYY'));
		obtenerReservas($('#calendar-wrap').data('fecha'));
	});

	$(document).on('mouseenter', '#tabla_horarios tr td', function(e) {
		if ($(this).hasClass('horario') && $(this).data('reservado') != 1) {
			$(this).html('<button class="btn btn-primary btn-reserva">Reservar</button>');
		}
	});

	$(document).on('mouseleave', '#tabla_horarios tr td', function(e) {
		if ($(this).hasClass('horario') && $(this).html() != "" && $(this).data('reservado') != 1) { // Si el elemento no está vacío (tiene un botón), se elimina el contenido
			$(this).html('');
		}
	});

	var $cell = null;

	$(document).on('click', '.btn-reserva', function(e) {
		$cell = $(this).parent();
		$th = $(this).closest('table')[0].rows[0].cells[$(this).parent()[0].cellIndex];
		$('#modal-reserva').modal('show');
		$('#barra-progreso').show();
		$('#rut').val('').focus();
		$('#nombre').val('');
		$('#carrera').val('');
		$('#fecha').val($('#calendar-wrap').data('fecha'));
		$('#sala').val($($th).data('num-sala'));
		$('#modulo').val($(this).parent().parent().children(':first-child').data('id-modulo'));
		console.log('Sala: '+$($th).data('num-sala'));
		console.log('Módulo: '+$(this).parent().parent().children(':first-child').data('id-modulo'));
		console.log('Fecha: '+$('#calendar-wrap').data('fecha'));
	});

	$(document).on('click', '.btn-agregar', function(e) {
		e.preventDefault();
		e.stopPropagation();
		console.log($('#form-reserva').serialize());
		$.ajax({
			type: 'POST',
			url: $('#form-reserva').attr('action'),
			data: $('#form-reserva').serialize(),
			dataType: 'JSON',
			success: function(data){
				console.log(data);
				if(data.error){
					alert('Error al reservar sala');
				}
				else{
					$cell.html($('#nombre').val());
					$cell.data('reservado', 1);
					$('#modal-reserva').modal('hide');
					actualizarTabla($('#tabla_horarios td'));
				}
			}
		});
	});

	$(document).on('input', '#nombre,#rut,#carrera', function(e) {
		$('#barra-progreso').hide();
	});

	$('#tabla_horarios').dataTable({
		"bJQueryUI": true,
		"sDom": "<H><t><F>"
	});
});

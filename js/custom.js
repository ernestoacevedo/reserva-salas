$(document).ready(function() {
	var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

	var dayNames = ["L", "M", "M", "J", "V", "S", "D"];

	var events = [{
		date: "28/06/2014",
		title: 'Evento de prueba',
		link: 'google.cl',
		linkTarget: '_blank',
		color: '',
		content: 'Hola',
		class: '',
		displayMonthController: true,
		displayYearController: true,
		nMonths: 6
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

	document.addEventListener('bicCalendarSelect', function(e) {
		moment.lang('es');
    var date = new moment(e.detail.date);
		console.log(date.format('DD/MM/YYYY'));
	});

	var actualizarTabla = function($tabla){
		$tabla.each(function(i,elemento){
			switch($(this).data('reservado')){
				case 1:
					$(this).css({'background':'#c0392b'});
					break;
				default:
					if($(this).hasClass('horario')){
						$(this).css({'background':'#2ecc71'});
					}
					break;
			}
		});
	};

	actualizarTabla($('#tabla_horarios td'));

	$(document).on('mouseenter', '#tabla_horarios tr td', function(e) {
		if ($(this).hasClass('horario') && $(this).data('reservado') != 1) {
			$(this).html('<button class="btn btn-primary btn-reserva">Reservar</button>');
		}
	});

	$(document).on('mouseleave', '#tabla_horarios tr td', function(e) {
		if ($(this).hasClass('horario') && $(this).html() != "" && $(this).data('reservado')!=1) { // Si el elemento no está vacío (tiene un botón), se elimina el contenido
			$(this).html('');
		}
	});

	var $cell = null;

	$(document).on('click', '.btn-reserva', function(e) {
		$('#modal-reserva').modal('show');
		$('#barra-progreso').show();
		$('#rut').val('').focus();
		$('#nombre').val('');
		$('#carrera').val('');
		$cell = $(this).parent();
	});

	$(document).on('click','.btn-agregar',function(e){
		$cell.html($('#nombre').val());
		$cell.data('reservado',1);
		$('#modal-reserva').modal('hide');
		actualizarTabla($('#tabla_horarios td'));
	});

	$(document).on('input','#nombre',function(e){
		$('#barra-progreso').hide();
	});

	$('#tabla_horarios').dataTable({"bJQueryUI": true,"sDom": "<H><t><F>"});
});

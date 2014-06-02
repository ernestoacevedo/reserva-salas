$(document).ready(function() {
	var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayor", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

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
		console.log(e);
	});

	$(document).on('click','#tabla_horarios tr td',function(e){
		console.log(e.pageX);
		console.log(e.pageY);
		$(this).popover({content: 'Hola'});
	});

	$('#tabla_horarios').dataTable();
});

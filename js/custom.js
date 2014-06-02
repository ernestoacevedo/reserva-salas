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
		moment.lang('es');
    var date = new moment(e.detail.date);
		console.log(date.format('DD/MM/YYYY'));
	});

	$(document).on('click','#tabla_horarios tr td',function(e){
		console.log('click');
		$(this).popover({content: 'Hola '});
	});

	var actualizarTabla = function($tabla){
		$tabla.each(function(i,elemento){
			console.log($(this).html());
			switch($(this).html()){
				case "0":
					$(this).css({'background':'#2ecc71'});
					break;
				case "1":
					$(this).css({'background':'#c0392b'});
					break;
			}
		});
	};

	actualizarTabla($('#tabla_horarios td'));

	$('#tabla_horarios').dataTable({"bJQueryUI": true,"sDom": "<H><t><F>"});
});

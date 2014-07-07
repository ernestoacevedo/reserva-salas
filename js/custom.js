(function() {
	$(document).ready(function() {
		var hoy = new moment(new Date()).format('D/M/YYYY'); // Variable utilizada para setear la fecha actual en el plugin de calendari
		$('#calendar-wrap').data('fecha', new moment(new Date()).format('YYYY-MM-DD')); // Se añade la fecha actual al wrapper del calendario
		var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
		var dayNames = ["L", "M", "M", "J", "V", "S", "D"];
		var events = [{
			"date": hoy,
			"link": "#",
			"color": "green"
		}];
		var $cell = null;
		var $th = null;
		var $html = '';
		var $sala = null;
		var $modulo = null;

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
					case 2:
						$(this).css({
							'background': '#f1c40f'
						});
						break;
					case 3:
						$(this).css({
							'background': '#95a5a6'
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

		var inicializarTabla = function($tabla) {
			$tabla.each(function(i, elemento) {
				$(this).data('reservado', 0);
				if ($(this).hasClass('horario')) {
					$(this).html('');
				}
			});
		};

		var obtenerReservas = function($fecha) {
			inicializarTabla($('#tabla_horarios td'));
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: {
					fecha: $fecha
				},
				url: $('body').data('url') + 'index.php/reservas/ObtenerReservas',
				success: function(respuesta) {
					console.log(respuesta);
					$.each(respuesta, function(key, value) {
						$('td[data-id-modulo=' + value.modulo + ']').siblings().eq(value.sala - 1).data('reservado', value.reservado);
						$('td[data-id-modulo=' + value.modulo + ']').siblings().eq(value.sala - 1).html(value.nombre_a + '<br><span class="carrera">' + value.carrera_a + '</span>');
					});
					actualizarTabla($('#tabla_horarios td'));
				}
			});
		};

		obtenerReservas($('#calendar-wrap').data('fecha'));

		document.addEventListener('bicCalendarSelect', function(e) {
			moment.lang('es');
			$('#calendar-wrap').data('fecha', new moment(e.detail.date).format('YYYY-MM-DD'));
			$('.popover').hide();
			obtenerReservas($('#calendar-wrap').data('fecha'));
		});

		$(document).on('mouseenter', '#tabla_horarios tr td', function(e) {
			if ($(this).hasClass('horario')) {
				if ($(this).data('reservado') == 0) {
					$(this).html('<button class="btn btn-primary btn-reserva">Reservar</button>');
				} else {
					if($(this).data('reservado') == 1){
							$html = $(this).find('.carrera').html();
							$(this).find('.carrera').html('<a href="#" class="validar"><i class="fa fa-thumbs-up"></i></a> <a href="#" class="observacion"><i class="fa fa-comment"></i></a> <a href="#" class="eliminar"><i class="fa fa-trash-o"></i></a>');
					}
				}
			}
		});

		$(document).on('mouseleave', '#tabla_horarios tr td', function(e) {
			if ($(this).hasClass('horario') && $(this).html() != "") { // Si el elemento no está vacío (tiene un botón), se elimina el contenido
				if ($(this).data('reservado') == 0) {
					$(this).html('');
				} else {
					if($(this).data('reservado')==1){
						$(this).find('.carrera').html($html);
					}
				}
			}
		});

		$(document).on('click', '.btn-reserva', function(e) {
			$cell = $(this).parent();
			$th = $(this).closest('table')[0].rows[0].cells[$(this).parent()[0].cellIndex];
			$sala = $($th).data('num-sala');
			$modulo = $(this).parent().parent().children(':first-child').data('id-modulo');
			$('#modal-reserva').modal('show');
			$('#barra-progreso').show();
			$('#rut').val('').focus();
			$('#nombre').val('');
			$('#carrera').val('');
			$('#fecha').val($('#calendar-wrap').data('fecha'));
			$('#sala').val($sala);
			$('#modulo').val($modulo);
			$('.popover').hide();
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
				success: function(data) {
					console.log(data);
					if (data.error) {
						var n = noty({
							text: data.mensaje,
							type: 'error',
							layout: 'bottomRight',
							timeout: '500'
						});
					} else {
						var n = noty({
							text: '<b>insertado:</b> ' + data.insertado,
							type: 'alert',
							layout: 'bottomLeft',
							timeout: '500'
						});
						$('#modal-reserva').modal('hide');
						obtenerReservas($('#calendar-wrap').data('fecha'));
					}
				}
			});
		});

		$(document).on('input', '#rut', function(e) {
			$('#barra-progreso').hide();
			if ($('#rut').val() != "") {
				$('#nombre').val('');
				$('#carrera').val('');
				$.ajax({
					type: 'POST',
					data: {
						rut: $('#rut').val()
					},
					url: $('body').data('url') + 'index.php/reservas/ValidarAlumno',
					dataType: 'JSON',
					success: function(data) {
						console.log(data);
						if (data.error) {
							var n = noty({
								text: 'RUT inválido',
								type: 'error',
								layout: 'bottomRight',
								timeout: '500'
							});
						} else {
							var nombre_alumno = data.alumno.nombre.split(" ");
							var apellido_alumno = data.alumno.apellido.split(" ");
							$('#nombre').val(nombre_alumno[0] + " " + apellido_alumno[0]);
							$('#carrera').val(data.alumno.carrera);
						}
					}
				});
			}
		});

		$(document).on('click', '.observacion', function(e) {
			e.preventDefault();
			e.stopPropagation();
			$('.popover').hide();
			$(this).popover({
				placement: 'bottom',
				title: 'Añadir Observación',
				content: '<div class="input-group"><textarea id="obs_text" style="resize: none;" rows="3" cols="20" class="form-control pull-left"></textarea><span class="input-group-btn"><button class="btn btn-primary btn-add-obs" type="button"><span class="fa fa-check"></span></button></span></div>',
				html: 'true',
				container: 'body'
			});
			$(this).popover('show');
		});

		$(document).on('click', '#add-obs', function(e) {
			if ($(this).is(':checked')) {
				$('#observacion').show();
			} else {
				$('#observacion').hide();
			}
		});

		$(document).on('click','span.carrera>a',function(e){
			$th = $(this).closest('table')[0].rows[0].cells[$(this).parent().parent()[0].cellIndex];
			$sala = $($th).data('num-sala');
			$modulo = $(this).parent().parent().parent().children(':first-child').data('id-modulo');
		});

		$(document).on('click', '.eliminar', function(e) {
			$('.popover').hide();
			$('#observacion').val('');
			$('#modalEliminar').modal('show');
		});

		$(document).on('click', '.validar', function(e) {
			$('.popover').hide();
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: {
					fecha: $('#calendar-wrap').data('fecha'),
					sala: $sala,
					modulo: $modulo
				},
				url: $('body').data('url') + 'index.php/reservas/ConfirmarReserva',
				success: function(data) {
					console.log(data);
					obtenerReservas($('#calendar-wrap').data('fecha'));
				},
				error: function(data){
					console.log(data);
					alert('Ocurrió un error');
				}
			});
		});

		$(document).on('click', '#btn-eliminar-reserva', function(e) {
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: {
					fecha: $('#calendar-wrap').data('fecha'),
					sala: $sala,
					modulo: $modulo,
					observacion: $('#observacion').val()
				},
				url: $('body').data('url') + 'index.php/reservas/EliminarReserva',
				success: function(data) {
					$('#modalEliminar').modal('hide');
					obtenerReservas($('#calendar-wrap').data('fecha'));
				},
				error: function(data){
					alert("Ocurrió un error");
				}
			});
		});

		$(document).on('click', '#btn-cancelar-reserva', function(e) {
			$('#modalEliminar').modal('hide');
		});

		$(document).on('click','.btn-add-obs',function(e){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: {
					fecha: $('#calendar-wrap').data('fecha'),
					sala: $sala,
					modulo: $modulo,
					observacion: $('#obs_text').val()
				},
				url: $('body').data('url') + 'index.php/reservas/AgregarObservacion',
				success: function(data) {
					console.log(data);
					$('.popover').hide();
				},
				error: function(data){
					console.log("error");
					$('.popover').hide();
				}
			}).done(function(){
				$('.popover').hide();
			});
		});

		$('#tabla_horarios').dataTable({
			"bJQueryUI": false,
			"sDom": '<><t><>',
			"bSort": false
		});
	});
})();

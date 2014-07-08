<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sistema de Reserva de Salas</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.10.4.custom.css"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables_themeroller.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bic_calendar.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.css"/>
</head>
<body data-url="<?php echo base_url();?>">
  <section id="container">
    <nav class="navbar navbar-default" role="navigation">
      <div class="">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">SIBIB UCM</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('reportes');?>"><span class="fa fa-archive"></span> Reportes</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span> Administrar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('modulos');?>"><span class="fa fa-cubes"></span> Módulos</a></li>
                <li><a href="<?php echo site_url('parametros');?>"><span class="fa fa-cogs"></span> Parámetros</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> Usuario <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="fa fa-sign-out"></span> Cerrar sesión </a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <aside>
      <div id="sidebar">
        <ul id="menu_reportes" class="nav nav-pills nav-stacked">
          <input type="hidden" id="rep_fecha" name="rep_fecha">
          <li class="active"><a href="#" data-action="index.php/reportes/ReporteDiario" data-interval="1"><span class="fa fa-clock-o"></span> Diario</a></li>
          <li><a href="#" data-action="index.php/reportes/ReporteSemanal" data-interval="1"><span class="fa fa-calendar-o"></span> Semanal</a></li>
          <li><a href="#" data-action="index.php/reportes/ReporteMensual" data-interval="1"><span class="fa fa-calendar"></span> Mensual</a></li>
          <li><a href="#" data-action="index.php/reportes/ReporteCarrera" data-interval="2"><span class="fa fa-mortar-board"></span> Por Carrera</a></li>
          <li><a href="#" data-action="index.php/reportes/ReporteInasistencias" data-interval="2"><span class="fa fa-history"></span> Inasistencias</a></li>
          <li><a href="#" data-action="index.php/reportes/ReporteEliminaciones" data-interval="2"><span class="fa fa-times"></span> Por Eliminación</a></li>
          <li><a href="#" data-action="index.php/reportes/ReporteHorariosPunta" data-interval="2"> <span class="fa fa-bar-chart-o"></span> Horarios Punta</a></li>
          <li><a href="#" data-action="index.php/reportes/ReporteOcupacion" data-interval="2"><span class="fa fa-users"></span> Ocupación</a></li>
          <!-- <li><a href="#" data-action="index.php/reportes/" data-interval="2">Usuarios</a></li> -->
        </ul> <!-- imputs de texto-->
        <form id="form_modulo" action="<?php echo site_url('modulos/nuevo');?>" method="post" role="form" style="margin-top: 10px">
          <div id="date1" class="form-group">
            <div class='input-group date' id='fecha_inicio' data-date-format="YYYY-MM-DD">
                  <input  type='text' class="form-control" placeholder="Fecha inicial" />
                  <span class="input-group-addon"><span class="fa fa-calendar"></span>
                  </span>
            </div>
          </div>
          <div id="date2" style="display: none;" class="form-group">
            <div class='input-group date' id='fecha_fin' data-date-format="YYYY-MM-DD">
                  <input type='text' class="form-control" placeholder="Fecha final" />
                  <span class="input-group-addon"><span class="fa fa-calendar"></span>
                  </span>
            </div>
          </div>
          <div class="form-group"> <!-- botón generar reporte -->
            <button type="submit" class="form-control" id="btn-buscar" class="btn btn-default" value="">Generar Reporte</button>
          </div>
        </form>
      </div>
    </aside>
    <section id="main-content">
      <div id="grafico"></div>  <!-- botones de reportes -->
      <a id="to_pdf" style="display: none;" class="btn btn-danger" href="#"><span class="fa fa-file-pdf-o"> Exportar a PDF</span></a>
      <a id="to_xls" style="display: none;" class="btn btn-success" href="#"><span class="fa fa-file-excel-o"> Exportar a Excel</span></a>
    </section>
    <footer>

    </footer>
  </section>
  <!-- carga los script con dependencia-->
  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>js/highcharts.js"></script>
  <script src="<?php echo base_url(); ?>js/exporting.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.min.js"></script>
  <script>
    $('#fecha_inicio').datetimepicker({language: 'es'}); // inicializar el plugin en date 1
    $('#fecha_fin').datetimepicker({language: 'es'}); //inicializar el plugin en date 2
    $('#rep_fecha').val(new moment(new Date()).format('YYYY-MM-DD')); //
    var url_reporte = $('#menu_reportes li:first a').data('action'); //
    var $a = $('#menu_reportes li:first a'); // inicializa  la variable del link, captura por defecto
    $(document).on('click','#menu_reportes a',function(e){
      $('#to_pdf').hide(); // Oculta botones de reportes
      $('#to_xls').hide();
      $(this).parent().addClass('active'); // activar color de los links del silebar
      $(this).parent().siblings().attr('class','');
      url_reporte = $(this).data('action');  // obtiene el valor del url link al click
      $a = $(this);  // descarta el valor del link
      if($(this).data('interval')=='2'){ // controla  el visor de los campos de fechas
        $('#date2').show();
      }
      else{
        $('#date2').hide();
      }
    });

    $(document).on('click','#btn-buscar',function(e){
      e.preventDefault(); // Bloquera comportamiento por defecto
      e.stopPropagation(); // Bloquera comportamiento por defecto
      console.log(url_reporte); //
      console.log($('#fecha_inicio').find("input").val()); // 
      console.log($('#fecha_fin').find("input").val()); // 
      if($('#fecha_inicio').find("input").val()==""){ // si el campo de texto está vacío
        alert('Debe seleccionar una fecha');
      }
      else{
        $.ajax({ 
          type: 'POST',  
          url: $('body').data('url') + url_reporte, // obtiene la url del link del silebar
          dataType: 'JSON', // metodo para comunicar los datos desde el controlador
          data: {fecha: $('#fecha_inicio').find("input").val(),fecha_fin: $('#fecha_fin').find("input").val()}, // envian los 2 datos 
          success: function(data){
            if(data.series.length==0){
              alert('No se encontraron datos');
            }
            else{
                window.chart = new Highcharts.Chart({  // muestra el pluging
                      chart: {
                          type: 'column',
                          renderTo: 'grafico'
                      },
                      title: {
                          text: 'Reporte '+$a.html()
                      },
                      subtitle: {
                          text: 'Total de Reservas '+data.total  // contador 
                      },
                      xAxis: {
                          categories: [ // titulo eje x
                              ''
                          ]
                      },
                      yAxis: {
                          min: 0,
                          title: {
                              text: data.title // titulo eje y
                          }
                      },
                      tooltip: { // leyenda
                          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                              '<td style="padding:0"><b>{point.y}</b></td></tr>',
                          footerFormat: '</table>',
                          shared: true,
                          useHTML: true
                      },
                      plotOptions: {
                          column: {   // opciones de gráficos
                              pointPadding: 0.2,
                              borderWidth: 0
                          }
                      },
                      series: data.series, // obtiene el arraylist de data que viene desde el controlador por JSON
                      exporting:{
                        enabled: true
                      }
                  });
                  $('#to_pdf').show(); // muestra los botones
                  $('#to_xls').show(); // muestra los botones
                  $('#to_xls').attr('href',data.xls_path); // ruta en controlador a excell
            }
          }
        });
      }
    });
    $(document).on('click','#to_pdf',function(e){
      e.preventDefault(); // Bloquera comportamiento por defecto
      e.stopPropagation(); // Bloquera comportamiento por defecto
      //$title = 'Reporte '+$a.html+' '+$('#fecha_inicio').find("input").val();
      chart.exportChart({ // llama al pliging para exportar
            type: 'application/pdf',
            filename: 'reporte'
      });
    });
  </script>
</body>
</html>

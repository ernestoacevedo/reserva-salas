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
            <li><a href="#">Reportes</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('modulos');?>">Módulos</a></li>
                <li><a href="#">Salas</a></li>
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
        <ul id="menu_reportes">
          <input type="hidden" id="rep_fecha" name="rep_fecha">
          <li><a href="#" data-action="index.php/reportes/ReporteDiario">Diario</a></li>
          <li><a href="#">Semanal</a></li>
          <li><a href="#">Mensual</a></li>
          <li><a href="#">Por Carrera</a></li>
          <li><a href="#">Inasistencias</a></li>
          <li><a href="#">Inasistencias sin Justificar</a></li>
          <li><a href="#">Horarios Punta</a></li>
          <li><a href="#">Ocupación</a></li>
          <li><a href="#">Usuarios</a></li>
        </ul>
      </div>
    </aside>
    <section id="main-content">
      <div id="grafico"></div>
    </section>
    <footer>

    </footer>
  </section>

  <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>js/highcharts.js"></script>

  <script>
    $('#rep_fecha').val(new moment(new Date()).format('YYYY-MM-DD'));
    $(document).on('click','#menu_reportes>li>a',function(e){
      e.preventDefault();
      e.stopPropagation();
      console.log($('body').data('url') + $(this).data('action'));
      var $a = $(this);
      $.ajax({
        type: 'POST',
        url: $('body').data('url') + $(this).data('action'),
        dataType: 'JSON',
        data: {fecha: $('#rep_fecha').val()},
        success: function(data){
          console.log(data);
          var series = [];
          $.each(data.series,function(key,val){
            var item = {}
            item.name = (val['name']);
            item.data = (val['data']);
            series.push(item);
          });
          console.log(series);
          $('#grafico').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: $a.html()
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [
                        ''
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: data.title
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: data.series
            });
        }
      });
    });
  </script>
</body>
</html>

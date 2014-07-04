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
          <li><a href="#">a</a></li>
          <li><a href="#">b</a></li>
          <li><a href="#">c</a></li>
          <li><a href="#">d</a></li>
          <li><a href="#">e</a></li>
          <li><a href="#">f</a></li>
          <li><a href="#">g</a></li>
          <li><a href="#">h</a></li>
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
  <script src="<?php echo base_url(); ?>js/highcharts.js"></script>

  <script>
    $(document).on('click','#menu_reportes>li>a',function(e){
      e.preventDefault();
      e.stopPropagation();
      $('#grafico').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
            series: [{
                name: 'Tokyo',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

            }, {
                name: 'New York',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

            }, {
                name: 'London',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

            }, {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

            }]
        });
    });
  </script>
</body>
</html>

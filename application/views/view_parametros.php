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
            <li><a href="<?php echo site_url('reportes');?>">Reportes</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('modulos');?>">Módulos</a></li>
                <li><a href="<?php echo site_url('parametros');?>">Parámetros</a></li>
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
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#content_plazo" role="tab" data-toggle="tab">Plazo Máximo</a></li>
        <li><a href="#content_disponibilidad" role="tab" data-toggle="tab">Disponibilidad</a></li>
        <li><a href="#content_reservas" role="tab" data-toggle="tab">Nº Reservas Diarias</a></li>
        <li><a href="#content_salas" role="tab" data-toggle="tab">Salas</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="content_plazo">
            <div class="col-md-3">
              <form id="form_id" action="" method="post">
                <h4>Plazo máximo</h4>
                <p>Cantidad máxima (en días) en los que se permitirá reservar anticipadamente una sala</p>
                <input type="number" id="plazo" name="plazo" value=<?php echo $this->mod_parametros->obtener_plazo();?> class="form-control" min="0"><br>
                <button class="btn btn-success">Guardar</button>
              </form>
            </div>
        </div>
        <div class="tab-pane" id="content_disponibilidad">
          <div class="col-md-12">
            <div class="col-md-4" style="background-color: red;">
              <div id="calendar-disp"></div>
            </div>
            <div class="col-md-8" style="background-color: yellow;">
              <table id="tabla_horarios" border="1" style="table">
                <thead>
                  <tr>
                    <th style="width: 100px;text-align: center;"> Módulo </th>
                    <th style="text-align: center;" data-num-sala="1"> Sala 1 </th>
                    <th style="text-align: center;" data-num-sala="2"> Sala 2 </th>
                    <th style="text-align: center;" data-num-sala="3"> Sala 3 </th>
                    <th style="text-align: center;" data-num-sala="4"> Sala 4 </th>
                    <th style="text-align: center;" data-num-sala="5"> Sala 5 </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $this->db->select('id_mod,h_inicio,h_fin');
                      $this->db->from('modulos');
                      $query = $this->db->get();
                      foreach($query->result() as $row){
                        echo '<tr>';
                        echo '<td data-id-modulo="'.$row->id_mod.'" style="text-align: center;"> '.$row->h_inicio.' - '.$row->h_fin.' </td>';
                        echo '
                          <td class="horario" data-reservado="0"></td>
                          <td class="horario" data-reservado="0"></td>
                          <td class="horario" data-reservado="0"></td>
                          <td class="horario" data-reservado="0"></td>
                          <td class="horario" data-reservado="0"></td>
                        ';
                        echo '</tr>';
                      }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="content_reservas">
            <div class="col-md-3">
              <form id="form_id" action="" method="post">
                <h4>Número de reservas diarias</h4>
                <p>Cantidad máxima de reservas que podrá realizar un alumno</p>
                <input type="number" id="reservas" name="reservas" value=<?php echo $this->mod_parametros->obtener_alumxdia();?> class="form-control" min="1"><br>
                <button class="btn btn-success">Guardar</button>
              </form>
            </div>
        </div>
        <div class="tab-pane" id="content_salas">
            <div class="col-md-3">
              <form id="form_id" action="" method="post">
                <h4>Número de salas</h4>
                <p>Cantidad de salas disponibles para reserva</p>
                <input type="number" id="salas" name="salas" value=<?php echo $this->mod_salas->obtener_salas();?> class="form-control" min="1"><br>
                <button class="btn btn-success">Guardar</button>
              </form>
            </div>
        </div>
      </div>
    </div>
    <footer>

    </footer>
  </section>

  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>js/modernizr.custom.63321.js"></script>
  <script src="<?php echo base_url(); ?>js/bic_calendar.js"></script>
  <script src="<?php echo base_url(); ?>js/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.noty.packaged.min.js"></script>
  <script>
    var hoy = new moment(new Date()).format('D/M/YYYY');
    var monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var dayNames = ["L", "M", "M", "J", "V", "S", "D"];
    var events = [{
      "date": hoy,
      "link": "#",
      "color": "green"
    }];

    $('#calendar-disp').bic_calendar({
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

    $('#tabla_horarios').dataTable({
      "bJQueryUI": false,
      "sDom": '<><t><>',
      "bSort": false
    });
  </script>
</body>
</html>

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
  <style>
  #bic_calendar{
    margin-top: 8px;
    margin-left: -3px;
  }

  #tabla_horarios{
    margin-top: 8px;
    background-color: white;
  }

  #controls{
    margin-top: 4px;
  }

  #controls input{
    margin-bottom: 15px;
  }

  #controls select{
    margin-bottom: 15px;
  }
  </style>
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
              <form id="form_id" action="parametros/ModificarPlazo" method="post">
                <h4>Plazo máximo</h4>
                <p>Cantidad máxima (en días) en los que se permitirá reservar anticipadamente una sala</p>
                <input type="number" id="plazo" name="plazo" value=<?php echo $this->mod_parametros->obtener_plazo();?> class="form-control" min="0"><br>
                <button class="btn btn-success">Guardar</button>
              </form>
            </div>
        </div>
        <div class="tab-pane" id="content_disponibilidad">
          <div class="col-md-12">
            <div class="col-md-4">
              <div id="calendar-disp" data-fecha=""></div>
              <div id="controls">
                <input id="dia_completo" type="checkbox"> Todo el día <br>
                <label for="sala_bloq">Sala</label>
                <select name="sala_bloq" id="sala_bloq">
                <?php
                  $num_salas = $this->mod_salas->obtener_salas();
                  for($i=1;$i<($num_salas+1);$i++){
                    echo '<option value="'.$i.'">Sala '.$i.'</option>';
                  }
                ?>
                </select><br>
                <label for="modulo_inicio">Desde módulo</label>
                <select name="modulo_inicio" id="modulo_inicio">
                <?php
                  $query = $this->mod_modulos->obtener_modulos();
                  foreach($query->result() as $row){
                    echo '<option value="'.$row->id_mod.'">'.$row->inicio.'-'.$row->fin.'</option>';
                  }
                ?>
                </select>
                <label for="modulo_fin"> hasta </label>
                <select name="modulo_fin" id="modulo_fin">
                <?php
                  $query = $this->mod_modulos->obtener_modulos();
                  foreach($query->result() as $row){
                    echo '<option value="'.$row->id_mod.'">'.$row->inicio.'-'.$row->fin.'</option>';
                  }
                ?>
              </select><br>
              <button id="btn_bloquear" action = "disponibilidad/bloquear" class="btn btn-danger">Bloquear</button> <button id="btn_desbloquear" action ="disponibilidad/desbloquear "class="btn btn-success">Desbloquear</button>
              </div>
            </div>
            <div class="col-md-8">
              <table id="tabla_horarios" border="1" style="table">
                <thead>
                  <tr>
                    <th style="width: 100px;text-align: center;"> Módulo </th>
                    <?php

                    for($i=1;$i<($num_salas+1);$i++){
                      echo '<th style="text-align: center;" data-num-sala="'.$i.'"> Sala '.$i.' </th>';
                    }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $query = $this->mod_modulos->obtener_modulos();
                      foreach($query->result() as $row){
                        echo '<tr>';
                        echo '<td class="h_modulo" data-id-modulo="'.$row->id_mod.'" style="text-align: center;"> '.$row->inicio.' - '.$row->fin.' </td>';
                        for($i=1;$i<($num_salas+1);$i++){
                          echo '<td class="horario" data-reservado="0"></td>';
                        }
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
              <form id="form_id" action="parametros/ModificarAlumxdia" method="post">
                <h4>Número de reservas diarias</h4>
                <p>Cantidad máxima de reservas que podrá realizar un alumno</p>
                <input type="number" id="reservas" name="reservas" value=<?php echo $this->mod_parametros->obtener_alumxdia();?> class="form-control" min="1"><br>
                <button class="btn btn-success">Guardar</button>
              </form>
            </div>
        </div>
        <div class="tab-pane" id="content_salas">
            <div class="col-md-3">
              <form id="form_id" action="salas/ModificarSalas" method="post">
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

    document.addEventListener('bicCalendarSelect', function(e) {
      moment.lang('es');
      $('#calendar-disp').data('fecha', new moment(e.detail.date).format('YYYY-MM-DD'));
    });

    actualizarTabla($('#tabla_horarios td'));

    var bloquearModulos = function($sala,$mod_ini,$mod_fin,$tabla){
      if($mod_ini>$mod_fin){
        alert("Seleccione un intervalo válido");
      }
      else{
        if($('#dia_completo').is(':checked')){
          $bandera = 2;
          $('.h_modulo').each(function(i,e){
            $(e).siblings().eq($sala-1).data('reservado',3);
          });
        }
        else{
          $bandera = 1;
          $tabla.each(function(i,elemento){
            if($(this).data('id-modulo')>=$mod_ini && $(this).data('id-modulo')<=$mod_fin){
              $(this).siblings().eq($sala-1).data('reservado',3);
            }
          });
        }
        actualizarTabla($('#tabla_horarios td'));
      }
      $.ajax({
        method: 'POST',
        url: 'disponibilidad/Bloqueo',
        data: {bandera: $bandera , sala_bloq: $sala ,fecha: $('#calendar-disp').data('fecha'),modulo_inicio: $mod_ini, modulo_fin: $mod_fin},
        success: function(data){
            console.log(data);
        }
      });
    };

    var desbloquearModulos = function($sala,$mod_ini,$mod_fin,$tabla){
      if($mod_ini>$mod_fin){
        alert("Seleccione un intervalo válido");
      }
      else{
        if($('#dia_completo').is(':checked')){
          $bandera = 2;
          $('.h_modulo').each(function(i,e){
            $(e).siblings().eq($sala-1).data('reservado',0);
          });
        }
        else{
          $bandera = 1;
          $tabla.each(function(i,elemento){
            if($(this).data('id-modulo')>=$mod_ini && $(this).data('id-modulo')<=$mod_fin){
              $(this).siblings().eq($sala-1).data('reservado',0);
            }
          });
        }
        actualizarTabla($('#tabla_horarios td'));
      }
      $.ajax({
        method: 'POST',
        url: 'disponibilidad/Desbloqueo',
        data: {bandera: $bandera , sala_bloq: $sala ,fecha: $('#calendar-disp').data('fecha'),modulo_inicio: $mod_ini, modulo_fin: $mod_fin},
        success: function(data){
            console.log(data);
        }
      });
    };

    $(document).on('click','#btn_bloquear',function(e){
      e.preventDefault();
      e.stopPropagation()
      bloquearModulos($('#sala_bloq').val(),$('#modulo_inicio').val(),$('#modulo_fin').val(),$('#tabla_horarios td'));
    });

    $(document).on('click','#btn_desbloquear',function(e){
      e.preventDefault();
      e.stopPropagation()
      desbloquearModulos($('#sala_bloq').val(),$('#modulo_inicio').val(),$('#modulo_fin').val(),$('#tabla_horarios td'));
    });
  </script>
</body>
</html>

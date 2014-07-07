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
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bic_calendar.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.css"/>
</head>
<body>
  <section id="container">
    <nav class="navbar navbar-default" role="navigation">
      <div class="">
        <!-- Brand and toggle get grouped for better mobile display -->
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
        <div class="form-wrapper">
          <h4>Agregar Módulo</h4>
          <form id="form_modulo" action="<?php echo site_url('modulos/CrearModulo');?>" method="post" role="form">
            <div class="form-group">
                    <input id="id_mod" name="id_mod" type='number' class="form-control" placeholder="ID Módulo" min="1"/>
            </div>
            <div class="form-group">
              <div class='input-group date' id='hora_inicio' data-date-format="HH:mm">
                    <input type='text' id="h_inicio" name="h_inicio" class="form-control" placeholder="Hora inicial" />
                    <span class="input-group-addon"><span class="fa fa-clock-o"></span>
                    </span>
              </div>
            </div>
            <div class="form-group">
              <div class='input-group date' id='hora_fin'data-date-format="HH:mm">
                    <input type='text' id="h_fin" name="h_fin" class="form-control" placeholder="Hora final" />
                    <span class="input-group-addon"><span class="fa fa-clock-o"></span>
                    </span>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="form-control" name="agregar-modulo" class="btn btn-default" value="">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </aside>
    <section id="main-content">
      <div id="wrapper">
          <table id="tabla_modulos" border="1" style="table">
            <thead>
              <tr>
                <th style="text-align: center;">
                  ID
                </th>
                <th style="text-align: center;">
                  Hora Inicio
                </th>
                <th style="text-align: center;">
                  Hora Fin
                </th>
                <th style="text-align: center;">
                  Eliminar
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $query = $this->mod_modulos->obtener_modulos();
                  foreach($query->result() as $row){
                    echo '<tr>';
                    echo '<td style="text-align: center;">'.$row->id_mod.'</td>';
                    echo '<td style="text-align: center;">'.$row->inicio.'</td><td style="text-align: center;">'.$row->fin.'</td>';
                    echo '<td style="text-align: center;"><a class="btn btn-danger btnEliminar" href="'.site_url('modulos/EliminarModulo').'/'.$row->id_mod.'"><span class="fa fa-trash-o"></span></a></td>';
                    echo '</tr>';
                  }
              ?>
            </tbody>
          </table>
      </div>
    </section>
    <footer>

    </footer>
  </section>
  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>js/modernizr.custom.63321.js"></script>
  <script src="<?php echo base_url(); ?>js/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.min.js"></script>
  <script>
    $('#tabla_modulos').dataTable({
      "sDom": '<><t><>'
    });
    $('#hora_inicio').datetimepicker({pickDate: false});
    $('#hora_fin').datetimepicker({pickDate: false});
  </script>
</body>
</html>

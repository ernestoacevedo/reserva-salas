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
</head>
<body>
  <section id="container">
    <header class="topbar blue-bg">
      <a href="#" class="logo">SIBIB UCM</a>
      <ul class="pull-right">
      <li id="usermenu" class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> Administrador</a>
        <b class="caret"></b>
        <ul class="dropdown-menu">
          <li><a href="#"><span class="fa fa-sign-out"></span> Cerrar sesión </a></li>
        </ul>
      </li>
      </ul>
    </header>
    <aside>
      <div id="sidebar">
        <div class="form-wrapper">
          <h4>Agregar Módulo</h4>
          <form id="form_modulo" action="<?php echo site_url('modulos/nuevo');?>" method="post">
            <input type="text" id="hora_inicio" name="hora_inicio" value="" placeholder="08:00">
            <input type="text" id="hora_fin" name="hora_fin" value="" placeholder="09:00">
            <button type="submit" name="agregar-modulo" class="btn btn-default" value="">Agregar</button>
          </form>
        </div>
      </div>
    </aside>
    <section id="main-content">
      <div id="wrapper">
          <table id="tabla_modulos" border="1" style="table">
            <thead>
              <tr>
                <th>
                  Hora Inicio
                </th>
                <th>
                  Hora Fin
                </th>
                <th>
                  Editar
                </th>
                <th>
                  Eliminar
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  08:00
                </td>
                <td>
                  09:00
                </td>
                <td>
                  <button name="button" class="btn btn-warning"><span class="fa fa-pencil"></span></button>
                </td>
                <td>
                  <button name="button" class="btn btn-danger"><span class="fa fa-trash-o"></span></button>
                </td>
              </tr>
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
  <script>
    $('#tabla_modulos').dataTable();
  </script>
</body>
</html>

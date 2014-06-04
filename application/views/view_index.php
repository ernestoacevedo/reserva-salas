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
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> Usuario </a>
				<b class="caret"></b>
				<ul class="dropdown-menu">
					<li><a href="#"><span class="fa fa-sign-out"></span> Cerrar sesión </a></li>
				</ul>
			</li>
			</ul>
		</header>
		<aside>
			<div id="sidebar">
				<div class="calendar-wrap">
					<div id="calendar"></div>
				</div>
			</div>
		</aside>
		<section id="main-content">
			<div id="wrapper">
				<div id="myScheduler">
					<table id="tabla_horarios" border="1" style="table">
						<thhead>
							<tr>
								<th style="width: 50px;"> Módulo </th>
								<th style="text-align: center;"> Sala 1 </th>
								<th style="text-align: center;"> Sala 2 </th>
								<th style="text-align: center;"> Sala 3 </th>
								<th style="text-align: center;"> Sala 4 </th>
								<th style="text-align: center;"> Sala 5 </th>
							</tr>
						</thhead>
						<tbody>
							<tr>
								<td> 08:00 - 09:00 </td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
							</tr>
							<tr>
								<td> 09:00 - 10:00 </td>
								<td class="horario" data-reservado="1">Guillermo Becerra</td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
							</tr>
							<tr>
								<td> 10:00 - 11:00 </td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
							</tr>
							<tr>
								<td> 11:00 - 12:00 </td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
							</tr>
							<tr>
								<td> 12:00 - 13:00 </td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
							</tr>
							<tr>
								<td> 14:00 - 15:00 </td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
							</tr>
							<tr>
								<td> 15:00 - 16:00 </td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
							</tr>
							<tr>
								<td> 17:00 - 18:00 </td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
								<td class="horario" data-reservado="0"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<footer>

		</footer>
	</section>
	<div id="modal-reserva" class="modal fade">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Reservar Sala</h4>
	      </div>
	      <div class="modal-body">
	        <input type="text" id="rut" name="rut" placeholder="Ingrese el RUT del alumno">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-agregar">Reservar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>js/modernizr.custom.63321.js"></script>
	<script src="<?php echo base_url(); ?>js/bic_calendar.js"></script>
	<script src="<?php echo base_url(); ?>js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>js/custom.js"></script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Sistema de Reserva de Salas</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables_themeroller.css" />
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
								<th> Módulo </th>
								<th> Sala 1 </th>
								<th> Sala 2 </th>
								<th> Sala 3 </th>
								<th> Sala 4 </th>
								<th> Sala 5 </th>
							</tr>
						</thhead>
						<tbody>
							<tr>
								<td> 08:00 - 09:00 </td>
								<td>0</td>
								<td>0</td>
								<td>1</td>
								<td>0</td>
								<td>1</td>
							</tr>
							<tr>
								<td> 09:00 - 10:00 </td>
								<td>1</td>
								<td>1</td>
								<td>0</td>
								<td>1</td>
								<td>0</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<footer>

		</footer>
	</section>
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>js/modernizr.custom.63321.js"></script>
	<script src="<?php echo base_url(); ?>js/bic_calendar.js"></script>
	<script src="<?php echo base_url(); ?>js/custom.js"></script>
</body>
</html>

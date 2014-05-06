<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Sistema de Reserva de Salas</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/calendar.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom_2.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.dataTables_themeroller.css" />
</head>
<body>
	<section id="container">
		<header class="header blue-bg">
			<a href="#" class="logo">SIBIB UCM</a>
		</header>
		<aside>
			<div id="sidebar">
				<div class="custom-calendar-wrap">
					<div id="custom-inner" class="custom-inner">
						<div class="custom-header clearfix">
							<nav>
								<span id="custom-prev" class="custom-prev"></span>
								<span id="custom-next" class="custom-next"></span>
							</nav>
							<h2 id="custom-month" class="custom-month"></h2>
							<h3 id="custom-year" class="custom-year"></h3>
						</div>
						<div id="calendar" class="fc-calendar-container"></div>
					</div>
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
							</tr>
						</thhead>
						<tbody>
							<tr>
								<td> 08:00 - 09:00 </td>
								<td>0</td>
								<td>0</td>
								<td>1</td>
							</tr>
							<tr>
								<td> 09:00 - 10:00 </td>
								<td>1</td>
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
	<script src="<?php echo base_url(); ?>js/jquery.calendario.js"></script>
	<script src="<?php echo base_url(); ?>js/modernizr.custom.63321.js"></script>
	<script src="<?php echo base_url(); ?>js/custom.js"></script>
</body>
</html>
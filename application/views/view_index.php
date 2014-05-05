<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Sistema de Reserva de Salas</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/aui-scheduler-view-week.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/calendar.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom_2.css" />
	<link href="http://cdn.alloyui.com/2.5.0/aui-css/css/bootstrap.min.css" rel="stylesheet"></link>
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
					
				</div>
			</div>
		</section>
		<footer>
			
		</footer>
	</section>
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/aui.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.calendario.js"></script>
	<script src="<?php echo base_url(); ?>js/modernizr.custom.63321.js"></script>
	<script src="<?php echo base_url(); ?>js/custom.js"></script>
</body>
</html>
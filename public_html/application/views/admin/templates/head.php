<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<?php 
		foreach ($gfonts as $key => $value) {
			echo "
			<!--".$key."-->
			<link rel='stylesheet' type='text/css' href='$value' />";
		};
		?>

		<?php 
		foreach ($styles as $key => $value) {
			echo "
			<!--".$key."-->
			<link rel='stylesheet' type='text/css' href='$value' />
			";
		};
		?>

		<?php 
		foreach ($scripts as $key => $value) {
			echo "
			<!--".$key."-->
			<script src='$value'></script>
			";
		};
		?>

		<title>Control Panel</title>
	
	</head>
	<body>
	<div class="container">

		<!-- Push Wrapper -->
		<div class="mp-pusher" id="mp-pusher">

			<nav id="mp-menu" class="mp-menu">
				<?php $this->load->view('admin/templates/nav'); ?>
			</nav>

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">

						<?php $this->load->view('admin/templates/infobar'); ?>

						<article id="content" class="content">
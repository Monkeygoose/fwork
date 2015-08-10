<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,700,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/reset.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/menubar.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/admin.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/spinner.css'); ?>" />
		<script src="<?php echo site_url('resources/js/modernizr.custom.js'); ?>"></script>
		<script src="<?php echo site_url('resources/js/jquery.js'); ?>"></script>
		<title>Control Panel</title>
	
	</head>
	<body>
	<div class="container">

		<!-- Push Wrapper -->
		<div class="mp-pusher" id="mp-pusher">

			<div class="infobar">

				<a href="#" id="trigger" class="menu-trigger icon-fa" style="float: left;">&#xf013;</a>

				<a href="<?php echo base_url();?>index.php/admin" title="Home" class="icon-fa"><span> | </span>&#xf015;</a>

				<a title="New Issue" class="qactbtn icon-fa" style="float: left;" data-loc="<?php echo base_url();?>index.php/issue/create_issue"><span> | </span>&#xf055;</a>

				<a title="View Issues" class="qactbtn icon-fa" style="float: left;" data-loc="<?php echo base_url();?>index.php/issue/view_issues">&#xf02d;<span> | </span></a>

				<a title="New Article" class="qactbtn icon-fa" style="float: left;" data-loc="<?php echo base_url();?>index.php/article/create_article">&#xf055;</a>

				<a title="View Articles" class="qactbtn icon-fa" style="float: left;" data-loc="<?php echo base_url();?>index.php/article/view_articles">&#xf1ea;<span> | </span></a>

				<a title="New Blog Post" class="qactbtn icon-fa" style="float: left;" data-loc="<?php echo base_url();?>index.php/article/create_post">&#xf055;</a>

				<a title="View Blog Posts" class="qactbtn icon-fa" style="float: left;" data-loc="<?php echo base_url();?>index.php/article/view_posts">&#xf14b;<span> | </span></a>

				<p style="float: right;">[ <?php echo $user_name; ?> ]</p>

			</div>

			<nav id="mp-menu" class="mp-menu">
				<?php $this->load->view('admin/templates/nav'); ?>
			</nav>

				<div class="scroller"><!-- this is for emulating position fixed of the nav -->
					<div class="scroller-inner">
						<article id="content" class="content">
							<?php $this->load->view('admin/home');?>
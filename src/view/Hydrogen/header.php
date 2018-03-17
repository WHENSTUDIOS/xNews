<?php

?>
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php if(isset($title)){ echo $title; } else { echo 'xNews'; } ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link rel="shortcut icon" href="favicon.ico">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="styles/Hydrogen/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="styles/Hydrogen/icomoon.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="styles/Hydrogen/magnific-popup.css">
	<!-- Salvattore -->
	<link rel="stylesheet" href="styles/Hydrogen/salvattore.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="styles/Hydrogen/style.css">
	<!-- Modernizr js/Hydrogen -->
	<script src="js/Hydrogen/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
			
	<div id="fh5co-offcanvass">
		<a href="#" class="fh5co-offcanvass-close js/Hydrogen-fh5co-offcanvass-close">Menu <i class="icon-cross"></i> </a>
		<h1 class="fh5co-logo"><a class="navbar-brand" href="index.html">Hydrogen</a></h1>
		<ul>
			<li class="active"><a href="index.html">Home</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="pricing.html">Pricing</a></li>
			<li><a href="contact.html">Contact</a></li>
		</ul>
		<h3 class="fh5co-lead">Connect with us</h3>
		<p class="fh5co-social-icons">
			<a href="#"><i class="icon-twitter"></i></a>
			<a href="#"><i class="icon-facebook"></i></a>
			<a href="#"><i class="icon-instagram"></i></a>
			<a href="#"><i class="icon-dribbble"></i></a>
			<a href="#"><i class="icon-youtube"></i></a>
		</p>
	</div>
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php a('Log In <i class="icon-user"></i>', 'index.php?content=login', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', ''); ?>
					<?php if(basename('index.php')){ a($config['siteName'], '', 'navbar-brand', ''); } else { a($config['siteName'], 'index.php?content=index', 'navbar-brand', ''); } ?>
				</div>
			</div>
		</div>
	</header>
	<!-- END .header -->
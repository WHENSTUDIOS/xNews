<?php

require 'lib/requests.php';

?>
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php if (isset($title)) {echo $title;} else {echo 'xNews';}?></title>
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

	<!-- TEXT EDITOR -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://cdn.wysibb.com/js/jquery.wysibb.min.js"></script>
	<link rel="stylesheet" href="http://cdn.wysibb.com/css/default/wbbtheme.css" />

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="styles/Hydrogen/animate.css">
	<link rel="stylesheet" href="styles/Hydrogen/icomoon.css">
	<link rel="stylesheet" href="styles/Hydrogen/magnific-popup.css">
	<link rel="stylesheet" href="styles/Hydrogen/salvattore.css">
	<link rel="stylesheet" href="styles/Hydrogen/style<?php if ($cookie->content('themeMode') === 'light') {echo '';} elseif ($cookie->content('themeMode') === 'dark') {echo '-dark';}?>.css">
	<script src="js/Hydrogen/modernizr-2.6.2.min.js"></script>

	</head>
	<body>

	<div id="fh5co-offcanvass">
					<?php a('Log In <i class="icon-user"></i>', 'index.php?content=login', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');?>
					<?php if (basename('index.php')) {a($config['siteName'], '', 'navbar-brand', '');} else {a($config['siteName'], 'index.php?content=index', 'navbar-brand', '');}?>
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
					<?php
if ($name === 'register') {a('Log In <i class="icon-user"></i>', 'index.php?content=login', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');} elseif ($name === 'login') {a('Register <i class="icon-user"></i>', 'index.php?content=register', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');}
if (isset($_SESSION['username'])) {
    switch ($userdata->getLevel()) {
        case 0:
            a('<span class="label label-default">Banned</span> ' . $userdata->getUsername() . ' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
            break;
        case 2:
            a('<span class="label label-info">Editor</span> ' . $userdata->getUsername() . ' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
            break;
        case 3:
            a('<span class="label label-success">Moderator</span> ' . $userdata->getUsername() . ' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
            break;
        case 4:
            a('<span class="label label-danger">Admin</span> ' . $userdata->getUsername() . ' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
            break;
        default:
            a($_SESSION['username'] . ' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
            break;
    }
}if ($name !== 'register' && $name !== 'login' && !isset($_SESSION['username'])) {a('Log In <i class="icon-user"></i>', 'index.php?content=login', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');}?>
					<?php a($config['siteName'], 'index.php?content=index', 'navbar-brand', '');?>
				</div>
			</div>
		</div>
	</header>
	<!-- END .header -->
	<?php if (isset($login) && !isset($_SESSION['username'])) {
    if ($login === true) {
        echo '<center>
			<h2>You must be logged in to do that!</h2>
			<br>
				<div class="form-group">
					<a class="btn btn-primary" href="index.php?content=login">LOG IN</a>
				</div>
			</center>';
        require 'view/Hydrogen/footer.php';
        die;

    }
}

if (isset($level)) {
    if (isset($_SESSION['username'])) {
        if ($userdata->getLevel() < $level) {
            echo '<div id="fh5co-main">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<center><h1 class="error">Unauthorized!</h1>
									<div class="fh5co-spacer fh5co-spacer-sm"></div>
									<form action="#">
										<div class="row">
											<div class="col-md-12">
												<h3>You are not authorized to access this page.</h3>
											</div>
										</div></center>
									</form>

								</div>

							</div>
					   </div>
					</div>';
            require 'view/Hydrogen/footer.php';
            die;
        }
    }
}
if ($u !== null) {
    if ($userdata->getLevel() === '0') {
        echo '<div id="fh5co-main">
			<div class="container">';
        _error('This user is currently banned from viewing or posting in ' . $config['siteName'] . '.');
        require 'view/Hydrogen/footer.php';
        die;
    }
}
?>
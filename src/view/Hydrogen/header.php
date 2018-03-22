<?php

function init($title, $name, $reqLogin){
	$title = $title;
	$name = $name;
	$reqLogin = $reqLogin;
}

if ($u !== null) {
    $query = $mysqli->query("SELECT * FROM users");
    if ($query) {
        while ($elev_rows = $query->fetch_assoc()) {
			$_SESSION['level'] = $elev_rows['level'];
        }
    } else {
        _error('Failed to get user elevation');
        die;
    }
}
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
	<link rel="stylesheet" href="styles/Hydrogen/style<?php if($_COOKIE['themeMode'] === 'light'){ echo ''; }elseif($_COOKIE['themeMode'] === 'dark'){ echo '-dark'; } ?>.css">
	<script src="js/Hydrogen/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
			
	<div id="fh5co-offcanvass">
					<?php a('Log In <i class="icon-user"></i>', 'index.php?content=login', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', ''); ?>
					<?php if(basename('index.php')){ a($config['siteName'], '', 'navbar-brand', ''); } else { a($config['siteName'], 'index.php?content=index', 'navbar-brand', ''); } ?>
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
					if(isset($mode)){
						if($mode === 'register.php'){ a('Log In <i class="icon-user"></i>', 'index.php?content=login', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', ''); } elseif($mode === 'login.php'){ a('Register <i class="icon-user"></i>', 'index.php?content=register', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', ''); }
					} elseif(isset($_SESSION['username'])){
						switch($_SESSION['level']){
							case 0:
								a('<span class="label label-default">Banned</span> '.$_SESSION['username'].' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
								break;
							case 2:
								a('<span class="label label-info">Editor</span> '.$_SESSION['username'].' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
								break;
							case 3:
								a('<span class="label label-success">Moderator</span> '.$_SESSION['username'].' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
								break;
							case 4:
								a('<span class="label label-danger">Admin</span> '.$_SESSION['username'].' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
								break;
							default:
								a($_SESSION['username'].' <i class="icon-user"></i>', 'index.php?content=dashboard', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', '');
								break;
						}
					} else { a('Log In <i class="icon-user"></i>', 'index.php?content=login', 'fh5co-menu-btn js/Hydrogen-fh5co-menu-btn', ''); } ?>
					<?php a($config['siteName'], 'index.php?content=index', 'navbar-brand', ''); ?>
				</div>
			</div>
		</div>
	</header>
	<!-- END .header -->
	<?php if($reqLogin === true){
		echo '<center><h2>You must be logged in to do that!</center></h2>';
		require('view/Hydrogen/footer.php');
		die;
	}
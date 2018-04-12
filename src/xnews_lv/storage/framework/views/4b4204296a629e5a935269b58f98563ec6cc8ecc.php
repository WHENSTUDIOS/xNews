<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $__env->yieldContent('title'); ?></title>
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
	<link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/icomoon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/salvattore.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
	<script src="<?php echo e(asset('js/modernizr-2.6.2.min.js')); ?>"></script>

	</head>
	<body>
    <div id="fh5co-offcanvass">

	</div>
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    <?php if(Request::is('login')): ?>
                    <a href="<?php echo e(url('register')); ?>" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn">Register  <i class="icon-user"></i></a>
                    <?php elseif(Request::is('register')): ?>
                    <a href="<?php echo e(url('login')); ?>" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn">Log In  <i class="icon-user"></i></a>
					<?php elseif(!Auth::guest()): ?>
						<?php switch(Auth::user()->level):
							case (0): ?>
							<a href="<?php echo e(url('dashboard')); ?>" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn"><span class="label label-default">Banned</span> <?php echo e(Auth::user()->name); ?>  <i class="icon-user"></i></a>
							<?php break; ?>
							<?php case (2): ?>
							<a href="<?php echo e(url('dashboard')); ?>" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn"><span class="label label-info">Editor</span> <?php echo e(Auth::user()->name); ?>  <i class="icon-user"></i></a>
							<?php break; ?>
							<?php case (3): ?>
							<a href="<?php echo e(url('dashboard')); ?>" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn"><span class="label label-success">Moderator</span> <?php echo e(Auth::user()->name); ?>  <i class="icon-user"></i></a>
							<?php break; ?>
							<?php case (4): ?>
							<a href="<?php echo e(url('admin')); ?>" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn"><span class="label label-danger">Admin</span> <?php echo e(Auth::user()->name); ?>  <i class="icon-user"></i></a>
							<?php break; ?>
							<?php default: ?>
							<a href="<?php echo e(url('dashboard')); ?>" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn"><?php echo e(Auth::user()->name); ?>  <i class="icon-user"></i></a>
							<?php break; ?>
						<?php endswitch; ?>
					<?php else: ?>
					<a href="<?php echo e(url('login')); ?>" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn">Log In  <i class="icon-user"></i></a>
                    <?php endif; ?>
                     <?php if(Request::is('home')): ?>
                     <a class="navbar-brand"><?php echo e(Config::get('site.data.name')); ?></a>
                     <?php else: ?>
                     <a href="<?php echo e(url('home')); ?>" class="navbar-brand"><?php echo e(Config::get('site.data.name')); ?></a>
                     <?php endif; ?>
				</div>
			</div>
		</div>
	</header>
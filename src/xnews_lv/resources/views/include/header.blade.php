<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
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
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/salvattore.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>

	</head>
	<body>
    <div id="fh5co-offcanvass">

	</div>
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    @if(Request::is('/login'))
                    <a href="register" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn">Register</a>
                    @elseif(Request::is('register'))
                    <a href="login" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn">Log In</a>
                    @endif
                    <a href="login" class="fh5co-menu-btn js/Hydrogen-fh5co-menu-btn">Log In <i class="icon-user"></i></a>
                     @if(Request::is('/home'))
                     <a class="navbar-brand">{{ Config::get('site.data.name') }}</a>
                     @else
                     <a href="home" class="navbar-brand">{{ Config::get('site.data.name') }}</a>
                     @endif
				</div>
			</div>
		</div>
	</header>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Review</title>

	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
	<link href="/assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Loading main css file -->
	<link rel="stylesheet" href="/css/style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
	<![endif]-->
	<header class="site-header">
		<div class="container">
			<a href="index.html" id="branding">
				<img src="/assets/images/logo.png" alt="" class="logo">
				<div class="logo-copy">
					<h1 class="site-title">Company Name</h1>
					<small class="site-description">Tagline goes here</small>
				</div>
			</a> <!-- #branding -->

			<div class="main-navigation">
				<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
				<ul class="menu">
					<li class="menu-item current-menu-item"><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
					<li class="menu-item"><a href="about.html"><i class="fa fa-address-card"></i> About</a></li>
					<li class="menu-item"><a href="review.html"><i class="fa fa-film"></i> Movie reviews</a></li>
					<li class="menu-item"><a href="contact.html"><i class="fa fa-envelope"></i> Contact</a></li>
					@if (Route::has('login'))
						@auth
						<li class="menu-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-user"></i></a></li>
						@else
						<li class="menu-item"><a href="{{ route('login') }}">Log in</a></li>
						@if (Route::has('register'))
						<li class="menu-item"><a href="{{ route('register') }}">Register</a></li>
						@endif
						@endauth
					
					@endif
				</ul> <!-- .menu -->

				<form action="#" class="search-form">
					<input type="text" placeholder="Search...">
					<button><i class="fa fa-search"></i></button>
				</form>
			</div> <!-- .main-navigation -->

			<div class="mobile-navigation"></div>
		</div>
	</header>
</head>
<body>
	@yield('content')
</body>

<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">About Us</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tempore vitae mollitia nesciunt saepe cupiditate</p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">Recent Review</h3>
					<ul class="no-bullet">
						<li><a href="#">Lorem ipsum dolor</a></li>
						<li><a href="#">Sit amet consecture</a></li>
						<li><a href="#">Dolorem respequem</a></li>
						<li><a href="#">Invenore veritae</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">Help Center</h3>
					<ul class="no-bullet">
						<li><a href="#">Lorem ipsum dolor</a></li>
						<li><a href="#">Sit amet consecture</a></li>
						<li><a href="#">Dolorem respequem</a></li>
						<li><a href="#">Invenore veritae</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">Join Us</h3>
					<ul class="no-bullet">
						<li><a href="#">Lorem ipsum dolor</a></li>
						<li><a href="#">Sit amet consecture</a></li>
						<li><a href="#">Dolorem respequem</a></li>
						<li><a href="#">Invenore veritae</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">Social Media</h3>
					<ul class="no-bullet">
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Google+</a></li>
						<li><a href="#">Pinterest</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">Newsletter</h3>
					<form action="#" class="subscribe-form">
						<input type="text" placeholder="Email Address">
					</form>
				</div>
			</div>
		</div> <!-- .row -->

		<div class="colophon">Copyright 2014 Company name, Designed by Themezy. All rights reserved</div>
	</div> <!-- .container -->

</footer>
</div>
<!-- Default snippet for navigation -->



<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/js/plugins.js"></script>
<script src="/assets/js/app.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Reviews</title>

	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
	<link href="/assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Loading main css file -->
	<link rel="stylesheet" href="/css/style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
	<![endif]-->
	<header class="site-header">
		<div class="container">
			<a href="/" id="branding">
				@if($setting->logo)
				<img src="{{asset($setting->logo)}}" style="width: 50px; position: relative; top: -5px" alt="" class="logo">
				@endif
				<div class="logo-copy">
					<h1 class="site-title">{{$setting->logotext}}</h1>
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
					<li class="menu-item">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							@if(auth()->user()->type=='admin')
							<a class="dropdown-item" href="/adminpanel">Adminpanel</a>
							@endif
							<a class="dropdown-item" href="/dashboard">Dashboard</a>
							<div class="border-t border-gray-100"></div>
							<!-- Authentication -->
							<form method="POST" action="{{ route('logout') }}">
								@csrf
								<x-jet-dropdown-link href="{{ route('logout') }}"
								onclick="event.preventDefault();
								this.closest('form').submit();">
								{{ __('Log Out') }}
							</x-jet-dropdown-link>
						</form>
					</div>
				</li>
				@else
				<li class="menu-item"><a href="/login"><i class="fa fa-login"></i> Login</a></li>
				@endauth
				@endif
				@auth
				@else
				@if(Route::has('register'))
				<li class="menu-item"><a href="/login"><i class="fa fa-login"></i> Register</a></li>
				@endif
				@endauth

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
			<div class="col-md-4">
				<div class="widget">
					<h3 class="widget-title">About Us</h3>
					<p>{{Str::limit($setting->about,100)}}</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="widget">
					<h3 class="widget-title">Contact Us</h3>
					<p>{{Str::limit($setting->contact,100)}}</p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">Writers</h3>
					<ul class="no-bullet">
						<li><a href="#">Hüseyin Ünlü</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<div class="widget">
					<h3 class="widget-title">Social Media</h3>
					<ul class="no-bullet">
						@foreach($socials as $social)
						<li><a style=" font-size: 110%;" href="http:\\{{$social->link}}"><i class="{{$social->icon}}" style="float: left; width: 20px;"></i> {{$social->title}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div> <!-- .row -->
		<div class="colophon">{{$setting->copyright}}</div>
	</div> <!-- .container -->
</footer>
</div>
<!-- Default snippet for navigation -->



<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/js/plugins.js"></script>
<script src="/assets/js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
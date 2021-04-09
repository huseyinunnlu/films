@extends('frontend.master')
@section('content')
<div id="site-content">
	<main class="main-content">
		<div class="container">
			<div class="page">
				<div class="row">
					<div class="col-md-9">
						<h2>Popular Movies</h2>
						<div class="slider">
							<ul class="slides">
								@foreach($postsindex as $key=>$pindex)
								@if($key>=0 && $key<=4)
								<li>
									<a href="{{$pindex->slug}}"><img src="{{asset($pindex->banner)}}" style="height: 478px;" alt="Slide 1"></a>
									<span style="font-size: 1.2rem; color: #fff; position: relative; top: -6rem; left: 3rem;" class="badge badge-primary">{{$pindex->title}}</span>
								</li>
								@endif
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<h2>Most Viewed</h2>
						<div class="row">
							@foreach($postsmost as $key=>$pmost)
							@if($key>=0 && $key<=1)
							<div class="col-sm-6 col-md-12">
								<div class="latest-movie">
									<a href="{{$pindex->slug}}"><img src="{{asset($pmost->banner)}}"  style="height: 225px;" alt="Movie 1"></a>
								</div>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				<!-- .row -->
				
				<h2>Lastest Added</h2>
				<div class="row">
					@foreach($postslast as $key=>$plast)
					@if($key>=0 && $key<=3)
					<div class="col-sm-6 col-md-3">
						<div class="latest-movie">
							<a href="{{$plast->slug}}"><img src="{{asset($plast->banner)}}" alt="Movie 3" style="height: 225px;"></a>
						</div>
					</div>
					@endif
					@endforeach
				</div> <!-- .row -->

				<div class="row">
					<div class="col-md-4">
						<h2 class="section-title">December premiere</h2>
						<p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
						<ul class="movie-schedule">
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
						</ul> <!-- .movie-schedule -->
					</div>
					<div class="col-md-4">
						<h2 class="section-title">November premiere</h2>
						<p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
						<ul class="movie-schedule">
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
						</ul> <!-- .movie-schedule -->
					</div>
					<div class="col-md-4">
						<h2 class="section-title">October premiere</h2>
						<p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
						<ul class="movie-schedule">
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
							<li>
								<div class="date">16/12</div>
								<h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
							</li>
						</ul> <!-- .movie-schedule -->
					</div>
				</div>
			</div>
		</div> <!-- .container -->
	</main>
</div>
@endsection
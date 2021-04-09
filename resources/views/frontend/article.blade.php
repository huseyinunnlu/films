@extends('frontend.master')
@section('content')
<div id="site-content">
	<main class="main-content">
		<div class="container">
			<div class="page">
				<div class="row">
					<div class="col-md-9">
						<div class="head">
							<div class="title">
								<h3>{{$post->title}} </h3>
								<span><i class="fa fa-eye"></i> {{$post->views}}</span>
							</div>
							<div class="header">
								<img src="{{asset($post->banner)}}" class="banner">
								<iframe style="	width: 70%;height: 430px;" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
							</div>
						</div>
						<div class="body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Gallery</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="actor-tab" data-toggle="tab" href="#actor" role="tab" aria-controls="actor" aria-selected="false">Actors</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<p>{!!$post->desc!!}</p>
								</div>

								<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
									@foreach($galleries as $gallery)
									@if($gallery->type=='image')
									<img src="{{asset($gallery->url)}}">
									@else
									<iframe src="{{asset($gallery->url)}}"></iframe>
									@endif
									@endforeach
								</div>
								<div class="tab-pane fade" id="actor" role="tabpanel" aria-labelledby="actor-tab">
									<table class="table table-bordered">
										<thead>
											@foreach($actors as $actor)
											<tr>
												<th scope="col"><img src="{{asset($actor->actor->image)}}" style="width: 50px; height: 50px; border-radius: 50%;"></th>
												<th scope="col">{{$actor->actor->name_surname}}</th>
												<th scope="col">
													<span class="badge badge-primary">{{$actor->role}}</span>
												</th>
											</tr>
											@endforeach
										</thead>
									</table>
								</div>
							</div>
						</div>	

						<div class="review" style="margin-top: 150px">
							@auth
							@if($errors->any())
							<div class="alert alert-danger container">    
								@foreach($errors->all() as $error)
								<li>{{$error}}</li>
								@endforeach
							</div>
							@endif
							@if(session('success'))
							<div class="alert alert-success container">    
								{{session('success')}}
							</div>
							@endif
							<form action="{{route('review.create')}}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
											<input type="hidden" name="post_id" value="{{$post->id}}">
											<input type="hidden" name="type" @if(auth()->user()->type=='writer') value="1" @else value="2" @endif>
											<label>Name Surname</label> 
											@if(auth()->user()->type=='writer')
											<small>(Writer Review)</small>@endif
											<input class="form-control" type="text" value="{{auth()->user()->name}}" readonly>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Review</label>
											<textarea class="form-control" id="review" name="review">{!!old('review')!!}</textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<button class="btn btn-primary btn-sm">Add Comment</button>
										</div>
									</div>
								</div>
							</form>
							@else
							<div class="notlogin-border">
								<div class="notlogin-body">
									<p>If you want make a comment you must be regsitered user</p>
									<a href="/login">Login</a> Or <a href="/register">Register</a>
								</div>
							</div>
							@endif
							<div class="reviews">
								@foreach($post->myreview as $myr)
								<div class="card">
									<div class="card-body" style="display: flex;">
										<div class="review-image">
											<img style="width: 50px; margin-right: 10px;" src="{{asset($myr->user->profile_photo_path)}}">
										</div>
										<div class="mt-1 w-100 review-content">
											<span><strong>
												{{$myr->user->name}}
											</strong></span>
											<small>{{$myr->created_at->diffForHumans()}}</small>	

											@if($myr->user_id == auth()->user()->id or auth()->user()->type=='admin')

											<a href="{{route('review.destroy',$myr->id)}}" class="text-primary" style="float: right;"><i class="fa fa-times"></i></a>

											@endif

											<p class="card-text">{!! $myr->review !!}</p>

										</div>

									</div>
								</div>
								@endforeach

								@foreach($post->wreview as $wr)
								<div class="card">
									<div class="card-body" style="display: flex;">
										<div class="review-image">
											<img style="width: 50px; margin-right: 10px;" src="{{asset($wr->user->profile_photo_path)}}">
										</div>
										<div class="mt-1 w-100 review-content">
											<span><strong>{{$wr->user->name}}</strong></span>
											<small>{{$wr->created_at->diffForHumans()}}</small>	

											@if($myr->user_id == auth()->user()->id or auth()->user()->type=='admin')

											<a href="{{route('review.destroy',$wr->id)}}" class="text-primary" style="float: right;"><i class="fa fa-times"></i></a>

											@endif

											<p class="card-text">{!! $wr->review !!}</p>

										</div>

									</div>
								</div>
								@endforeach

								@foreach($post->review as $r)
								<div class="card">
									<div class="card-body" style="display: flex;">
										<div class="review-image">
											<img style="width: 50px; margin-right: 10px;" src="{{asset($r->user->profile_photo_path)}}">
										</div>
										<div class="mt-1 w-100 review-content">
											<span><strong>{{$r->user->name}}</strong></span>
											<small>{{$wr->created_at->diffForHumans()}}</small>	
											@if($myr->user_id == auth()->user()->id or auth()->user()->type=='admin')

											<a href="{{route('review.destroy',$r->id)}}" class="text-primary" style="float: right;"><i class="fa fa-times"></i></a>

											@endif
											<p class="card-text">{!! $r->review !!}</p>

										</div>

									</div>
								</div>
								@endforeach
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</main>
</div>

<style type="text/css">

	.card {
		margin: 15px 0; 
	}
	.notlogin-body {
		text-align: center;
		margin: 35px 0;
	}
	.nav-item {
		color: #84878d;
		width: 33.33%;
		text-align: center;
	}
	.nav-item a{
		height: 100%;
	}
	.title{
		display: flex;
		justify-content: space-between;
	}

	.header{
		display: flex;
		align-items: center;
	}
	.header img{
		width: 30%;
		height: 430px;
	}
	@media only screen and (max-width: 768px) {
		.header img {
			width: 30%;
			height: 300px;
		}
	}
	.header .trailer {
		width: 70%;
	}
</style>
<script type="text/javascript">
	CKEDITOR.replace( 'review' );


</script>
@endsection


@extends('frontend.master')
@section('content')

<div id="site-content">
	<main class="main-content">
		<div class="container">
			<div class="page">
				<div class="row">
					<div class="col-md-3">
						<h2>Filter</h2>
						<div class="search">
							<form action="{{route('movies.filter')}}" method="post">
								@csrf
								<div class="form-group">
									<label>Search By Keyword</label>
									<input class="form-control form-control-sm" type="text" value="{{ old('search') }}" name="search" placeholder="Search Movie or Actor">
								</div>
								<div class="form-group">
									<label>Search By Category</label>
									@foreach($categories as $cat)
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck1" value="{{$cat->id}}" name="category[]">
										<label class="form-check-label" for="gridCheck1">
											{{$cat->title}}
										</label>
									</div>
									@endforeach
								</div>
								<div class="form-group">
									<label>Search By Actor</label>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck1">
										<label class="form-check-label" for="gridCheck1">
											Example checkbox
										</label>
									</div>
								</div>
								<div class="form-group">
									<label>Sort</label>
									<select name="sort" class="form-control form-control-sm">
										<option value="created_at,DESC">Select</option>
										<option value="views,ASC">View(Asc)</option>
										<option value="views,DESC">View(Desc)</option>
										<option value="release_date,ASC">Releasing Date(Asc)</option>
										<option value="release_date,DESC">Releasing Date(Desc)</option>
									</select>
								</div>
								<div class="form-group">
									<button class="btn btn-primary btn-sm" style="width: 100%;">Search</button>
									<a href="{{route('movies')}}" class="btn btn-danger btn-sm mt-2" style="width: 100%;">Clear</a>
								</div>
								@if(\Request::get('search'))
								<span class="badge badge-info">{{\Request::get('search')}}</span>
								@endif
								@if(\Request::get('sort'))
								<span class="badge badge-info">{{\Request::get('sort')}}</span>
								@endif
							</form>
						</div>
					</div>
					<div class="col-md-9">
						<h2 class="title">Popular Movies</h2>
						<div class="card-deck">
							<div class="row">
								@foreach($posts as $key=>$post)
								@if($key>=0 && $key<=2)
								<div class="card col-md-4">
									<a href="{{route('movies.article',$post->slug)}}">
									<img class="card-img-top" src="{{asset($post->banner)}}" style="height:330px;" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">{{$post->title}}</h4>
										<p class="card-text">
											<div class="badges">
												<span class="badge badge-primary"><i class="fa fa-eye"></i> ({{$post->views}})</span>
												<span class="badge badge-primary"><i class="fa fa-star"></i></span>
											</div>
										</p>
										<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
									</div>
								</a>
								</div>
								@endif
								@endforeach
							</div>
							<div class="row mt-3">
								@foreach($posts as $key=>$post)
								@if($key>=3 && $key<=5)
								<div class="card col-md-4">
									<a href="{{route('movies.article',$post->slug)}}">
									<img class="card-img-top" src="{{asset($post->banner)}}" style="height:330px;" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">{{$post->title}}</h4>
										<p class="card-text">
											<div class="badges">
												<span class="badge badge-primary"><i class="fa fa-eye"></i>({{$post->views}})</span>
												<span class="badge badge-primary"><i class="fa fa-star"></i></span>
											</div>
										</p>
										<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
									</div>
									</a>
								</div>
								@endif
								@endforeach
							</div>
							<div class="row mt-3">
								@foreach($posts as $key=>$post)
								@if($key>=6 && $key<=8)
								<div class="card col-md-4">
								<a href="{{route('movies.article',$post->slug)}}">
									<img class="card-img-top" src="{{asset($post->banner)}}" style="height:330px;" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">{{$post->title}}</h4>
										<p class="card-text">
											<div class="badges">
												<span class="badge badge-primary"><i class="fa fa-eye"></i>({{$post->views}})</span>
												<span class="badge badge-primary"><i class="fa fa-star"></i></span>
											</div>
										</p>
										<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
									</div>
									<a href="">
								</div>
								@endif
								@endforeach
							</div>
						</div>
						{{$posts->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
</div>

<style type="text/css">
	.title{
		display: block;
		text-align: center;
	}

	.form-check input{
		position: relative;
		top: 1px;
	}
	.paginate{
		height: 10px;
	}

	.badges {
		display: flex;
		justify-content: space-between;
	}
	a{
		color: #84878d;
	}
</style>
@endsection
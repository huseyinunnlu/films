@extends('frontend.master')
@section('content')
<div id="site-content">
	<main class="main-content">
		<div class="container">
			<div class="page">
				<div class="row">
					<div class="col-md-8">
						<h2 style="text-align: center;">Contact Us</h2>
						<p>{{$setting->contact}}</p>
					</div>
					<div class="col-md-4">
						<h2 style="text-align: center;">Send us a message</h2>
						@if($errors->any())
						<div class="alert alert-danger">    
							@foreach($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</div>
						@endif
						@if(session('success'))
						<div class="alert alert-success">
							{{session('success')}}
						</div>
						@endif
						<form action="{{route('contact.store')}}" method="POST">
							@csrf
							@auth
							<div class="form-group">
								<label for="exampleInputEmail1">Name Surname</label> - <small>(Logged in)</small>
								<input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="{{auth()->user()->name}}" readonly>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label> - <small>(Logged in)</small>
								<input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Name" value="{{auth()->user()->email}}" readonly>
							</div>
							@else
							<div class="form-group">
								<label for="exampleInputEmail1">Name Surname</label>
								<input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Name" value="{{old('name')}}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Email" value="{{old('email')}}">
							</div>
							@endif
							<div class="form-group">
								<label for="exampleInputEmail1">Message</label> - <small>Please Don't be rude !</small>
								<textarea class="form-control" placeholder="Enter Message" name="message" rows="5">{{old('message')}}</textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary"> Send </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- .container -->
	</main>
</div>
@endsection
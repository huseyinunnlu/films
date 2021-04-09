<x-app-layout>
	<div class="container">
		<div class="row">
			@if(Route::currentRouteName()=='actor.edit')
			<div class="col-md-4">
				<h3 class="m-3">Update Actor - {{$actor->name_surname}}</h3>
				<form action="{{route('actor.update',$actor->id)}}" method="POST" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="form-label" for="customFile">Actor Image</label>
								<input type="file" class="form-item" name="image">
								<img src="{{asset($actor->image)}}" style="width: 50px;">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Actor Name,Surname</label>
								<input class="form-control" type="text" value="{{$actor->name_surname}}" name="name_surname">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Actor Birthdate</label>
								<input class="form-control" type="date" value="{{ date('Y-m-d', strtotime($actor->birthdate)) }}" name="birthdate">
							</div>
						</div>
					</div>
					<button class="btn btn-success">Add Actor</button>
				</form>
			</div>
			@else
			<div class="col-md-4">
				<h3 class="m-3">Add Actor</h3>
				<form action="{{route('actor.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="form-label" for="customFile">Actor Image</label>
								<input type="file" class="form-control" name="image"/>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Actor Name,Surname</label>
								<input class="form-control" type="text" name="name_surname">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Actor Birthdate</label>
								<input class="form-control" type="date" name="birthdate">
							</div>
						</div>
					</div>
					<button class="btn btn-success">Add Actor</button>
				</form>
			</div>
			@endif
			<div class="col-md-8">
				<h3 class="m-3">Gallery - <a href="{{url('adminpanel')}}" class="btn btn-primary btn-sm">Go Back</a></h3>
				<div class="row">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Name Surname</th>
								<th scope="col">BirthDate</th>
								<th scope="col">Create Date</th>
								<th scope="col">Upade Date</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach($actors as $actor)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td><img src="{{asset($actor->image)}}" style="width: 50px;height: 50px; border-radius: 50%;"><a href="{{asset($actor->image)}}" target="_blank">(see)</a></td>
								<td>{{$actor->name_surname}}<br>{{$actor->slug}} <a href="{{route('actor.edit',$actor->id)}}">(edit)</a></td>
								<td>{{$actor->birthdate[0]}}</td>
								<td>{{$actor->created_at->diffForHumans()}}</td>
								<td>
									@if($actor->updated_at==$actor->created_at)
									- @else
									{{$actor->updated_at->diffForHumans()}}
									@endif
								</td>
								<td>
									<a href="{{route('actor.destroy',$actor->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</x-app-layout>


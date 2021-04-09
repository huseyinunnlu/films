<x-app-layout>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h3 class="m-3">Add Actor to {{$post->title}}</h3>
				<form action="{{route('post.actor.store',$post->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="form-label" for="customFile">Post Id</label>
								<input type="text" class="form-control" value="{{$post->id}}" name="post_id" readonly />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Select Actor</label>
								<select name="actor_id" class="form-control">
									@foreach($actors as $actor)
									<option value="{{$actor->id}}"><img src="{{asset($actor->image)}}"> {{$actor->name_surname}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="form-label">Role Name,Surname</label>
								<input type="text" class="form-control" name="rolename"/>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Select Role Type</label>
								<select name="role" class="form-control">
									<option value="lead">Lead Character</option>
									<option value="supporting">Supporting Character</option>
									<option value="bit">Bit Character</option>
									<option value="cameo">Cameo Character</option>
									<option value="extras">Extra Character</option>
									<option value="stunt">Stunt Character</option>
								</select>
							</div>
						</div>
					</div>
					<button class="btn btn-success">Add Actor</button>
				</form>
			</div>
			
			<div class="col-md-8">
				<h3 class="m-3">Gallery - <a href="{{url('adminpanel')}}" class="btn btn-primary btn-sm">Go Back</a></h3>
				<div class="row">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Name Surname</th>
								<th scope="col">Role Name</th>
								<th scope="col">Role Type</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach($postActors as $postactor)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td><img src="{{asset($postactor->actor->image)}}" style="width: 50px;height: 50px; border-radius: 50%;"><a href="{{asset($actor->image)}}" target="_blank">(see)</a></td>
								<td>{{$postactor->actor->name_surname}}<br>{{$actor->slug}}</td>
								<td>{{$postactor->rolename}}</td>
								<td>{{$postactor->role}}</td>
								<td>
									<a href="{{route('post.postactor.destroy',[$postactor->post_id,$postactor->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</x-app-layout>


<x-app-layout>
	<div class="container">
		<h3 class="m-3">All Posts - <a href="{{route('post.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create New Post</a></h3>
		<div class="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th style="width: 15px;" scope="col">Title</th>
						<th scope="col">Slug</th>
						<th scope="col">Status</th>
						<th scope="col">Categories</th>
						<th scope="col">Rate</th>
						<th scope="col">Release Date</th>
						<th scope="col">Create Date</th>
						<th scope="col">Update Date</th>
						<th scope="col">Oprt</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<th scope="row">{{$loop->iteration}}</th>
						<td>
							<a href="{{asset($post->banner)}}" target="_blank"><img src="{{asset($post->banner)}}"></a><br>
							<a href="{{route('post.edit',$post->id)}}">{{$post->title}}</a>
						</td>
						<td>{{$post->slug}}</td>
						<td>
							@if($post->category_count==0)
							<span class="badge badge-warning">No Category <br>(Inactive)</span>
							@elseif($post->status=='active')
							<span class="badge badge-success">Active</span>
							@else
							<span class="badge badge-danger">Inactive</span>
							@endif
						</td>
						<td>
							<a href="{{route('post.categories',$post->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-gear"></i> Categories</a>
						</td>
						<td>**** (4.5)</td>
						<td>{{$post->release_date}}</td>
						<td>{{$post->created_at->diffForHumans()}}</td>
						<td>{{$post->updated_at->diffForHumans()}}</td>
						<td>
							<a href="{{route('post.actors',$post->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-user"></i></a>
							<a href="{{route('post.gallery',$post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-camera"></i></a>
							<a href="#" class="btn btn-success btn-sm"><i class="fa fa-envelope"></i></a>
							<a href="{{route('post.destroy',$post->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{$posts->links()}}
		</div>
	</div>
</x-app-layout>


<x-app-layout>
	<div class="container">
		<h3 class="m-3">Add Category For {{$post->title}} - <a href="{{route('post.index')}}" class="btn-sm btn btn-primary">Go Back</a></h3>
		<form action="{{route('post.category.create',$post->id)}}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Post Id</label>
						<input class="form-control" value="{{$post->id}}" name="post_id" readonly>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Select Category</label>
						<select name="cat_id" class="form-control">
							@foreach($categories as $cat)
							<option value="{{$cat->id}}">{{$cat->title}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<button class="btn btn-success">Add Category</button>
		</form>
		<h3 class="m-3">Categoies</h3>
		<div class="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Post Id</th>
						<th scope="col">Category Id</th>
						<th scope="col">Category Title</th>
						<th scope="col">Oluşturma Tarihi</th>
						<th scope="col">Güncelleme Tarihi</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($postcategories as $pcat)
					<tr>
						<th scope="row">{{$loop->iteration}}</th>
						<td>{{$pcat->post_id}}</td>
						<td>{{$pcat->cat_id}}</td>
						<td>{{$pcat->title}}</td>
						<td>{{$pcat->created_at ? $pcat->created_at->diffForHumans() : '-'}}</td>
						<td>{{$pcat->updated_at ? $pcat->updated_at->diffForHumans() : '-'}}</td>
						<td>
							<a href="{{route('post.category.destroy',$pcat->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</x-app-layout>


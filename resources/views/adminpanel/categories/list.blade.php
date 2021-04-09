<x-app-layout>
	<div class="container">
		<h3 class="m-3">Categoies - <a href="{{route('category.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Category</a> <a href="{{url('adminpanel')}}" class="btn btn-primary btn-sm">Go Back</a></h3>
		<div class="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Slug</th>
						<th scope="col">Status</th>
						<th scope="col">Oluşturma Tarihi</th>
						<th scope="col">Güncelleme Tarihi</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $cat)
					<tr>
						<th scope="row">{{$loop->iteration}}</th>
						<td><a href="{{route('category.edit',$cat->id)}}">{{$cat->title}}</a></td>
						<td>{{$cat->slug}}</td>
						<td>@if($cat->status=='active')
							<span class="badge badge-success">Active</span>
							@else
							<span class="badge badge-danger">Inactive</span>
							@endif
						</td>
						<td>{{$cat->created_at ? $cat->created_at->diffForHumans() : '-'}}</td>
						<td>{{$cat->updated_at ? $cat->updated_at->diffForHumans() : '-'}}</td>
						<td>
							<a href="{{route('category.destroy',$cat->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</x-app-layout>


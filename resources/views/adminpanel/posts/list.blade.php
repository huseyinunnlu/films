<x-app-layout>
	<div class="container">
		<h3 class="m-3">All Posts - <a href="{{route('post.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create New Post</a></h3>
		<div class="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Slug</th>
						<th scope="col">Status</th>
						<th scope="col">Type</th>
						<th scope="col">Rate</th>
						<th scope="col">Release Date</th>
						<th scope="col">Create Date</th>
						<th scope="col">Update Date</th>
						<th scope="col">Oprt</th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<th scope="row">1</th>
						<td>
							<img src="#"><br>
							<a href="#">Teminator 1</a>
						</td>
						<td>terminator-1</td>
						<td>
							<span class="badge badge-success">Active</span>
							<span class="badge badge-danger">Inactive</span>
						</td>
						<td>Action</td>
						<td>**** (4.5)</td>
						<td>25.03.2021</td>
						<td>25.03.2021</td>
						<td>25.03.2021</td>
						<td>
							<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-user"></i></a>
							<a href="#" class="btn btn-info btn-sm"><i class="fa fa-camera"></i></a>
							<a href="#" class="btn btn-success btn-sm"><i class="fa fa-envelope"></i></a>
							<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>
</x-app-layout>


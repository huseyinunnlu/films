<x-app-layout>
	<x-slot name="header">Update Category - <a href="{{route('category.index')}}" class="btn btn-info btn-sm">Go Back</a></x-slot>
	<div class="card">
		<div class="card-body container">
			<form method="post" action="{{route('category.update',$category->id)}}">		
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" id="exampleInputEmail1" value="{{$category->title}}" name="title">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label>Slug</label><small class="ml-2">(Readonly)</small>
							<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$category->slug}}">
						</div>
					</div>
				</div>
				<div class="row">		
					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Status</label>
							<select class="form-control" name="status" id="exampleFormControlSelect1">
								@if($category->status)=='active')
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
								@else
								<option value="inactive">Inactive</option>								
								<option value="active">Active</option>
								@endif
							</select>
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<button class="btn btn-primary">Update</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>
<x-app-layout>
	<x-slot name="header">Add Category - <a href="{{route('category.index')}}" class="btn btn-info btn-sm">Go Back</a></x-slot>
	<div class="card">
		<div class="card-body container">
			<form method="post" action="{{route('category.store')}}">		
				@csrf
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" id="exampleInputEmail1" value="{{old('title')}}" name="title">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label>Slug</label><small class="ml-2">(Readonly)</small>
							<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="slug-field">
						</div>
					</div>
				</div>
				<div class="row">		
					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Status</label>
							<select class="form-control" name="status" id="exampleFormControlSelect1">
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<button class="btn btn-primary">Create</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>
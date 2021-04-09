<x-app-layout>
	<x-slot name="header">Add Post - <a href="{{route('post.index')}}" class="btn btn-info btn-sm">Go Back</a></x-slot>
	<div class="card">
		<div class="card-body container">
			<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">		
				@csrf
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Banner Image</label>
							<input type="file" class="form-control" name="banner">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" id="exampleInputEmail1" value="{{old('title')}}" name="title">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Slug</label><small class="ml-2">(Readonly)</small>
							<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="slug-field">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<label>Description</label>
							<textarea id="desc" name="desc"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-select">
							<label>Status</label>
							<select name="status">
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Release Date</label>
							<input name="release_date" class="form-control" type="date">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Director</label>
							<input name="director" class="form-control" type="text">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Company</label>
							<input name="company" class="form-control" type="text">
						</div>
					</div>
					
				</div>
				<div class="form-group mt-3">
					<button class="btn btn-success">Create</button>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace('desc');
	</script>
</x-app-layout>
<x-app-layout>
	<x-slot name="header">Add Social Media Link - <a href="{{route('settings.index')}}" class="btn btn-info btn-sm">Go Back</a></x-slot>
	<div class="card">
		<div class="card-body container">
			<form method="post" action="{{route('social.store')}}">		
				@csrf
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="exampleInputEmail1">Social media icon</label>
							<input type="text" class="form-control" id="exampleInputEmail1" value="fa fa-" name="icon">
							<small class="form-text text-muted">Example:fa fa-facebook</small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Social media title</label>
							<input type="text" class="form-control" id="exampleInputEmail1" value="{{old('title')}}" name="title" placeholder="Title">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="exampleInputEmail1">Social media link</label>
							<input type="text" class="form-control" name="link" value="{{old('link')}}" id="exampleInputEmail1" placeholder="Link">
							<small class="form-text text-muted">Example: www.facebook.com</small>
						</div>
					</div>
				</div>
				<div class="row">		
					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleInputEmail1">Status</label>
							<select class="form-control" name="status" id="exampleFormControlSelect1">
								@if(old('status')=='active')
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
							<button class="btn btn-primary">Create</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</x-app-layout>
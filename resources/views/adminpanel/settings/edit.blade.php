<x-app-layout>
	<x-slot name="header">Edit Settings</x-slot>
	<div class="card">
		<div class="card-body container">
			<form method="post" action="{{route('settings.update',$setting->id)}}" enctype="multipart/form-data">		
				@method('PUT')
				@csrf
				<div class="form-group">
					<div class="row">
						<label>Photo</label>
						<div class="col-md-3">	
							@if($setting->logo)
							<img src="{{asset($setting->logo)}}" style="width:150px;">
							@endif					
							<input type="file" name="logo" class="form-control" value="{{asset($setting->logo)}}">
						</div>
						<div class="col-md-5">
							<input type="text" name="logotext" class="form-control" value="{{$setting->logotext}}">
						</div>
						</div>
						<div class="row mt-3">
						<div class="col-md-6">
							<label>Hakkımızda</label><br>
							<textarea class="form-control" id="about" name="about">{{$setting->about}}</textarea>
						</div>
						<div class="col-md-6">
							<label>İletişim</label><br>
							<textarea class="form-control" id="contact" name="contact">{{$setting->contact}}</textarea>
						</div>
						</div>
					
					<div class="form-group">
					<button type="submit" class="btn btn-success btn-sm">Güncelle</button>
				</div>
				</div>
				
			</form>
		</div>
	</div>
    <script>
        CKEDITOR.replace( 'about' );
        CKEDITOR.replace( 'contact' );
    </script>
</x-app-layout>
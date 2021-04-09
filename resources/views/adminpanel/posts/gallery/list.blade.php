<x-app-layout>
	<div class="container">
		<h3 class="m-3">Add Gallery For {{$post->title}}</h3><a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
		<form action="{{route('post.gallery.create',$post->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label>Post Id</label>
						<input class="form-control" value="{{$post->id}}" name="post_id" readonly>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="form-group">
						<label>Gallery Type</label>
						<select class="form-control" name="type" id="send-dist-type">
							<option selected>Select Gallery Type</option>
							<option value="image">Image</option>
							<option value="video">Video</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Url</label>
						<input class="form-control" name="url" id="send-address" type="text" placeholder="Url">
					</div>
				</div>
			</div>
			<button class="btn btn-success">Add Image,Video</button>
	</form>
	<h3 class="m-3">Gallery</h3>
	<div class="row">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Post Id</th>
					<th scope="col">Url</th>
					<th scope="col">Type</th>
					<th scope="col">Oluşturma Tarihi</th>
					<th scope="col">Güncelleme Tarihi</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($gallery as $gal)
				<tr>
					<th scope="row">{{$loop->iteration}}</th>
					<td>{{$gal->post_id}}</td>
					<td>{{$gal->url}} <a href="{{asset($gal->url)}}" __blank>(see)</a></td>
					<td>{{$gal->type}}</td>
					<td>{{$gal->created_at ? $gal->created_at->diffForHumans() : '-'}}</td>
					<td>{{$gal->updated_at ? $gal->updated_at->diffForHumans() : '-'}}</td>
					<td>
						<a href="{{route('post.gallery.destroy',[$gal->post_id,$gal->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	function addressChange() {
		var inputBox = document.getElementById('send-address');
		this.value == 'image' ? inputBox.type = 'file' : inputBox.type = 'text';
	}
	document.getElementById('send-dist-type').addEventListener('change', addressChange);
</script>
</x-app-layout>


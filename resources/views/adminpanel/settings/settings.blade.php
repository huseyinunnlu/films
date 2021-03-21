<x-app-layout>
	<div class="container">
		<h3 class="m-3">Settings</h3>
		<div class="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Logo/Name</th>
						<th scope="col">About Us</th>
						<th scope="col">Contact</th>
						<th scope="col">Oluşturma Tarihi</th>
						<th scope="col">Güncelleme Tarihi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($settings as $setting)
					<tr>
						<th scope="row" style="width: 90px;">{{$loop->iteration}} - <a href="{{route('settings.edit',$setting->id)}}">Edit</a></th>
						<td><a href="{{asset($setting->logo)}}" target="_blank"><img src="{{asset($setting->logo)}}" style="width: 100px; display: block;"></a>/{{$setting->logotext}}</td>
						<td>{{Str::limit($setting->about,100)}}</td>
						<td>{{Str::limit($setting->contact,100)}}</td>
						<td>{{$setting->finished_at ? $setting->finished_at->diffForHumans() : '-'}}</td>
						<td>{{$setting->updated_at ? $setting->updated_at->diffForHumans() : '-'}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<h3 class="m-3">Settings - <a href="{{route('social.create')}}" class="btn btn-primary">Add S.M link</a></h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">İcon</th>
						<th scope="col">Link</th>
						<th scope="col" >Oluşturma Tarihi - Güncelleme Tarihi</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				@foreach($socials as $social)
				<tbody>
					<th scope="row">{{$loop->iteration}}</th>
					<td><a href="{{route('social.edit',$social->id)}}">{{$social->title}}</a></td>
					<td><i class="{{$social->icon}}"></i> {{$social->title}}</td>
					<td><a href="http:\\{{$social->link}}">{{$social->link}}</a></td>
					<td style="width: auto;">{{$social->created_at->diffForHumans() }} - @if($social->updated_at) {{$social->updated_at->diffForHumans() }} @else - @endif </td>
						<th><a href="{{route('social.destroy',$social->id)}}" class="btn btn-danger"><i class="fa fa-times"></i></a></th>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</x-app-layout>


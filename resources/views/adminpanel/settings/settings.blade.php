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
						<td><img src="{{$setting->logo}}">/{{$setting->logotext}}</td>
						<td>{{Str::limit($setting->about,100)}}</td>
						<td>{{Str::limit($setting->contact,100)}}</td>
						<td>{{$setting->finished_at ? $setting->finished_at->diffForHumans() : '-'}}</td>
						<td>{{$setting->updated_at ? $setting->updated_at->diffForHumans() : '-'}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</x-app-layout>


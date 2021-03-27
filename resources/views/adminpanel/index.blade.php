<x-app-layout>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<a href="{{route('settings.index')}}"><h5 class="card-title"><i class="fa fa-gear"></i> Settings</h5></a>
					</div>
					<div class="card-body">
						<a href="{{route('category.index')}}"><h5 class="card-title"><i class="fa fa-plus"></i> Categories</h5></a>
					</div>
					<div class="card-body">
						<a href="{{route('message.index')}}"><h5 class="card-title"><i class="fa fa-envelope"></i> Messages</h5></a>
					</div>
					<div class="card-body">
						<a href="{{route('post.index')}}"><h5 class="card-title"><i class="fa fa-envelope"></i> Posts</h5></a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Button</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>

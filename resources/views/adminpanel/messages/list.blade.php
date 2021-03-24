<x-app-layout>
	<div class="container">
		<h3 class="m-3">Categoies - <a href="{{route('category.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Category</a></h3>
		<div class="row">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Message</th>
						<th scope="col">Oluşturma Tarihi</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($messages as $message)
					<tr>
						<th scope="row">{{$loop->iteration}}</th>
						<td>{{$message->name}}</td>
						<td>{{$message->email}}</td>
						<td><p>{{Str::limit($message->message,40)}}</p></td>
						<td>{{$message->created_at ? $message->created_at->diffForHumans() : '-'}}</td>
						<td>
							<a href="{{route('message.destroy',$message->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
							<button type="button" class="btn btn-primary btn-sm" href="#expand{{$message->id}}" data-toggle="modal">Open Message</button>
						</td>
					</tr>
					<!--Modal-->
					<div class="modal" id="expand{{$message->id}}">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Message Detail</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="form-group">
											<label for="recipient-name" class="col-form-label">Name</label>
											<input type="text" class="form-control" id="recipient-name" readonly="" value="{{$message->name}}">
										</div>
										<div class="form-group">
											<label for="recipient-name" class="col-form-label">Email</label>
											<input type="text" class="form-control" id="recipient-name" readonly="" value="{{$message->email}}">
										</div>
										<div class="form-group">
											<label for="message-text" class="col-form-label">Message:</label>
											<textarea class="form-control" id="message-text" rows="10">{{$message->message}}</textarea>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<a href="{{route('message.destroy',$message->id)}}" class="btn btn-danger btn-sm">Mark As Read</a>
								</div>
							</div>
						</div> 
					</div>  
					<!--Modal Finish-->

					@endforeach
				</tbody>
			</table>
			{{$messages->links()}}

		</div>
	</div>
</x-app-layout>


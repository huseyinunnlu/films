@extends('frontend.master')
@section('content')
<div id="site-content">
	<main class="main-content">
		<div class="container">
			<div class="page">
				<div class="row">
					<div class="col-md-8">
						<h2 style="text-align: center;">About Us</h2>
						<p>{{$setting->about}}</p>
					</div>
				</div>
			</div> <!-- .container -->
		</main>
	</div>
	@endsection
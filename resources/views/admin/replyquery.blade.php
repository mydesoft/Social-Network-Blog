@extends('layouts.master')

@section('title', 'Query_reply')

@section('content')
		
	<div class="container">
		<div class="col-md-6 offset-md-8">
		<form method = "GET" action="/friend">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
					  <input type="text" name="friend" class="form-control" placeholder="Seach User" required>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
					  <button class="btn btn-info"><i class="fa fa-search"></i> Search User</button>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			@include('includes.sidebar')
		</div>


		<div class="col-md-7">
		@include('includes.message')
			<div class="card border-dark">
				<div class="card-header bg-secondary">
					<h5 class="text-white"> Reply {{$user->name}} Query</h5>
				</div>
			

			<div class="card-body">
				<form method = "POST" action="{{route('sendreply', $user->id)}}">
					{{csrf_field()}}
					@foreach($queries as $query)

						<div class="form-group">
							<input type="text" class="form-control" placeholder= "{{$query->message}}" disabled>
						</div>

						<div class="form-group">
							<input type="text" name = "content" class="form-control" placeholder="Enter Reply">
						</div>
						<button class="btn btn-info btn-lg"> Reply</button>
						<br><br>
					@endforeach
					<br>
				</form>
			</div>
		</div>
		
	</div>
</div>

	

@endsection
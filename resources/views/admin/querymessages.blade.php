@extends('layouts.master')

@section('title', 'Queries')

@section('content')
		
	<div class="container">
		@include('includes.message')
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
			<div class="card border-dark">
				<div class="card-header bg-secondary"><h5 class="text-white"> User Queries</h5></div>
			

			<div class="card-body">
				@if($queries->count() > 0)

				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="thead-dark">

							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Query</th>
								<th></th>
								<th></th>

							</tr>
						</thead>

						<tbody>
					
							@foreach($queries as $query)
								<tr>
									<td>{{$query->name}}</td>
									<td>{{$query->email}}</td>
									<td>{{$query->message}}</td>
									<td><a href="/replyquery/{{$query->user->id}}"><button class="btn btn-info btn-sm">Reply</button></a></td>
									<td>
										<a href="{{route('deletequery', $query->id)}}">
											<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>   Delete
										   </button>
										</a>
									</td>
								</tr>
							@endforeach					
						</tbody>
				</table>
				</div>
				@else
				<h4 class="text-center">No User Queries Yet!</h4>

			@endif
			</div>

			</div>
		</div>
		
	</div>
</div>

	

@endsection
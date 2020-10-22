@extends('layouts.master')

@section('title', 'All_Admin')

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


		<div class="col-md-8">
			@include('includes.message')
			<div class="card border-dark">
				<div class="card-header bg-secondary"><h5 class="text-white"> All Admins</h5></div>
			

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="thead-dark">
							<tr>
								
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th></th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							@foreach($users as $user)
								@if(!$user->hasRole())
								@if(Auth::user()->id != $user->id)
									<tr>
										<td>{{$user->name}}</td>
										<td>{{$user->username}}</td>
										<td>{{$user->email}}</td>

										<td>
											<a href="{{route('removeadmin', $user->id)}}"><button class="btn btn-secondary btn-sm"><i class="fa fa-user-circle"></i> Remove Admin</button></a>
										</td>

										<td>
											<a href="{{route('deleteuser', $user->id)}}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete User</button></a>
										</td>	
								
									</tr>
									@endif
								@endif
							@endforeach
								
						</tbody>
				</table>
				</div>
				
			</div>
			</div>
		</div>
		
	</div>
</div>

	

@endsection
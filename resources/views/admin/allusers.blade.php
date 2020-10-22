@extends('layouts.master')

@section('title', 'All_Users')

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
				<div class="card-header bg-secondary"><h5 class="text-white"> Registered Users</h5></div>
			

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="thead-dark">
							<tr>
								<th>Profile Picture</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Location</th>
								<th>Status</th>
								<th></th>
								<th></th>
								
							</tr>
						</thead>

						<tbody>
							@foreach($users as $user)

								@if($user->hasRole())

								<tr>
									<td><img src="{{asset('/storage/profile_picture/'.$user->profile_picture)}}" alt="" width="50"></td>
									<td>{{$user->name}}</td>
									<td>{{$user->username}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->state}}</td>
									
									<td>
										@if($user->isActive())
										<button class="btn btn-secondary btn-sm"><i class="fa fa-check"></i> Active</button>
										@else
										<p class="text-danger">Suspended</p>
										@endif
									</td>

									<td>
									@if($user->isActive())
										<a href="{{route('suspend', $user->id)}}">
										<button class="btn btn-info btn-sm"><i class="fa fa-ban"></i> Suspend</button>
									 </a>
									 @else
										 <p></p>
									 @endif
									</td>

									<td>
									 <a href="{{route('deleteuser', $user->id)}}">
										<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
									 </a>
									</td>
								</tr>
								@endif
							
							@endforeach
						</tbody>
				</table>
				</div>
				<div class="float-right">
					{{$users->links()}}
				</div>
				
			</div>
			</div>
		</div>
		
	</div>
</div>





	

@endsection
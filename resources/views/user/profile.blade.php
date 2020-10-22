@extends('layouts.master')

@section('title', 'My_Profile')

@section('content')
		


	<div class="container">
		@include('includes.message')

		<div class="row">

			<div class="col-md-8">
			<div class="card border-info">
				<div class="card-header" style="background-color:#17a2b8;">
					<h6 class="text-white">Profile Details</h6>
				</div>

				<div class="card-body">
					<form method ="POST" action="{{route('profile.update', Auth::user()->id)}}">
						{{method_field('PATCH')}}
						{{csrf_field()}}

						<div class="form-group">
							<label for="name"><h5>Name</h5></label>
							<input type="text" name ="name" value ="{{Auth::user()->name}}" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="email"><h5>Email</h5></label>
							<input type="email" name="email" value="{{Auth::user()->email}}" class="form-control"required>
						</div>

						<div class="form-group">
							<label for="username"><h5>Username</h5></label>
							<input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" required>
						</div>


						<div class="form-group">
							<button class="btn btn-info">Edit Profile</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card border-info">
				<div class="card-header" style="background-color:#17a2b8;">
					<h6 class="text-white">Put a Profile Picture</h6>
				</div>

				<div class="card-body">

					<div class="text-center">
							<img src="{{asset('storage/profile_picture/'.Auth::user()->profile_picture)}}" class = "img-rounded" width="100">
						</div>

					<form method ="POST" action="/user/pictures/{{Auth::user()->id}}" enctype="multipart/form-data">
						
			
						{{csrf_field()}}

						
						<div class="form-group">
							<input type="file" name ="profile_picture" class="form-control" required>
						</div>


						<div class="form-group text-center">
							<button class="btn btn-info"><i class="fa fa-upload"></i> Upload Picture</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		</div>
	</div>
		
	

@endsection
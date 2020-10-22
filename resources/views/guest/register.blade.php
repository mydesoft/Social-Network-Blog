@extends('layouts.master')

@section('title', 'Register')

@section('content')
		
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-2">
				@include('includes.message')
				<div class="card border-info mb-3">
					<div class="card-header" style="background-color:#17a2b8;">
						<h4 class="text-white">Register Here</h4>
					</div>

					<div class="card-body">
						<form method="POST" action="/register">
							{{csrf_field()}}
							<div class="form-group">
								<label for="name"> <i class="fa fa-user-circle"></i> Name</label>
								<input type="text" name="name" class="form-control" value= "{{old('name')}}"required>
							</div>


							<label for="email">Email</label>
							<div class="input-group mb-3">
  								 <input type="text" name="email" class="form-control" aria-label="email" aria-describedby="basic-email" value= "{{old('email')}}"required>

  								 <div class="input-group-append">
   								 	<span class="input-group-text" id="email">@</span>
  								 </div>
							</div>

							<div class="form-group">
								<label for="userrname"> <i class="fa fa-user-circle-o"></i> Username</label>
								<input type="text" name="username" class="form-control" value= "{{old('username')}}"required>
							</div>

							<div class="form-group">
								<label for="state"><i class="fa fa-address-card"></i> State</label>
								<input type="text" name="state" class="form-control" value= "{{old('state')}}"required>
							</div>

							<div class="form-group">
								<label for="password"><i class="fa fa-pencil-square"></i> Password</label>
								<input type="password" name="password" class="form-control" required>
							</div>

							<div class="form-group">
								<label for="password_confirmation"><i class="fa fa-pencil-square"></i> Confirm Password</label>
								<input type="password" name="password_confirmation" class="form-control" required>
							</div>

							<div class="row">
								<div class="col-md-4 offset-4">
									<div class="form-group">
								       <button class="btn btn-info"><i class="fa fa-upload"></i> Register</button>
							        </div>
								</div>

								<div class="col-md-6 offset-3">
									
							       <h6><a href="{{route('login')}}" style="color:#17a2b8;">Already Have An Account?</a></h6>
								</div>
							</div>

							

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	

@endsection
@extends('layouts.master')

@section('title', 'Account')

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
				<div class="card-header bg-secondary"><h5 class="text-white"> My Account</h5></div>
			

			<div class="card-body">
				<form>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" value="{{Auth::user()->email}}" disabled="">
					</div>

					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" value="{{Auth::user()->username}}" disabled="">
					</div>
				</form>
				
			</div>
			</div>
		</div>
		
	</div>
</div>

	

@endsection
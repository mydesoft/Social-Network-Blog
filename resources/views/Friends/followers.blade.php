@extends('layouts.master')

@section('title', 'Followers')

@section('content')

	
	<div class="container">
		<div class="col-md-6 offset-md-8">
		<form method = "GET" action="/friend">
			<div class="row">
				<div class="col-md-8">
					@include('includes.message')
					<div class="form-group">
					  <input type="text" name="friend" class="form-control" placeholder="Find a Friend Here" required>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
					  <button class="btn btn-info"><i class="fa fa-search"></i> Search Friend</button>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>

	<div class="follow">
		<div class="container">
		<div class="row">
			<div class="col-md-8 offset-1">
				<div class="card border-info">
					<div class="card-header" style="background-color:#17a2b8;">
						<h6 class="text-white">My Followers</h6>
					</div>
				

				<div class="card-body">
					@if(Auth::user()->followers->count() > 0)
						@foreach(Auth::user()->followers as $follower)

							<li class="list-group-item"> 
								<a href="/showfriend/{{$follower->id}}"><h5 class="text-dark"> <i class="fa fa-user"></i> {{$follower->name}}</h5></a>
							</li>	
						@endforeach

						@else
						<h4> You Have No Followers!</h4>
					
					@endif
				</div>
			</div>
			</div>
		</div>
	</div>
	</div>

	

@endsection
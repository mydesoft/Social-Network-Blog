@extends('layouts.master')

@section('title', 'Nearby_Friends')

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
					  <button class="btn btn-info"> <i class="fa fa-search"></i> Search</button>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>

	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="card border-info">
					<div class="card-header" style="background-color:#17a2b8;">
						<h6 class="text-white">Friends Nearby </h6>
					</div>
				

				<div class="card-body">
					
				<ul class="list-group">
					
							@foreach($users as $user)
								@if($user->id !== Auth::user()->id)
								<li class="list-group-item">
									<div class="text-center">
										<a href="/showfriend/{{$user->id}}">
										<img src="/storage/profile_picture/{{$user->profile_picture}}" width="150">
									    </a>
									</div>
									<a href="/showfriend/{{$user->id}}">
										<h6 class="text-center text-info">{{$user->name}}</h6>
									</a>
								</li>

								@else
								@if($users->count() - 1 == 0)
									<h4>Oops! Sorry We Can't a Find a Friend Nearby you at the moment</h4>
								@endif
								@endif
								@endforeach
						</ul>
				</div>
			</div>
			</div>

			<div>
				<br>
			</div>


			<div>
				<br>
			</div>


			<div class="col-md-5">
				<div class="card border-info">
					<div class="card-header" style="background-color:#17a2b8;">
						<h6 class="text-white">{{Auth::user()->name}}, Friends You Might Also Like </h6>
					</div>
				

				<div class="card-body">
					
				<ul class="list-group">
					
							@foreach($nearbyFriends as $friend)
								@if($friend->id !== Auth::user()->id)
								<li class="list-group-item">
									<div class="text-center">
										<a href="/showfriend/{{$friend->id}}">
										<img src="/storage/profile_picture/{{$friend->profile_picture}}" width="150">
									    </a>
									</div>
									<a href="/showfriend/{{$friend->id}}">
										<h6 class="text-center text-info">{{$friend->name}}</h6>
									</a>
								</li>
								@endif
								@endforeach
							

						</ul>
				</div>
			</div>
			</div>
		</div>
	</div>

	

@endsection
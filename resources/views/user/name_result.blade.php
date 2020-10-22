@extends('layouts.master')

@section('title', $query)

@section('content')
		
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<div class="card border-info">
					<div class="card-header" style="background-color:#17a2b8;">
						<h4 class="text-white">You Searched : {{$query}}</h4>
					</div>
				

				<div class="card-body">
					
					@if($users->count() > 0)
					<h5>We Found {{$users->count()}} person(s) who is {{$query}}</h5>
					
						<ul class="list-group">
							@foreach($users as $user)

								<li class="list-group-item">
									<div class="text-center">
										<a href="/showfriend/{{$user->id}}">
										<img src="/storage/profile_picture/{{$user->profile_picture}}" width="150">
									    </a>
									</div>
									<a href="/showfriend/{{$user->id}}">
										<h5 class="text-center text-info">{{$user->name}}</h5>
									</a>
								</li>
							@endforeach
						</ul>
						
					@else
						<div><h4>No Results found for {{$query}}</h4></div>
					@endif
		
				</div>
			</div>
			</div>
		</div>
	</div>

	

@endsection
@extends('layouts.master')

@section('title', $user->name. ' post(s)')

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
			<div class="col-md-8 offset-1">
				<div class="card border-info">
					<div class="card-header" style="background-color:#17a2b8;">
						<h6 class="text-white">{{$user->name}} Posts</h6>
					</div>
				

				<div class="card-body">
					@if($user->posts->count() > 0)
						@foreach($user->posts as $post)

							<li class="list-group-item">
							<a href="/posts/{{$post->id}}">
							<div class="text-center"><img src="/storage/PostImages/{{$post->image}}" width="170"></div>
							
							<h4 class="text-dark text-center">{{$post->title}}</h4>
							</a>
						</li>	
						@endforeach

						@else
						<h4> {{$user->name}} Has No Post(s)</h4>
					
					@endif
				</div>
			</div>
			</div>
		</div>
	</div>

	

@endsection




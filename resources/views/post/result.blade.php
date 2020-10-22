@extends('layouts.master')

@section('title', 'Search-Results')

@section('content')

	<div class="follow">
			
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-1">
		    <div class="card border-info">
			  <div class="card-header bg-info">
			  	
			  	@if($posts->count() > 0)
			  		<h3 class="text-white"> {{$posts->count()}} Result(s) Found for {{$query}}</h3>
			  		@else
			  		<h3 class="text-white"> No Result(s) Found for {{$query}}</h3>
				@endif
				
			 </div>

			<div class="body">
				<ul class="list-group">

					@foreach($posts as $post)
						<li class="list-group-item">
							<a href="/posts/{{$post->id}}">
							<div class="text-center"><img src="/storage/PostImages/{{$post->image}}" width="170"></div>
							
							<h4 class="text-dark text-center">{{$post->title}}</h4>
							</a>
						</li>
					@endforeach
					
				</ul>
			</div>
		
			</div>
		</div>
	</div>
</div>
	
	</div>

@endsection
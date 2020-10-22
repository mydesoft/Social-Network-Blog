@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
		

	<div class="container">
		<div class="col-md-6 offset-md-8">
		<form method="GET" action="/results">
			<div class="row">
				<div class="col-md-8">
					@include('includes.message')
					<div class="form-group">
					  <input type="text" name="search" class="form-control" placeholder="Search Post Here" required>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
					  <button class="btn btn-info"><i class="fa fa-search"></i> Search</button>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>


<div class="container">
	
	
		<h3 style="font-family: roboto; font-weight: bold;">Trending News!</h3>

			<div class="row">
				<div class="col-md-8">
					<ul class="list-group">
					@foreach($posts as $post)

					<li class="list-group-item">
						<div class="row">

							<div class="col-md-4 col-xs-3">
								<img src="{{asset('/storage/PostImages/'. $post->image)}}" width="140"><br>
									
										<i class="fa fa-user"></i> {{$post->user->username}}
									
										<small> at {{$post->created_at->isoFormat('LLLL', 6)}}</small>

									</i>
				   		</div>

				<div class="col-md-8 col-xs-9">
					<h5 style="font-family: roboto; font-weight: bold;">{{$post->title}}</h5>

					<p style="font-family: roboto; font-size: 17px;"> {{Str::limit($post->body, 150)}}
						 <a href="/posts/{{$post->id}}">
							<span class="text-info">Continue Reading</span>
						 </a>
					</p>
				</div>
				
				
				
		</div>
		</li>
		@endforeach

		</ul>
	
		<br>
		<div class="float-right">
						{{$posts->links()}}
						
					</div>
			</div>

						<div class="col-md-4">
							<div class="card border-info">
								<div class="card-header" style="background-color:#17a2b8;">
									<h6 class="text-white">Top Stories</h6>
								</div>

								<div class="card-body">
									<ul class="list-group">
								
											@foreach($Sidebars as $sidebar)
											<a href="/posts/{{$sidebar->id}}">
												<li class="list-group-item">
													<p class="text-info">{{$sidebar->title}}</p></li>
											</a>
											@endforeach
										
										
										</ul>
								</div>
							</div>

						</div>
					</div>
			
		</div>

	
	
@endsection
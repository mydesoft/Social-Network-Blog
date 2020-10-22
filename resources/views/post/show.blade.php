@extends('layouts.master')

@section('title', 'Show-Post')

@section('content')
		

	<div class="container">
		<div class="row">
			<div class="col-md-7">
			
				<h3 style="font-family: roboto;">
					<u> {{$post->title}}</u><i>
						<a href="/showfriend/{{$post->user->id}}" class="text-dark">
							 <small><i class="fa fa-user"></i> {{$post->user->username}}</small>
						</a> 
						<small>{{$post->created_at->isoFormat('LLLL')}}</small></i>
					</h3>
					<br>
					
					
					<img src="{{asset('/storage/PostImages/'.$post->image)}}" width="600" height="350"><br><br>
				

					<p style="font-size:20px; font-family: roboto" class="text-justify">{{$post->body}}</p>
				 	
			</div>

			<div class="col-md-5">
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

<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				@include('includes.message')
				<div class="card">
			        <div class="card-header">
				       <h6>People's Opinion on the Topic</h6>
			        </div>

			        <div class="card-body">
			        	<ul class="list-group">
			        		@if($post->comments->count() > 0)
			        			@foreach($post->comments as $comment)
			        		
			        			<li class="list-group-item"><span>{{$comment->user->username}} commented: </span><i>{{ $comment->comment}}</i><br>
			        			@if(Auth::user())	
			        				@if(Auth::user()->id === $comment->user_id)	
			        					<div class="float-right">
			        						<a href="/comment/delete/{{$comment->id}}" class="text-danger">
			        							<i class="fa fa-trash"></i> Delete
			        						</a>
			        					</div>
			        						
			        					
			        				@endif

			        				@if($comment->hasBeenLiked())

			        				

				        			 <a href="/comment/unlike/{{$comment->id}}"><button class="btn btn-default btn-xs"><span class="text-danger"><i class="fa fa-thumbs-down"></i> Unlike <span class="badge badge-pill badge-primary">{{$comment->likes->count()}}</span></span></button></a>
			        				@else

				        			 <a href="/comment/like/{{$comment->id}}"><button class="btn btn-default btn-xs text-primary"><i class="fa fa-thumbs-up"></i> Like
				        			 	@if($comment->likes->count() > 0)
				        			 	<span class="badge badge-pill badge-primary">
				        			 	{{$comment->likes->count()}}
				        			 	</span>
				        			 	@endif
				        			 </span></button></a>
			        				
			        			  	
			        			  	@endif
				        		 <button class="btn btn-default btn-xs"><span class="text-info">Reply</span></button> 
				        		 @endif	
			        		</li>
			        			
			        			@endforeach
			        			@else
			        			<h5> No Comment(s) Yet For This Post!</h5>
			        		@endif
			        		
			        	</ul>
			        </div>
		        </div>
			</div>
		</div>
		
	</div>

	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				
				<div class="card border-info">
			        <div class="card-header" style="background-color:#17a2b8;">
				       <h6 class="text-white">Make your contribution on this post</h6>
			        </div>

			        <div class="card-body">
			        	<form method="POST" action="/posts/{{$post->id}}/comment">
			        		{{csrf_field()}}
			        		<div class="form-group">
			        			<input type="text" name="comment" class="form-control" placeholder="Your Comment" required>
			        		</div>

			        		@if(Auth::user())
				        		<div class="form-group">
				        			<button class="btn btn-info"><i class="fa fa-comment"></i> Make Comment</button>
				        		</div>
				        		@else
				        		<a href="{{route('login')}}">
				        			<h6 class="text-info text-center">Please Login to Comment</h6>
				        		</a>
				        	@endif	
			        	</form>
			        </div>
		        </div>

			</div>

		</div>
		
	</div>





	

	

@endsection
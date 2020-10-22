@extends('layouts.master')

@section('title', $user->name)

@section('content')
		
<div class="follow">
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				@include('includes.message')
				<div class="card border-info">
					<div class="card-header" style="background-color:#17a2b8;">
						<h6 class="text-white">{{$user->name}} Profile</h6>
					</div>
				

				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<img src="/storage/profile_picture/{{$user->profile_picture}}" width="140">
						</div>

						<div class="col-md-8">
							<h4 class="text-info" style="font-family: roboto; font-weight: bold;">
								Name : {{ $user->name}}
							</h4>

							<h4 class="text-info" style="font-family: roboto; font-weight: bold;">
								Location : {{$user->state}}
							</h4>

							<h4 class="text-info" style="font-family: roboto; font-weight: bold;">
								Email : {{$user->email}}
							</h4>

							<h4 class="text-info" style="font-family: roboto; font-weight: bold;">
								Username : {{$user->username}}
							</h4>
						</div>

					</div>
					<hr>
					
					<div class="float-right">
						@if(Auth::user())
						@if(Auth::user()->id != $user->id)
						@if($user->hasFollowed())
							<a href="/user/unfollow/{{$user->id}}">
								<button class="btn btn-danger btn-sm">Unfllow</button>
							</a>
							@else
								<a href="/user/follow/{{$user->id}}">
								<button class="btn btn-info btn-sm"><i class="fa fa-user-plus"></i> Follow</button>
								</a>
							
							 @endif		
					
							

							 @if($user->hasFollowed())
						    	<a href="/message/{{$user->id}}">
						    		<button class="btn btn-info btn-sm"> Message </button>
						    	</a>
						    @endif
						    @endif
						    <hr>
						   <a href="/userpost/{{$user->id}}">
						   	<button class="btn btn-secondary btn-sm">{{$user->name}} Post(s)</button>
						   </a>	
						@endif
						
							
							@guest
							<button class="btn btn-info btn-sm">
								<h6>
									
									<a href="/login" class="text-white">Login</a>  / 

									<a href="/register" class="text-white">Register</a> 

									to follow, message, or see all of {{$user->name}} post(s)
								</h6>
								</button>
								@endguest
						
						
						
					</div>		
					
				</div>
			</div>
		</div>
	</div>

</div>
</div>



@endsection
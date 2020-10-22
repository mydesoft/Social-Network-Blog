@extends('layouts.master')

@section('title', 'User_Dashboard')

@section('content')
		
	<div class="container">
		<div class="col-md-6 offset-md-8">
		<form method = "GET" action="/friend">
			<div class="row">
				<div class="col-md-8">
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


<div class="container">
	<div class="row">
		<div class="col-md-8">
		@include('includes.message')
			<h4 style="color:#17a2b8;" class="text-center"> Welcome <i class="fa fa-user-circle"></i> {{Auth::user()->name}}</h4>
		</div>
	</div>
	
</div>
<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-secondary border-dark">
				<div class="card-header">
					<h4 class="text-white"><i class="fa fa-user-circle"></i> {{Auth::user()->name}}</h4>
				</div>

				<div class="card-body">
					<ul class="list-group">
						<li class="list-group-item">
							<a href="{{route('user.profile')}}" class="text-dark"> <i class="fa fa-user-circle"></i> My Profile.</a>
						</li>

						<li class="list-group-item">
							<a href="" data-toggle="modal" data-target="#updatepassword" class="text-dark">
								<i class="fa fa-edit"></i> Change Password
							</a>
						</li>

						<li class="list-group-item">
							<a href="/followers" class="text-dark">
								<i class="fa fa-user-circle-o"></i> My Followers
							 </a>
							<span class="badge badge-warning badge-pill">{{Auth::user()->followers->count()}}
							</span>
						</li>


						<li class="list-group-item">
							<a href="/following" class="text-dark"><i class="fa fa-user-plus"></i> See who I follow </a>
							<span class="badge badge-warning badge-pill">
								{{Auth::user()->followings->count()}}
							</span>
						</li>

						<li class="list-group-item">
							<form method = "GET" action="/location">
								<input type="hidden" name="location" value="{{Auth::user()->state}}">
								<i class="fa fa-search"></i><button class="btn btn-default btn-sm text-dark"> Search Friends Nearby
								</button>
							</form>
							
						</li>

						<li class="list-group-item">
							<a href="" class="text-dark" data-toggle="modal" data-target="#queryadmin"><i class="fa fa-envelope"></i> Contact Admin Here?</a>
						</li>

						<li class="list-group-item">
							<a href="/logout" class="text-danger"><i class="fa fa-sign-out"></i> Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
	<div>
			<br>
		</div>


		<div class="col-md-4">
			<div class="card border-dark">
				<div class="card-header bg-secondary ">
					<h4 class="text-white"> <i class="fa fa-pencil-square"></i> All My Post(s)</h4>
				</div>

				<div class="card-body">
					<ul class="list-group">
						@if(Auth::user()->posts->count() > 0)
							@foreach($posts as $post)
								@if($post->user_id === Auth::user()->id)
									<li class="list-group-item">{{$post->title}}
									<button class="btn btn-default"><a href="/postmade/{{$post->id}}">View</a></button>
									</li>
								@endif
							@endforeach	
							@else
							<div><h6>You Have No Posts Yet!</h6></div>
						@endif
					</ul>
				</div>
			</div>
		</div>
		

		<div>
			<br>
		</div>

		<div class="col-md-4">
			<div class="card border-dark">
				<div class="card-header bg-secondary">
					<h4 class="text-white"> <i class="fa fa-pencil"></i> Create New Post</h4>
				</div>

				<div class="card-body">
					<form method= "POST" action="{{route('post.create')}}" enctype = "multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label for="title"><h5>Title</h5></label>
							<input type="text" name="title" class="form-control" placeholder="Post Title" required>
						</div>

						<div class="form-group">
							<label for="body"><h5>Body</h5></label>
							<textarea type="text" name="body" class="form-control" placeholder="Post Body" required rows="6" cols="30"></textarea>
						</div>

						<div class="form-group">
							<label for="image"><h5>Post Image</h5></label>
							<input type="file" name="image" class="form-control">
						</div>

						
						<div class="form-group">
							<button class="btn btn-secondary"><i class="fa fa-upload"></i> Create Post</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


{{-- PASSWORD UPDATE MODAL --}}
  <div class="modal fade" id="updatepassword" tabindex="-1" role="dialog" aria-labelledby="updatepasswordlabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="updatepasswordlabel">Change Your Password Here</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="{{route('password.update',auth()->user()->id)}}">
                                       
                                        {{ csrf_field() }}
                                            {{method_field('PATCH')}}

                                          <div class = "form-group">
                                              <label> Old Password</label>
                                              <input type="password" name = "old_password" class="form-control" required>
                                          </div>  

                                          <div class = "form-group">
                                              <label> New Password</label>
                                              <input type="password" name = "password" class="form-control" required>
                                          </div>

                                          <div class = "form-group">
                                              <label> Confirm Password</label>
                                              <input type="password" name = "password_confirmation" class="form-control" required>
                                          </div>

                                          <button class = "btn btn-info">Update</button>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>





{{-- CONTACT ADMIN MODAL --}}
  <div class="modal fade" id="queryadmin" tabindex="-1" role="dialog" aria-labelledby="queryadminlabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="queryadminlabel">Contact Admin Here</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="{{route('contactadmin')}}">
                                       
                                        {{ csrf_field() }}
                                           

                                          <div class = "form-group">
                                              <label> Name</label>
                                              <input type="text" name = "name" class="form-control" >
                                          </div>  

                                          <div class = "form-group">
                                              <label> Email</label>
                                              <input type="text" name = "email" class="form-control" >
                                          </div>

                                          <div class = "form-group">
                                              <label> Your Message</label>
                                              <textarea type="text" name = "message" class="form-control" ></textarea>
                                          </div>

                                          <button class = "btn btn-info">Send</button>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>


	

@endsection
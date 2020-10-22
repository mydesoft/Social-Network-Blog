@extends('layouts.master')

@section('title', 'Admin_Dashboard')

@section('content')
		
	<div class="container">
		@include('includes.message')
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
			<div class="card border-dark">
				<div class="card-header bg-secondary"><h5 class="text-white"> All Posts</h5></div>
			

			<div class="card-body">
				<div>
					<form method = "GET" action="/friend">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
					  <input type="text" name="friend" class="form-control" placeholder="Seach Post" required>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
					  <button class="btn btn-info btn-sm"><i class="fa fa-search"></i> Search Post</button>
					</div>
				</div>
			</div>
		</form>
				</div>


				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead class="thead-dark">

							<tr>
								<th>Post Image</th>
								<th>Post Title</th>
								<th>Posted By</th>
								<th></th>
							</tr>
						</thead>

						<tbody>

							@foreach($posts as $post)
								<tr>
									<td><img src="{{asset('storage/PostImages/'.$post->image)}}" width="120"></td>
									<td>{{$post->title}}</td>
									<td>{{$post->user->name}}</td>
									<td>
										<a href="{{route('showpost',$post->id)}}">
											<button class="btn btn-info btn-sm"><i class="fa fa-edit"></i> 
											   View
											</button>
										</a>
									</td>	
								</tr>
								
							@endforeach
						
								
						</tbody>
				</table>
				<div class="float-right">	
						{{$posts->links()}}
				</div>

				</div>
				
			</div>
			</div>
		</div>
		
	</div>
</div>

	

@endsection
@extends('layouts.master')

@section('title', 'Edit_Post')

@section('content')
		


	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-1">
				@include('includes.message')
			<div class="card border-info">
				<div class="card-header" style="background-color:#17a2b8;">
					<h4 class="text-white">Edit Post</h4>
				</div>

				<div class="card-body">
					 <form method="POST" action="{{route('postsmade.update',$post->id)}}" enctype = "multipart/form-data">
                                       
                         {{ csrf_field() }}
                         {{method_field('PATCH')}}

                         <div class = "form-group">
                             <label> Title</label>
                             <input type="text" name = "title" class="form-control" value="{{$post->title}}">
                         </div>  

                         <div class = "form-group">
                             <label> Body</label>
                              <textarea type="password" name = "body" class="form-control" rows="10" cols="20">{{$post->body}}
                              </textarea>
                          </div>

                            <div class = "form-group">
                             <label> Change Image</label>
                             <input type="file" name = "image" class="form-control">
                         </div> 

                              <button class = "btn btn-info">Update</button>
                          
					</form>
				</div>
			</div>
		</div>

		</div>
	</div>
		
	

@endsection
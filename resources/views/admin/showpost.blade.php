@extends('layouts.master')

@section('title', 'User_Post')

@section('content')

		
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 offset-1">
			@include('includes.message')
			<div class="card border-dark">
			   <div class="card-header bg-secondary">
				 <h5 class="text-white">Posts Contents</h5>
			   </div>

			   <div class="card-body">
					<div class="row">
						<div class="col-md-10 offset-4">
							<div class="col-md-4">
								<h5>Post Image: </h5>
								<img src="{{asset('/storage/PostImages/'.$post->image)}}" width="120">
							</div>
						</div>
					</div>
					<hr>

					<div>
						<h5>{{$post->title}}</h5>

						<p>{{$post->body}}</p>
					</div>

					<hr>
						

						<div>
							<button class="btn btn-danger" data-toggle="modal" data-target="#deletepost">
								<i class="fa fa-trash"></i> Delete Post
							</button>
						</div>
					
					
			   	</div>
		</div>
		</div>
		
	</div>
</div>




{{-- DELETE POST --}}
  <div class="modal fade" id="deletepost" tabindex="-1" role="dialog" aria-labelledby="deletepostlabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="deletepostlabel">Are You Sure You Want to Delete this Post?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>

                                      <div class="float-right">
                                      	<a href="{{route('deletepost', $post->id)}}">
                                      		<button class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>
                                        </a>
                                      </div>
                                      		
                                      </form>
                                      
                                    </div>
                                   
                                  </div>
                                </div>
                              </div>


@endsection
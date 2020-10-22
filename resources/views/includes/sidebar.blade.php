<div class="card border-dark mb-3 bg-secondary">
			     <div class="card-header"><h4 class="text-white"> <i class="fa fa-user-circle"></i> Welcome Admin!</h4></div>

			     <div class="card-body">
			     	<ul class="list-group border-info">
			     		<li class="list-group-item">
			     			<a href="{{route('admindashboard')}}" class="text-dark"> <i class="fa fa-dashboard"></i> Dashboard</a>
			     		</li>

			     		<li class="list-group-item">
			     			<a href="{{route('account')}}" class="text-dark"> <i class="fa fa-user-circle"></i> My Account</a>
			     		</li>

			     		<li class="list-group-item">
			     			<a href="{{route('allusers')}}" class="text-dark"><i class="fa fa-users"></i><span> All Users</span></a>
			     		</li>

			     		<li class="list-group-item">
			     			<a href="{{route('suspendedusers')}}" class="text-dark"><i class="fa fa-ban"></i><span> Suspended User(s)</span></a>
			     		</li>

			     		<li class="list-group-item">
			     			<a href="{{route('alladmin')}}" class="text-dark"> <i class="fa fa-users"></i> All Admin</a>
			     		</li>

			     		<li class="list-group-item">
			     			<a href="" class="text-dark"  data-toggle="modal" data-target="#addadmin"><i class="fa fa-user"></i> Add Admin</a>
			     		</li>


              @if(Auth::user()->username === 'qAdmin')
               <li class="list-group-item">

                <a href="{{route('querymessages')}}" class="text-dark"><i class="fa fa-envelope"></i> Users Queries</a>

              </li>
              @endif
              

			     		<li class="list-group-item">
			     			<a href="{{route('admindashboard')}}" class="text-dark"><i class="fa fa-pencil-square"></i> All Posts</a>
			     		</li>

			     		<li class="list-group-item">
			     			<a href="/logout" class="text-danger"><i class="fa fa-sign-out"></i> Logout</a>
			     		</li>
			     	
			     	</ul>
			     </div>
		    </div>



		    {{-- ADD ADMIN MODAL --}}
  <div class="modal fade" id="addadmin" tabindex="-1" role="dialog" aria-labelledby="addadminlabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="addadminlabel">Add Admin Here</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form method="POST" action="{{route('createadmin')}}">
                                       
                                        {{ csrf_field() }}
                                           

                                          <div class = "form-group">
                                              <label> Name</label>
                                              <input type="text" name = "name" class="form-control" required>
                                          </div> 

                                           <div class = "form-group">
                                              <label> Email</label>
                                              <input type="email" name = "email" class="form-control" required>
                                          </div>  

                                           <div class = "form-group">
                                              <label> Username</label>
                                              <input type="text" name = "username" class="form-control" required>
                                          </div>   

                                          <div class = "form-group">
                                              <label> Password</label>
                                              <input type="password" name = "password" class="form-control" required>
                                          </div>

                                         

                                          <button class = "btn btn-info">Add Admin</button>
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
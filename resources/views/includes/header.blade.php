 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a id="logo" href="/"><img  src="{{asset('img/logo2.jpg')}}"/></a> 

  <a class="navbar-brand text-white" href="/">Social Network</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mydesoft" aria-controls="mydesoft" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="mydesoft">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="/"> <i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link text-white" href="/">About Us</a>
      </li>

       <li class="nav-item">
        <a class="nav-link text-white" href="/">Our Services</a>
      </li> 

       <li class="nav-item">
        <a class="nav-link text-white" href="/"> <i class="fa fa-envelope"></i> Contact</a>
      </li>
    </ul>
    
     
      @if(Auth::user())

      <div class="nav-item">
        <img src="{{asset('storage/profile_picture/'.Auth::user()->profile_picture)}}" class = "img-rounded" width="25">
      </div>

      <div>|</div>

       <div class="nav-item">
        <h6 class="text-white"> Hello {{Auth::user()->name}}! </h6> 
      </div>

        <div> | </div>


       <div class=" nav-item dropdown">

            <span class="fa fa-bell" style="color: white"  id="dropdownnotify" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </span>
              
             @if(Auth::user()->unreadNotifications->count() > 0)

                <span class="badge badge-warning badge-pill"> {{Auth::user()->unreadNotifications->count()}}</span>
              @endif  
               

            <div class="dropdown-menu" aria-labelledby="dropdownnotify">

               @if(Auth::user()->notifications->count() > 0)

                <li>
                  <a class="dropdown-item text-info" href="/markasread">Mark All as Read</a>
                </li>


                @foreach(Auth::user()->unreadNotifications as $notification)
                @if(Auth::user()->hasRole())
                 <li>
                   <a class="dropdown-item text-info" href="/showfriend/{{$notification->data['id']}}">{{$notification->data['followedUser']}} followed you.
                   </a>
                  
                </li>
                @endif
              @endforeach

              @foreach(Auth::user()->readNotifications as $notification)
                @if(Auth::user()->hasRole())

                <li>
                   <a class="dropdown-item text-success" href="/showfriend/{{$notification->data['id']}}">{{$notification->data['followedUser']}} followed you.
                   </a>

                </li>  
                @endif
              @endforeach

               @foreach(Auth::user()->unreadNotifications as $notification)
                @if(!Auth::user()->hasRole())
                 <li>
                   <a class="dropdown-item text-info" href="/adminmessage/{{$notification->data['id']}}">{{$notification->data['username']}} messaged you.
                   </a>
                  
                </li>
                @endif
              @endforeach

               @foreach(Auth::user()->readNotifications as $notification)
                @if(!Auth::user()->hasRole())
                 <li>
                   <a class="dropdown-item text-success" href="/adminmessage/{{$notification->data['id']}}">{{$notification->data['username']}} messaged you.
                   </a>
                  
                </li>
                @endif
              @endforeach

                @else  
                <a class="dropdown-item" href="#"> You have no notification(s)</a>

                @endif
                

              </div>
      
        </div>

      
      <div class="nav-item">
         <a href="{{route('userdashboard')}}" class="nav-link"> <button class="btn btn-info btn-sm"><i class="fa fa-tachometer"></i> My Dashboard</button></a>
      </div>

       <div class="nav-item">
        <a href="{{route('logout')}}" class="nav-link"><button class="btn btn-danger btn-sm"><i class="fa fa-sign-out"></i> Logout</button></a>
      </div>

      @else
      <div class="nav-item">
        <a href="{{route('register')}}" class="nav-link"><button class="btn btn-info btn-sm">Register</button></a>
      </div>

        <div class="nav-item">
        <a href="{{route('login')}}" class="nav-link"><button class="btn btn-info btn-sm">Login</button></a>
      </div>

      @endif
    
  </div>
</nav>

<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	</head>
	<body>

	<div class="container">
				
					<div  style="color:#17a2b8;">
						<h3 class="text-white">Hello {{$user->name}}, Thank You for Registering with Chatting Network</h3>
					</div>

					
						<h5 class="text-info">Here Are Your Registration Details;</h5>

						<h5> Name: {{$user->name}}</h5>

						<h5>Username: {{$user->username}}</h5>

						<h5>Email: {{$user->email}}</h5>

						

						Thanks,<br>
						{{ config('app.name') }}


					</div>
				
	

	


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>


</html>
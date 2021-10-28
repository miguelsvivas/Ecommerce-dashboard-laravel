<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('Title') - Mycms</title>
	<link rel="stylesheet" type="text/css" href="">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<meta name="routeName" content="{{Route::currentRouteName()}}">
	



	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

	<link rel="stylesheet"  href="{{url('/static/css/admin.css?v='.time())}}">


	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/cc87afb57e.js" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  

	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


	<script src="{{ url('/static/libs/ckeditor/ckeditor.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>



	<script >
		$(document).ready(function(){
			 $('[data-toggle="tooltip"]').tooltip()
		});

	</script>

	</head>
<body>

	<div class="wrapper">
		<div class="col1">@include('admin.sidebar')</div>
		<div class="col2">
			
			<nav class="navbar navbar-expand-lg shadow">
				<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="{{url('/admin')}}" class="nav-link"><i class="far fa-chart-bar"></i> Dashboard</a>
					</li>
				</ul>
			</div>
			</nav>
			<div class="page">


				<div class="container-fluid">
					<nav aria-label="breadcrumb shadow">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="{{url('/admin')}}"><i class="fas fa-home"></i> Dashboard</a>	
							</li>
							@section('breadcrumb')
							@show
						</ol>
					</nav>
				</div>

					@if(Session::has('message'))
					<div class="container">

					<div class="mtop16 alert alert-{{Session::get('typealert')}}" style="display:none;">
						{{Session::get('message')}}
						@if($errors->any())
						<ul>
		     			@foreach($errors->all() as $error)
		     			<li>{{ $error}}</li>
		     			@endforeach

						</ul>		
			
						@endif
						<script>
						$('.alert').slideDown();
						setTimeout(function(){ $('.alert').slideUp(); },10000);
						</script>
						</div>
						</div>
						@endif

						@section('content')
						@show
			</div>

		</div>
		

	</div>

	
<!-- JavaScript and dependencies -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


</body>
</html>
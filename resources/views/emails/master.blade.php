<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet"  href="">
</head>
<body style="margen: 0px; padding: 0px; background-color:  #f3f3f3">
	<div style="
	display: block;
	max-width: 728px;
	margin: 0px auto;
	width: 60% ;
	
	">
		<img src="{{ url('imagenes/logo.png')}}" style="width: 100%;   display: block; " >
		
		<div style="background-color: #fff;
		padding: 24px;

		">
			@yield('content')



		</div>

	</div>

</body>
</html>
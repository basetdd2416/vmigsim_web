


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	@include('includes.head')
</head>
<body>
	<div class="container">
		
		<header class="row">
			@include('includes.header')
		</header>

		<div id="main" class="row">
			@yield('content')
		</div>

		<footer class ="row">
			@include('includes.footer')
		</footer>
	</div>
	@include('includes.includejs')
	@yield('js')
</body>
</html>
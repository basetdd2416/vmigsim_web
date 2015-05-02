<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	@include('includes.head')
	@yield('head-js')
</head>
<body>
<div class="container">

	<header class="row">
		@include('includes.header')
	</header>
	
	<div id="main" class="row">

		<!-- sidebar content -->
		<div id="sidebar" class="col-md-3">
			@include('includes.sidebarsim')
		</div>

		<!-- main content -->
		<div id="content" class="col-md-9">
			@yield('head-title')
			@yield('content')
			@include('includes.createconfig')
			
		</div>

	</div>

	<footer class="row" >
		@include('includes.footer')
	</footer>

</div>
		@include('includes.includejs')
		@yield('js')
</body>

</html>

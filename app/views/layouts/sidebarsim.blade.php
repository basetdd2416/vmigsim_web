<!doctype html>
<html>
<head>
	@include('includes.head')
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
			@yield('content')
		</div>

	</div>

	<footer class="row">
		@include('includes.footer')
	</footer>

</div>
		@include('includes.includejs')
</body>

</html>

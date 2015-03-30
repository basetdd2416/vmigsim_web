<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<style type="text/css">
		ul.nav-tabs {
		width: 200px;
		margin-top: 20px;
		border-radius: 4px;
		border: 1px solid #ddd;
		box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
		}
		ul.nav-tabs li {
		margin: 0;
		border-top: 1px solid #ddd;
		}
		ul.nav-tabs li:first-child {
		border-top: none;
		}
		ul.nav-tabs li a {
		margin: 0;
		padding: 8px 16px;
		border-radius: 0;
		}
		ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover {
		color: #fff;
		background: #0088cc;
		border: 1px solid #0088cc;
		}
		ul.nav-tabs li:first-child a {
		border-radius: 4px 4px 0 0;
		}
		ul.nav-tabs li:last-child a {
		border-radius: 0 0 4px 4px;
		}
		ul.nav-tabs.affix {
		top: 30px; /* Set the top position of pinned element */
		}
		p {
		text-indent: 50px;
		}
		</style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" >
<div class="container">

	<header class="row">
		@include('includes.header')
	</header>

	<div id="main" class="row">

		<!-- sidebar content -->
		<div id="myScrollspy" class="col-md-3" >
			@include('includes.sidebar')
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
	@yield('js')
</body>
</html>

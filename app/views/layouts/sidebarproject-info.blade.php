<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
		article {
		  max-height: 20em; /* (4 * 1.5 = 6) */
		}
		</style>
	</head>
	<body data-spy="scroll" data-target="#myScrollspy">
		<div class="container">
			<header class="row">
				@include('includes.header')
			</header>
			
			<div class="jumbotron text-center">
				<h2>Enabling continued operation of IT services
				and infrastructures during floods and other disasters
				</h2>
			</div>
			<div class="row">
				<div class="col-xs-3" id="myScrollspy">
					<ul class="nav nav-tabs nav-stacked affix-top" data-spy="affix" data-offset-top="200">
						<li class="active"><a href="#section-1">Motivation</a></li>
						<li><a href="#section-2">Objectives</a></li>
						<li><a href="#section-3">Methodology</a></li>
						<li><a href="#section-4">Results</a></li>
						
					</ul>
				</div>
				<div class="col-xs-9">
					@yield('content')
					
				</div>
			</div>
			
			<footer class="row">
				@include('includes.footer')
			</footer>
			@include('includes.includejs')
			@yield('js')
		</body>
	</html>
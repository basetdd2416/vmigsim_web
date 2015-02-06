@extends('layouts.sidebarsim')
@section('content')
{{ HTML::script('mlselect/docs/js/jquery-2.1.1.min.js') }}
{{ HTML::script('mlselect/docs/js/bootstrap-3.2.0.min.js') }}
{{ HTML::style('mlselect/dist/css/bootstrap-multiselect.css') }}
{{ HTML::script('mlselect/dist/js/bootstrap-multiselect.js') }}
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li><a href="#">Configuration</a></li>
	<li href="#" class="active">Create configuration</li>
</ol>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Please add data to configuration</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Configuration name</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="inputEmail3" value="" placeholder="enter your configuration name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Select host list</label>
				<div class="col-sm-6">
					
					<script type="text/javascript">
					$(document).ready(function() {
					$('#example-getting-started').multiselect();
					});
					</script>
					<select id="example-getting-started" multiple="multiple">
						<option value="cheese">HostA</option>
						<option value="tomatoes">HostB</option>
						<option value="Mozzarella">HostC</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Select vm list</label>
				<div class="col-sm-6">
					
					<script type="text/javascript">
					$(document).ready(function() {
					$('#example-getting-started1').multiselect();
					});
					</script>
					<select id="example-getting-started1" multiple="multiple">
						<option value="cheese">VMA</option>
						<option value="tomatoes">VMB</option>
						<option value="Mozzarella">VMC</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Select migration environment</label>
				<div class="col-sm-6">
					
					<script type="text/javascript">
					$(document).ready(function() {
					$('#example-single').multiselect();
					});
					</script>
					<select id="example-single">
						<option value="1">envA</option>
						<option value="2">envB</option>
						<option value="3">envC</option>
					</select>
				</div>
			</div>

		</form>
		
	</div>
</div>
<div class="form-group">
				<div class="col-sm-offset-4 col-sm-10">
					<a href="#" class="btn btn-info btn-sm"><i class="fa fa-floppy-o "></i> Save</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
					
				</div>
			</div>
@stop
@extends('layouts.sidebarsim')
@section('content')
{{ HTML::script('mlselect/docs/js/jquery-2.1.1.min.js') }}
{{ HTML::script('mlselect/docs/js/bootstrap-3.2.0.min.js') }}
{{ HTML::style('mlselect/dist/css/bootstrap-multiselect.css') }}
{{ HTML::script('mlselect/dist/js/bootstrap-multiselect.js') }}
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li><a href="#">Simulation setup</a></li>
	<li href="#" class="active">Simulation setup create</li>
</ol>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Please add configuration to simulation</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Simulation setup name</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="inputEmail3" value="" placeholder="enter your simulation setup name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Select configuration list</label>
				
				<div class="col-sm-6">
					
					<script type="text/javascript">
					$(document).ready(function() {
					$('#example-single').multiselect();
					});
					</script>
					<select id="example-single">
						<option value="1">configA</option>
						<option value="2">configB</option>
						<option value="3">configC</option>
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
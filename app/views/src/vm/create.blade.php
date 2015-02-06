@extends('layouts.sidebarsim')
@section('content')
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li><a href="#">Source vm</a></li>
	<li href="#" class="active">Create vm</li>
</ol>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Settings</h3>
	</div>
	<div class="panel-body">
		
		
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">VM name</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="inputEmail3" value="" placeholder="enter your VM name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Amount</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter your amount">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Processing units</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter your processing units">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">RAM(MB)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter your RAM">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Bandwidth(Mbit/s)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter your bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Scheduling policy</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>Dynamic Workload</option>
						<option>Time shared</option>
						<option>Space shared</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">MIPS/PE</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter your MIPS/PE">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Storage(MB)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter your storage">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Priority</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>col-sm-10</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">(QoS)Maximum down time(Min)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter maximum down time">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-10">
					<a href="#" class="btn btn-info btn-sm"><i class="fa fa-floppy-o "></i> Save</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
					
				</div>
			</div>
		</form>
	</div>
</div>
<script>
    $("input[name='demo_vertical']").TouchSpin({
      verticalbuttons: true,
      
    });
</script>
 {{ HTML::script('js/jquery.bootstrap-touchspin.min.js') }}
@stop




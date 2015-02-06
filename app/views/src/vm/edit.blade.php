@extends('layouts.sidebarsim')
@section('content')
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li><a href="#">Source vm</a></li>
	<li href="#" class="active">Edit vm</li>
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
					<input type="email" class="form-control" id="inputEmail3" value="A">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Amount</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="1" name="demo_vertical">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Processing units</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="4" name="demo_vertical">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">RAM(MB)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="100000" name="demo_vertical">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Image size(MB)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="1000000" name="demo_vertical">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Bandwidth(Mbit/s)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="1000000" name="demo_vertical">
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">MIPS/PE</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="2400" name="demo_vertical">
				</div>
			</div>
				<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Hypervisor</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>XEN</option>
						<option>KVM</option>
					</select>
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
				<label for="inputPassword3" class="col-sm-4 control-label">Priority</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">(QoS)Maximum down time(Min)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="30" name="demo_vertical">
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
        min: 0,
                max: 1000000000,
                maxboostedstep: 10000000,
                
    });
</script>
@stop




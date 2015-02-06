@extends('layouts.sidebarsim')
@section('content')
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li><a href="#">Source host</a></li>
	<li href="#" class="active">Edit host</li>
</ol>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Settings</h3>
	</div>
	<div class="panel-body">
		
		
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Host Id</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="inputEmail3" value="1" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Host name</label>
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
				<label for="inputPassword3" class="col-sm-4 control-label">Storage(MB)</label>
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
				<label for="inputPassword3" class="col-sm-4 control-label">VMs scheduling</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>Time shared</option>
						<option>Time shared</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">MIPS/PE</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="2400" name="demo_vertical">
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




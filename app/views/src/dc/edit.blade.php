@extends('layouts.sidebarsim')
@section('content')
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li><a href="#">Source datacenter</a></li>
	<li href="#" class="active">Settings</li>
</ol>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Settings</h3>
	</div>
	<div class="panel-body">
		
		
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Name</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="inputEmail3" placeholder="Datacenter name" value="Datacenter1">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">VM allocation policy</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>Simple</option>
						<option>Simple</option>
						<option>Simple</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Architecture</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>x86</option>
						<option>x64</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Operating system</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>Linux</option>
						<option>Windows</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Hypervisor</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>Xen</option>
					</select>
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
@stop
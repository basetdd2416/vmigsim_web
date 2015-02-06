@extends('layouts.sidebarsim')
@section('content')
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li class="active">Migration environment</li>
</ol>
<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">List of migration environmet name:</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>environmentA</option>
						<option>environmentB</option>
						<option>environmentC</option>
					</select>
				</div>
			</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group"> 
		<a class="btn btn-small btn-success btn-sm " href="{{ URL::to('simulation/migration/create') }}"><i class="fa fa-plus "></i>Create</a>
		<a class="btn btn-small btn-info btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-pencil-square-o"></i>Edit</a>
	<a class="btn btn-small btn-danger btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-times"></i>Remove</a>
		</div>
	</div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Migration environment</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6 text-right">
				<label  for="input-id">Migration environtment name:</label>
			</div>
			<div class="col-md-1">
				<label for="input-id">environmentA</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6  text-right">
				<label for="input-id">Migration algorithm:</label>
			</div>
			<div class="col-md-3 ">
				<label for="input-id">Pre-copy</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6  text-right">
				<label for="input-id">Scheduling algorithm:</label>
			</div>
			<div class="col-md-3 ">
				<label for="input-id">FIFO</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6  text-right">
				<label for="input-id">Control algorithm:</label>
			</div>
			<div class="col-md-3 ">
				<label for="input-id">Open-loop</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6  text-right">
				<label for="input-id">Time limitation of migration(Min):</label>
			</div>
			<div class="col-md-3 ">
				<label for="input-id">35</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6  text-right">
				<label for="input-id">Network bandwidth(Mbit/s):</label>
			</div>
			<div class="col-md-3 ">
				<label for="input-id">1000</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 text-right">
				<label for="input-id">Network type:</label>
			</div>
			<div class="col-md-3 ">
				<label for="input-id">Dynamic</label>
			</div>
		</div>
	</div>
</div>

@stop
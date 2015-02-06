@extends('layouts.sidebarsim')
@section('content')
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li class="active">Simulation setup</li>
</ol>
<div class="row">
<div class="form-group">
				<label for="inputPassword3" class="col-sm-3 control-label">List of simulation name:</label>
				<div class="col-sm-4">
					<select class="form-control">
						<option>simA</option>
						<option>simB</option>
						<option>simC</option>
					</select>
				</div>
</div>
</div>
<br>
<div class="row">
			<div class="col-md-3">
				<label  for="input-id">Configuration name:</label>
			</div>
			<div class="col-md-1">
				<label for="input-id">configA</label>
			</div>
</div>
<br>
<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group"> 
		<a class="btn btn-small btn-success btn-sm " href="{{ URL::to('simulation/simsetup/create') }}"><i class="fa fa-plus "></i>Create</a>
		<a class="btn btn-small btn-info btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-pencil-square-o"></i>Edit</a>
	<a class="btn btn-small btn-danger btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-times"></i>Remove</a>
		</div>
	</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group"> 
		<a class="btn btn-small btn-primary btn-lg " href="{{ URL::to('simulation/simsetup/create') }}"><i class="fa fa-play "></i>Run simulation</a>
		</div>
	</div>
	</div>



		
@stop
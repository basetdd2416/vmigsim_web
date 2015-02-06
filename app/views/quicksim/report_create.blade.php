@extends('layouts.sidebarsim')
@section('content')
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="100"
  aria-valuemin="0" aria-valuemax="100" style="width:100%">
    4/4
  </div>
</div>
<h1>Overview your setting information</h1>
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Export</a>
	</div>
</div>
<br>
<div class="row">
	<label for="input-id" class="col-sm-3">Configuration name</label>
	<label for="input-id" class="col-sm-2">configA</label>
</div>
<br>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">VMs information</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form">
		
		ข้อมูลจากหน้า create vm
					
					<div class="form-group">
				<div class="col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
				</div>
				
					
					
				
			</div>
				</form>
			</div>
			
		
</div>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Migration environment information</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form">
		
		ข้อมูลจากหน้า migration environment
					<div class="form-group">
				<div class="col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
				</div>
				
					
					
				
			</div>
					
				</form>
			</div>
			
		
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o "></i> Save</a>
		<a href="#" class="pull-right btn btn-primary btn-sm"><i class="fa fa-play"></i> Start simulation</a>
	</div>
</div>
@stop
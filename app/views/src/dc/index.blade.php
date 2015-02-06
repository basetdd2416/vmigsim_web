@extends('layouts.sidebarsim')
@section('content')

<ol class="breadcrumb">
  <li><a href="#">Simulation</a></li>
  <li class="active">Source datacenter</li>
</ol>
<p class="text-right">
<a href="{{ URL::to('simulation/srcdc/1/edit') }}" class="btn btn-info"><i class="glyphicon glyphicon-cog"></i>Settings</a>

</p>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Data Center Information</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6 text-right">
				<label  for="input-id">Number of hosts</label>
			</div>
			<div class="col-md-1">
				<label for="input-id">3</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6  text-right">
				<label for="input-id">Number of VMs</label>
			</div>
			<div class="col-md-1 ">
				<label for="input-id">3</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 text-right">
				<label for="input-id">Number of processing units</label>
			</div>
			<div class="col-md-1 ">
				<label for="input-id">12</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 text-right">
				<label for="input-id">Processing capacity (MIPS)</label>
			</div>
			<div class="col-md-1 ">
				<label for="input-id">7,200</label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 text-right">
				<label for="input-id">Number of VMs</label>
			</div>
			<div class="col-md-1 ">
				<label for="input-id">3</label>
			</div>
		</div>
	</div>
</div>
@stop
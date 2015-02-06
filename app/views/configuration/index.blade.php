@extends('layouts.sidebarsim')
@section('content')
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li class="active">Configuration</li>
</ol>


<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">List of configuration name:</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>configA</option>
						<option>configB</option>
						<option>configC</option>
					</select>
				</div>
</div>



	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="form-group"> 
		<a class="btn btn-small btn-success btn-sm " href="{{ URL::to('simulation/configuration/create') }}"><i class="fa fa-plus "></i>Create</a>
		<a class="btn btn-small btn-info btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-pencil-square-o"></i>Edit</a>
	<a class="btn btn-small btn-danger btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-times"></i>Remove</a>
		</div>
	</div>
	</div>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Data center information</h3>
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
				<label for="input-id">Total processing capacity (MIPS)</label>
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

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Migration environment information</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6 text-right">
				<label  for="input-id">Migration environment name:</label>
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
				<label for="input-id">1 GB</label>
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

<div class="panel panel-info">

	<div class="panel-heading">
		<h3 class="panel-title">Hosts information</h3>
	</div>

	<div class="panel-body"  >
		
		
		
		<div class="table-responsive ">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						
						<th>#</th>
						<th class="col-md-1">Host name</th>
						<th class="col-md-2">VMs scheduling</th>
						<th class="col-md-1">PEs</th>
						<th>MIPS / PE</th>
						<th>RAM (MB)</th>
						<th>Storage (MB)</th>
						<th class="col-md-1">Bandwidth (Mbit/s)</th>
						<th class="col-md-1">Num VMs</th>
			
						
						
						
					</tr>
				</thead>
				

				<tbody>
					{{--*/ $var = 1 /*--}}
					
					
					<tr>
						<td>{{ $var }}</td>
						<td>A</td>
						<td>Time shared</td>
						<td>4</td>
						<td>2400</td>
						<td>100000</td>
						<td>1000000</td>
						<td>1000000</td>
						<td>1</td>

					
						<?php $var++ ?>
					</tr>

					<tr>
						<td>{{ $var }}</td>
						<td>B</td>
						<td>Time shared</td>
						<td>4</td>
						<td>2400</td>
						<td>100000</td>
						<td>1000000</td>
						<td>1000000</td>
						<td>1</td>

					
						<?php $var++ ?>
					</tr>
					<tr>
						<td>{{ $var }}</td>
						<td>C</td>
						<td>Time shared</td>
						<td>4</td>
						<td>2400</td>
						<td>100000</td>
						<td>1000000</td>
						<td>1000000</td>
						<td>1</td>

						
						<?php $var++ ?>
					</tr>
				</tbody>
			</table>
		</div>
</div>
</div>
<div class="panel panel-info">

	<div class="panel-heading">
		<h3 class="panel-title">VMs information</h3>
	</div>

	<div class="panel-body"  >
		
		
		
		<div class="table-responsive ">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						
						<th>#</th>
						<th class="col-md-1">Vm name</th>
						<th class="col-md-1">Scheduling policy</th>
						<th class="col-md-1">PEs</th>
						<th>MIPS / PE</th>
						<th>RAM (MB)</th>
							<th class="col-md-1">Storage (MB)</th>
						<th class="col-md-1">Bandwidth (Mbit/s)</th>
						<th class="col-md-1">Priority</th>
						<th class="col-md-1">Hypervisor</th>
						
						
						
						
						
					</tr>
				</thead>
				<tbody>
				{{--*/ $var = 1 /*--}}
				

					<tr>
						<td>1</td>
						<td>A</td>
						<td>Time shared</td>
						<td>4</td>
						<td>2400</td>
						<td>100000</td>
						<td>1000</td>
						<td>1000000</td>
						<td>1</td>
						<td>KVM</td>
						

						
					

					</tr>
					<tr>
						<td>2</td>
						<td>B</td>
						<td>Time shared</td>
						
						<td>4</td>
						<td>2400</td>
						<td>100000</td>
						<td>1000</td>
						<td>1000000</td>
						<td>1</td>
						<td>KVM</td>
						

						
					

					</tr>
					<tr>
						<td>3</td>
						<td>C</td>
						<td>Time shared</td>
	
						<td>4</td>
						<td>2400</td>
						<td>100000</td>
						<td>1000</td>
						<td>1000000</td>
						<td>1</td>
						<td>KVM</td>
						

					
					

					</tr>
					
					
				</tbody>
			</table>
		</div>
	</div>
</div>




@stop
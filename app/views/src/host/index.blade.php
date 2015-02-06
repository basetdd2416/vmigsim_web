@extends('layouts.sidebarsim')
@section('content')
<ol class="breadcrumb">
	<li><a href="#">Simulation</a></li>
	<li class="active">Source Host</li>
</ol>
<div class="form-group"> <a class="btn btn-small btn-success btn-sm " href="{{ URL::to('simulation/srchost/create') }}"><i class="fa fa-plus "></i>Create</a></div>
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
						<th class="col-md-4">Action</th>
						
						
						
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

						<td>
						<a class="btn btn-small btn-info btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-pencil-square-o"></i>Edit</a>
						<a class="btn btn-small btn-danger btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-times"></i>Remove</a> </td>
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

						<td>
						<a class="btn btn-small btn-info btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-pencil-square-o"></i>Edit</a>
						<a class="btn btn-small btn-danger btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-times"></i>Remove</a> </td>
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

						<td>
						<a class="btn btn-small btn-info btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-pencil-square-o"></i>Edit</a>
						<a class="btn btn-small btn-danger btn-sm" href="{{ URL::to('simulation/srchost/1/edit') }}"><i class="fa fa-times"></i>Remove</a> </td>
						<?php $var++ ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


	@stop
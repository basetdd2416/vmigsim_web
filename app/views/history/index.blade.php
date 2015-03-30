@extends('layouts.sidebarsim')
@section('content')
<h1>History simulation</h1>
<hr>
<div class="alert alert--sim" role="alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<ul>
	</ul>
</div>
<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				History of simulation running
			</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
				<!-- content of simlist-->
				<div class="text-right">
					From {{$sim_list->getFrom()}} to {{$sim_list->getTo()}} of {{$sim_list->getTotal()}}
				</div>
				<div class="table-responsive">
					<table id="simlist" class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Sim name</th>
								<th>Details</th>
								<th>Started</th>
								<th>Finished</th>
								<th>Status</th>
								<th>Link to result</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = $sim_list->getFrom()?>
							@foreach ($sim_list as $sim)
							<tr>
								<td>{{$i}}</td>
								<td>{{$sim->sim_name}}</td>
								<td><a class="details" href="{{$sim->id}}"> <i class="fa fa-eye"></i></a></td>
								@if($sim->status == 'running')
								<td>{{$sim->started}}</td>
								<td>waiting</td>
								<td><span class="label label-info">{{$sim->status}}</span></td>
								<td>waiting</td>
								@else
								<td>{{$sim->started}}</td>
								<td>{{$sim->finished}}</td>
								<td><span class="label label-success">{{$sim->status}}</span></td>
								<td><a href="simulation_result/{{$sim->id}}" target="_blank"> <i class="fa fa-bar-chart"></i></a></td>
								@endif
								
							</tr>
							<?php $i++ ?>
							@endforeach
							
						</tbody>
					</table>
					<div class="text-center">
						{{$sim_list->links()}}
					</div>
					
				</div>
			</div>
		</div>
	</div>

@section('js')
{{ HTML::script('js/jquery.bootstrap-touchspin.js') }}
{{ HTML::script('js/jquery.serialize-object.js') }}
{{ HTML::style('css/flipclock.css') }}
{{ HTML::script('js/flipclock.js') }}
{{ HTML::script('js/run_prettify.js') }}
{{ HTML::style('css/bootstrap-dialog.css') }}
{{ HTML::script('js/bootstrap-dialog.js') }}
{{ HTML::script('js/runsim.js') }}
<script type="text/javascript">
	$(function() {
		$('#sidebar .nav > li').removeClass('active');
		$('#sidebar .nav > li:eq(2)').addClass('active'); 
		checkStatus();
	});
	$("input[name='round']").TouchSpin({
	verticalbuttons: true,
	max: 100,
	initval: 10
	});
	
</script>
@stop

@stop
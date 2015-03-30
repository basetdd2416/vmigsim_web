<div class="panel-body">
				<!-- content of simlist-->
				<div class="text-right">
					From {{$sim_list->getFrom()}} to {{$sim_list->getTo()}} of {{$sim_list->getTotal()}}
				</div>
				<div class="table-responsive">
					<table id="simlist" class="table table-hover" >
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
								@if($sim->status == 'running')
								<tr class="run">
								@else
								<tr>
								@endif
									<td>{{$i}}</td>
									<td>{{$sim->sim_name}}</td>
									<td><a class="details" href="{{$sim->id}}"> <i class="fa fa-eye"></i></a></td>
									@if($sim->status == 'running')
										<td>waiting</td>
										<td>waiting</td>
										<td><span class="label label-info">{{$sim->status}}</span></td>
										<td>waiting</td>
									@else 
										<td>{{$sim->started}}</td>
										<td>{{$sim->finished}}</td>
										<td><span class="label label-success">{{$sim->status}}</span></td>
										<td><a href="{{URL::to('simulation/simulation_result/'.$sim->id)}}" target="_blank"> <i class="fa fa-bar-chart"></i></a></td>
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
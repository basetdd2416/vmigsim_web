@extends('layouts.sidebarsim')
@section('content')
@if(Session::has('success_msg'))
<div class="alert alert-success alert-dismissible " role="alert" >
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<ul>
		{{Session::get('success_msg')}}
	</ul>
</div>
@endif
<h1 id="head-title">Run simulation</h1>
<hr>
<div class="alert alert--sim" role="alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<ul>
	</ul>
</div>
<div class="your-clock" style="display:none"></div>
<div class="row">
	<div id="clock" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div id="loading" style="display:none" >
			<p class="text-center"><img height="600" width="600" src="{{URL::to('images/loading-src-dest-3.gif')}}" /><br> Please Wait </p>
		</div>
	</div>
</div>
<div class="panel-group" id="accordion">
	
	<div id="run--info" class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				Simulation settings
			</a></i>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse in">
			<div class="panel-body">
				<!-- -->
				<form  class="form-horizontal myform" role="form" method="post">
					<div  class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">
							Create simulation
							</h3>
						</div>
						
						<div class="panel-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Simulation name</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="simulation_name" id="simulation_name" value="{{Input::old('simulation_name')}}" placeholder="enter your simulation name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-4 control-label">Round</label>
								<div class="col-sm-6">
									<input id="round" type="text" value="" name="round" placeholder="enter round">
								</div>
							</div>
							
						</div>
					</div>
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">
							
							Select configuaration
							</h3>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-4 control-label">Configuration name</label>
									<div class="col-sm-6">
										<select name="config_name" id="config_select" class="form-control" required="required">
											<option value="" selected disabled>Please select</option>
											@foreach($configs as $c)
											<option value="{{$c->id}}">{{$c->config_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<!-- vm info -->
								<div id="vm_info" class="panel panel-info" style="display:none;">
									<div class="panel-heading">
										<h3 class="panel-title">
										VMs informations</h3>
									</div>
									
									<div class="panel-body" >
										<div class="table-responsive">
											<table id="showVM" class="table table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>amount</th>
														<th>ram</th>
														<th>QoS</th>
														<th>priority</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
									
								</div>
								<!-- environment -->
								<div id="envi_info" class="panel panel-info" style="display:none;">
									<div class="panel-heading">
										<h3 class="panel-title">
										Environment informations</h3>
									</div>
									
									<div class="panel-body" >
										<div id = "status--psudo" style="display:none">
											<div class="form-group" style="display:none">
												<label for="inputEmail3" class="col-sm-4 control-label">Environment name:</label>
												<label id="envi_name" for="inputEmail3" class="control-label"></label>
											</div>
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-5 control-label">Time limitation of migration (Second):</label>
												<label id="time_limit" for="inputEmail3" class="control-label"></label>
											</div>
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Network bandwidth (Mbit/s):</label>
												<label id="bandwidth" for="inputEmail3" class="control-label"></label>
											</div>
											
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Network status:</label>
												<label id="network_type" for="inputEmail3" class="control-label"></label>
											</div>
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Page size (KB):</label>
												<label id="page_size" for="inputEmail3" class="control-label"></label>
											</div>
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Network interval (Second):</label>
												<label id="network_interval" for="inputEmail3" class="control-label"></label>
											</div>
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-4 control-label">Network Mean (Mbps):</label>
												<label id="network_mean" for="inputEmail3" class="control-label"></label>
											</div>
											<div id="containner-sd" class="form-group" style="display:none">
												<label for="inputEmail3" class="col-sm-4 control-label">Network SD (%):</label>
												<label id="network_sd" for="inputEmail3" class="control-label"></label>
											</div>
										</div>
										<div id="status--record" style="display:none">
											<label for="inputEmail3" class="col-sm-4 control-label">Record trace name:</label>
											<label id="record_trace_name" for="inputEmail3" class="control-label"></label>
										</div>
									</div>
								</div>
								
								<!-- application -->
								<div id="app_info" class="panel panel-info" style="display:none;">
									<div class="panel-heading">
										<h3 class="panel-title">
										Application informations</h3>
									</div>
									
									<div class="panel-body" >
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">WWS ratio (%):</label>
											<label id="wws_ratio" for="inputEmail3" class="control-label"></label>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">WWS dirty rate (%):</label>
											<label id="wws_dirty_rate" for="inputEmail3" class="control-label"></label>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Normal dirty rate (%):</label>
											<label id="normal_dirty_rate" for="inputEmail3" class="control-label"></label>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Max precopy round:</label>
											<label id="max_pre_round" for="inputEmail3" class="control-label"></label>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Min dirty page:</label>
											<label id="min_dirty_page" for="inputEmail3" class="control-label"></label>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Max no progress round:</label>
											<label id="max_no_prog" for="inputEmail3" class="control-label"></label>
										</div>
									</div>
								</div>
								
								
								<!-- Policy information. -->
								<div id="policy_info" class="panel panel-info" style="display:none;">
									<div class="panel-heading">
										<h3 class="panel-title">
										Policy informations</h3>
									</div>
									
									<div class="panel-body" >
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Migration policy:</label>
											<label id="migration" for="inputEmail3" class="control-label"></label>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Schedule policy:</label>
											<label id="schedule" for="inputEmail3" class="control-label"></label>
										</div>
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-4 control-label">Control policy:</label>
											<label id="control" for="inputEmail3" class="control-label"></label>
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="form-group">
						<br>
						<div class="col-sm-offset-4 col-sm-8">
							<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
							<button id="setAllDefault" type="button" class="btn btn-sm btn-primary">
							<i class="fa fa-circle-o-notch"></i> set all default
							</button>
							<button id="nextPahse5" type="submit" class="btn btn-sm btn-success update_form">
							<i class="fa fa-play-circle-o"></i> Run
							</button>
						</div>
					</div>
				</form>
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
	$("input[name='round']").TouchSpin({
	verticalbuttons: true,
	max: 100,
	initval: 10
	});
</script>
@stop
@stop
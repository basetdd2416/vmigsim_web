@extends('layouts.sidebarsim')
@section('content')
<style type="text/css">
.panel-heading a:after {
font-family:'Glyphicons Halflings';
content:"\e114";
float: right;
color: grey;
}
.panel-heading a.collapsed:after {
content:"\e080";
}
</style>
@if(Session::has('success_msg'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	{{Session::get('success_msg')}}
</div>
@endif
<h1>Run simulation</h1>
<hr>
<h3> Comming soon..... </h3>
<div class="alert alert-danger alert-dismissible danger" role="alert" style="display:none;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <ul>

  </ul>
</div>
<form   class="form-horizontal" role="form" method="post">
	<div id="phase1" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			Create simulation </a>
			</h3>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Simulation name</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" name="simulation_name" id="simulation_name" value="{{Input::old('simulation_name')}}" placeholder="enter your simulation name">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Round</label>
					<div class="col-sm-6">
						<input id="round" type="text" value="" name="round" placeholder="enter round">
					</div>
				</div>
				<div class="form-group pull-right">
					
					<div class="col-sm-12 ">
						
						<button id="nextPahse5" type="submit" class="btn btn-primary update_form">
						<i class="fa fa-caret-right"></i> Next
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="phase2" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
			Select configuaration </a>
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
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo_one">VMs informations</a></h3>
					</div>
					<div id="collapseTwo_one" class="panel-collapse collapse in">
						<div class="panel-body" >
							<div class="table-responsive">
								<table id="showVM" class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>amonut</th>
											<th>ram</th>
											<th>qos</th>
											<th>priority</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- application -->
				<div id="app_info" class="panel panel-info" style="display:none;">
					<div class="panel-heading">
						<h3 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo_two">Application informations</a></h3>
					</div>
					<div id="collapseTwo_two" class="panel-collapse collapse in">
						<div class="panel-body" >
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">WWS ratio:</label>
								<label id="wws_ratio" for="inputEmail3" class="control-label"></label>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Normal dirty rate:</label>
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
				</div>
				<!-- environment -->
				<div id="envi_info" class="panel panel-info" style="display:none;">
					<div class="panel-heading">
						<h3 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo_three">Environment informations</a></h3>
					</div>
					<div id="collapseTwo_three" class="panel-collapse collapse in">
						<div class="panel-body" >
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Environment name:</label>
								<label id="envi_name" for="inputEmail3" class="control-label"></label>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Bandwidth:</label>
								<label id="bandwidth" for="inputEmail3" class="control-label"></label>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Limit time:</label>
								<label id="time_limit" for="inputEmail3" class="control-label"></label>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Network interval:</label>
								<label id="network_interval" for="inputEmail3" class="control-label"></label>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">Network sd:</label>
								<label id="network_sd" for="inputEmail3" class="control-label"></label>
							</div>
						</div>
					</div>
				</div>
				<!-- Policy information. -->
				<div id="policy_info" class="panel panel-info" style="display:none;">
					<div class="panel-heading">
						<h3 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo_four">Policy informations</a></h3>
					</div>
					<div id="collapseTwo_four" class="panel-collapse collapse in">
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
	</div>
	<div id="phase6" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
				Overview your setting information
			</a>
			</h3>
		</div>
		<div id="collapseSix" class="panel-collapse collapse">
			<div class="panel-body">
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
						ข้อมูลจากหน้า create vm
						<div class="form-group">
							<div class="col-sm-4">
								<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
							</div>
							
							
							
							
						</div>
						
					</div>
					
					
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Migration environment information</h3>
					</div>
					<div class="panel-body">
						ข้อมูลจากหน้า migration environment
						<div class="form-group">
							<div class="col-sm-4">
								<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
							</div>
						</div>
						
						
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
						<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
						<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
					</div>
					<div class="col-sm-4">
						<button id="backPhase5" type="button" class="btn btn-primary">
						<i class="fa fa-caret-left"></i> back
						</button>
						<button id="nextPhase6" type="submit" class="update_form btn btn-primary">
						<i class="fa fa-caret-right"></i> run
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		
		<div class="col-sm-12">
			<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
			<button id="setAllDefault" type="button" class="btn btn-sm btn-primary">
			<i class="fa fa-circle-o-notch"></i> set all default
			</button>
			<button id="nextPahse5" type="submit" class="btn btn-sm btn-success update_form">
					<i class="fa fa-floppy-o"></i> save
			</button>
		</div>
		
	</form>
	<div class="panel-default">
		<div class="panel-heading">
			<h3 class="readMore panel-title"><a>Panel title</a></h3>
		</div>
		<div class="content panel-body" style="display:none">
			Panel content
		</div>
	</div>
	<div class="panel-default">
		<div class="panel-heading">
			<h3 class="readMore panel-title"><a>Panel title</a></h3>
		</div>
		<div class="content panel-body" style="display:none">
			Panel content
		</div>
	</div>
	@section('js')
	{{ HTML::script('js/jquery.bootstrap-touchspin.js') }}
	{{ HTML::script('js/jquery.serialize-object.js') }}
	{{ HTML::script('js/runsim.js') }}
	<script type="text/javascript">
		$("input[name='round']").TouchSpin({
		verticalbuttons: true,
		max: 100,
		initval: 1
		});
	</script>
	@stop
	@stop
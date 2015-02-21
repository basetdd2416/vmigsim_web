@extends('layouts.sidebarsim')
@section('content')

<style type="text/css">
.panel-heading .accordion-toggle:after {
/* symbol for "opening" panels */
font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
content: "\e114";    /* adjust as needed, taken from bootstrap.css */
float: right;        /* adjust as needed */
color: grey;         /* adjust as needed */
}
.panel-heading .accordion-toggle.collapsed:after {
/* symbol for "collapsed" panels */
content: "\e080";    /* adjust as needed, taken from bootstrap.css */
}
</style>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div id="loading" style="display:none" >
			<p class="text-center"><img height="200" width="200" src="{{URL::to('images/loading.gif')}}" /><br> Please Wait </p>
		</div>
	</div>
</div>
<form  class="form-horizontal myform" role="form" method="post">
	
	<h1>Create from existing configuration</h1>
	<div class="alert alert-danger alert-dismissible danger" role="alert" style="display:none;">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <ul>

	  </ul>
	</div>

<div class="alert alert-success alert--success__reset alert-dismissible success" role="alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<ul>
	</ul>
</div>
	<hr>
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseConfigList">Select configuration name</a>
			</h3>
		</div>
		<div id="collapseConfigList" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Configuration name</label>
					<div class="col-sm-6">
						<select required="required" name="cf-ajx" id="cf-ajx" class="form-control" >
							<option value="" selected disabled>Please select</option>
							
							@foreach($configs as $c)
							<option value="{{$c->id}}">{{$c->config_name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="config_info" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			Create configuration</a>
			</h3>
		</div>
		<div id="collapseOne" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Configuration name</label>
					<div class="col-sm-6">
						{{ Form::text('name', Input::old('name'), array('class' => 'form-control','id'=>'name')) }}
						
					</div>
				</div>
				<div class="form-group">
					
					<div class="col-sm-2 pull-right">
						
						<button id="nextPahse1" type="button" class="btn btn-primary" name="btnConfig" value="1">
						<i class="fa fa-caret-right"></i> Next
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="vm_info" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				Create VM
			</a>
			</h3>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Amount</label>
					<div class="col-sm-6">
						<input id="amount" type="text" value="" name="amount" placeholder="enter your amount">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">RAM(MB)</label>
					<div class="col-sm-6">
						<input id="ram" type="text" value="" name="ram" placeholder="enter your RAM">
					</div>
				</div>
				
				
				
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Priority</label>
					<div class="col-sm-6">
						<select id="priority" name="priority" class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
					<a id="mytool" href="#" data-toggle="tooltip" title="ลำดับความสำคัญเลขน้อยจะสำคัญมากที่สุด"><i class="fa fa-question-circle"></i> </a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">(QoS)Maximum down time(Min.)</label>
					<div class="col-sm-6">
						<input id="qos" type="text" value="" name="qos" placeholder="enter maximum down time">
					</div>
				</div>
				<div class="form-group">
					
					<div class="col-sm-4 pull-right">
						<button id="backPhase1" type="button" class="btn btn-primary">
						<i class="fa fa-caret-left"></i> back
						</button>
						<button id="addVM" type="button" class="btn btn-primary">
						<i class="fa fa-caret-right"></i> add
						</button>
						<button id="nextPahse2" type="button" class="btn btn-primary">
						<i class="fa fa-caret-right"></i> Next
						</button>
					</div>
				</div>
				<div class="alert alert-success alert--vm alert-dismissible success " role="alert" style="display:none;">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <ul>

				  </ul>
				</div>
				<table id="showVM" class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>amount</th>
							<th>ram</th>
							<th>qos</th>
							<th>priority</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
	<div id="envi_info" class="panel panel-info">
	<div class="panel-heading">

		<h3 class="panel-title">
 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
			Create migration environment
		</a>
		</h3>
	</div>
		<div id="collapseThree" class="panel-collapse collapse">
	<div class="panel-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Migration environment name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="enviname_name" id="enviname_name" value="" placeholder="enter your migration enviroment name">
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Time limitation of migration (Min.)</label>
				<div class="col-sm-6">
					<input id="limit_time" name="limit_time" type="text" value="" placeholder="enter your time limitation of migration">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network bandwidth (Mbit/s)</label>
				<div class="col-sm-6">
					<input id="network_bandwidth" type="text" value="" name="network_bandwidth" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network status</label>
				<div class="col-sm-6">
					<select id="network_status" name="network_status" class="form-control">
						
						<option value="stable">Stable</option>
						<option value="dynamic">Dynamic</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Page size (KB)</label>
				<div class="col-sm-6">
					<input id="page_dirty" type="text" value="" name="page_dirty" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network Interval (Second)</label>
				<div class="col-sm-6">
					<input id="network_interval" type="text" value="" name="network_interval" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network SD (%)</label>
				<div class="col-sm-6">
					<input id="network_sd" type="text" value="" name="network_sd" placeholder="enter your network bandwidth">
				</div>
			</div>
				<div class="form-group">
					
					<div class="col-sm-4 pull-right">
						<button id="backPhase2" type="button" class="btn btn-primary">
						<i class="fa fa-caret-left"></i> Back
						</button>
						<button id="nextPahse3" type="button" class="btn btn-primary">
						<i class="fa fa-caret-right"></i> Next
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="app_info" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
				Create application setting
			</a>
			</h3>
		</div>
		<div id="collapseFour" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">WWS ratio (%)</label>
					<div class="col-sm-6">
						<input id="wwws_ratio" name="wwws_ratio" type="text" value="" placeholder="enter your time limitation of migration">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">WWS dirty rate (%)</label>
					<div class="col-sm-6">
						<input id="wws_dirty_rate" type="text" value="" name="wws_dirty_rate" placeholder="enter your network bandwidth">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Normal dirty rate (%)</label>
					<div class="col-sm-6">
						<input id="normal_dirty_rate" type="text" value="" name="normal_dirty_rate" placeholder="enter your network bandwidth">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Max precopy round</label>
					<div class="col-sm-6">
						<input id="max_pre_copy_rate" type="text" value="" name="max_pre_copy_rate" placeholder="enter your network bandwidth">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Min dirt page</label>
					<div class="col-sm-6">
						<input id="min_dirty_page" type="text" value="" name="min_dirty_page" placeholder="enter your network bandwidth">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Max no progress round</label>
					<div class="col-sm-6">
						<input id="max_no_prog_round" type="text" value="" name="max_no_prog_round" placeholder="enter your network bandwidth">
					</div>
				</div>
				<div class="form-group">
					
					<div class="col-sm-4 pull-right">
						<button id="backPhase3" type="button" class="btn btn-primary">
						<i class="fa fa-caret-left"></i> Back
						</button>
						<button id="nextPahse4" type="button" class="btn btn-primary">
						<i class="fa fa-caret-right"></i> Next
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="policy_info" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
				Ccreate policy settings
			</a>
			</h3>
		</div>
		<div id="collapseFive" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Migration algorithm</label>
					<div  class="col-sm-6">
						<select id="migration_algorithm" name="migration_algorithm" class="form-control">
							
							<option value="offline">Offline</option>
							<option value="precopy">Pre-copy</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Scheduling algorithm</label>
					<div class="col-sm-6">
						<select id="scheduling_algorithm" name="scheduling_algorithm" class="form-control">
							
							<option value="fifo">FIFO</option>
							<option value="priority">Priority based</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Control alogorithm</label>
					<div class="col-sm-6">
						<select id="control_algorithm" name="control_algorithm" class="form-control">
							
							<option value="openloop">Open loop</option>
							<option value="closeloop">Close loop</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					
					<div class="col-sm-4 pull-right">
						<button id="backPhase4" type="button" class="btn btn-primary">
						<i class="fa fa-caret-left"></i> back
						</button>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		
		<div class="col-sm-offset-4 col-sm-12">
			<a href="{{URL::to('simulation/quicksim')}}" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> cancel</a>
			<button id="setAllDefault" type="button" class="btn btn-sm btn-primary">
			<i class="fa fa-circle-o-notch"></i> reset all default
			</button>
			<button id="nextPahse5" type="submit" class="btn btn-sm btn-success update_form">
			<i class="fa fa-floppy-o"></i> save
			</button>
		</div>
	</form>
	
</div>
@section('js')
{{ HTML::script('js/jquery.bootstrap-touchspin.js') }}
{{ HTML::script('js/jquery.serialize-object.js') }}
{{ HTML::script('js/quicksim.js') }}
{{ HTML::script('js/exist-config.js') }}
<script type="text/javascript">
//part of spinnere
$("input[name='amount']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 1
});
$("input[name='ram']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 512
});
$("input[name='qos']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 30
});
$("input[name='network_interval']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 1
});
$("input[name='network_sd']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 54.8222
});
$("input[name='wwws_ratio']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 1
});
$("input[name='wws_dirty_rate']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 90
});
$("input[name='normal_dirty_rate']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 20
});
$("input[name='max_pre_copy_rate']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 30
});
$("input[name='min_dirty_page']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 50
});
$("input[name='max_no_prog_round']").TouchSpin({
verticalbuttons: true,
max: 1000,
initval: 2
});

$("input[name='demo_vertical']").TouchSpin({
verticalbuttons: true,
});
$("input[name='limit_time']").TouchSpin({
verticalbuttons: true,
});
$("input[name='network_bandwidth']").TouchSpin({
verticalbuttons: true,
});
$("input[name='page_dirty']").TouchSpin({
verticalbuttons: true,

});
</script>
@stop
@stop
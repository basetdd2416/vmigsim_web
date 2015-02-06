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
<div class="progress">
	<div class="progress-bar" role="progressbar" aria-valuenow="25"
		aria-valuemin="0" aria-valuemax="100" style="width:25%">
		1/4
	</div>
</div>
<form action="{{ URL::to('simulation/quicksim/saveconfig')}}" class="form-horizontal" role="form" method="post">
<div class="panel-group" id="accordion">
	<div id="phase1" class="panel panel-info">
		<div class="panel-heading">

			<h3 class="panel-title">
				 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				Create configuration</a>
			</h3>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
		<div class="panel-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Configuration name</label>
				<div class="col-sm-6">
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control','id'=>'name')) }}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-5">
					
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-2">
					
					<button id="nextPahse1" type="button" class="btn btn-primary">
					<i class="fa fa-caret-right"></i> Next
					</button>
				</div>
			</div>
		</div>
	</div>
	</div>


	<div id="phase2" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Create VM</h3>
		</div>
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
				<a id="mytool" href="#" data-toggle="tooltip" title="first tooltip"><i class="fa fa-question-circle"></i> </a>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">(QoS)Maximum down time(Min.)</label>
				<div class="col-sm-6">
					<input id="qos" type="text" value="" name="qos" placeholder="enter maximum down time">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
					<button id="backPhase1" type="button" class="btn btn-primary">
					<i class="fa fa-caret-left"></i> back
					</button>
					<button id="nextPahse2" type="button" class="btn btn-primary">
					<i class="fa fa-caret-right"></i> Next
					</button>
				</div>
			</div>
		</div>
	</div>


<div id="phase3" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Create migration environment</h3>
	</div>
	<div class="panel-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Migration environment name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="enviname_name" id="enviname_name" value="" placeholder="enter your migration enviroment name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Migration algorithm</label>
				<div  class="col-sm-6">
					<select id="migration_algorithm" name="migration_algorithm" class="form-control">
						<option value="" selected disabled>Please select</option>
						<option>Offline</option>
						<option>Pre-copy</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Scheduling algorithm</label>
				<div class="col-sm-6">
					<select id="scheduling_algorithm" name="scheduling_algorithm" class="form-control">
						<option value="" selected disabled>Please select</option>
						<option>FIFO</option>
						<option>Priority based</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Control alogorithm</label>
				<div class="col-sm-6">
					<select id="control_algorithm" name="control_algorithm" class="form-control">
						<option value="" selected disabled>Please select</option>
						<option>Open loop</option>
						<option>Close loop</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Time limitation of migration (Min.)</label>
				<div class="col-sm-6">
					<input id="limit_time" name="limit_time" type="text" value="" placeholder="enter your time limitation of migration">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network bandwidth(Mbit/s)</label>
				<div class="col-sm-6">
					<input id="network_bandwidth" type="text" value="" name="network_bandwidth" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network status</label>
				<div class="col-sm-6">
					<select id="network_status" name="network_status" class="form-control">
						<option value="" selected disabled>Please select</option>
						<option>Stable</option>
						<option>Dynamic</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Page size</label>
				<div class="col-sm-6">
					<input id="page_dirty" type="text" value="" name="page_dirty" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network Interval</label>
				<div class="col-sm-6">
					<input id="network_interval" type="text" value="" name="network_interval" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network SD</label>
				<div class="col-sm-6">
					<input id="network_sd" type="text" value="" name="network_sd" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
					<button id="backPhase2" type="button" class="btn btn-primary">
					<i class="fa fa-caret-left"></i> back
					</button>
					<button id="nextPahse3" type="button" class="btn btn-primary">
					<i class="fa fa-caret-right"></i> Next
					</button>
				</div>
			</div>
	</div>
</div>
<div id="phase4" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Create app setting</h3>
	</div>
	<div class="panel-body">
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">wwsRatio</label>
				<div class="col-sm-6">
					<input id="wwws_ratio" name="wwws_ratio" type="text" value="" placeholder="enter your time limitation of migration">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">wwsDirtyRate</label>
				<div class="col-sm-6">
					<input id="wws_dirty_rate" type="text" value="" name="wws_dirty_rate" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">normalDirtyRate</label>
				<div class="col-sm-6">
					<input id="normal_dirty_rate" type="text" value="" name="normal_dirty_rate" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">maxPreCopyRound</label>
				<div class="col-sm-6">
					<input id="max_pre_copy_rate" type="text" value="" name="max_pre_copy_rate" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">minDirtyPage</label>
				<div class="col-sm-6">
					<input id="min_dirty_page" type="text" value="" name="min_dirty_page" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">maxNoProgressRound</label>
				<div class="col-sm-6">
					<input id="max_no_prog_round" type="text" value="" name="max_no_prog_round" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
					<button id="backPhase3" type="button" class="btn btn-primary">
					<i class="fa fa-caret-left"></i> back
					</button>
					<button id="nextPahse4" type="button" class="btn btn-primary">
					<i class="fa fa-caret-right"></i> Next
					</button>
				</div>
			</div>
	</div>
</div>
<div id="phase5" class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Create simulation</h3>
	</div>
	<div class="panel-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Simulation name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="s" id="simulation_name" value="" placeholder="enter your simulation name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Number of simulation round</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="sim_round" id="sim_round" value="" placeholder="enter your round">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
					<button id="backPhase4" type="button" class="btn btn-primary">
					<i class="fa fa-caret-left"></i> back
					</button>
					<button id="nextPahse5" type="button" class="btn btn-primary">
					<i class="fa fa-caret-right"></i> Next
					</button>
				</div>
			</div>
	</div>
</div>
<div id="phase6">


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

	<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
					<button id="backPhase5" type="button" class="btn btn-primary">
					<i class="fa fa-caret-left"></i> back
					</button>
					<button id="nextPhase6" type="submit" class="btn btn-primary">
					<i class="fa fa-caret-right"></i> run
					</button>
				</div>
			</div>
</div>
</div>
</form>
<script type="text/javascript">
	var confname,amount,ram,priority,qos

	$(function() {
		// process when doc ready
		function hidePanels(){
			$('#phase2').hide();
			$('#phase3').hide();
			$('#phase4').hide();
			$('#phase5').hide();
			$('#phase6').hide();
		}

		// bin event btn
		$('#nextPahse1').click(processPhase1);
		$('#nextPahse2').click(processPhase2);
		$('#nextPahse3').click(processPhase3);
		$('#nextPahse4').click(processPhase4);
		$('#nextPahse5').click(processPhase5);
		$('#backPhase1').click(backPhase1);
		$('#backPhase2').click(backPhase2);
		$('#backPhase3').click(backPhase3);
		$('#backPhase4').click(backPhase4);
		$('#backPhase5').click(backPhase5);


		// main flow
		//hidePanels();
	
	});

	function processPhase1(){
		confname = $('#name').val();
		if(confname.length > 0) {
			
			$('#phase1').hide();
			$('#phase2').show();
		}
	}

	function processPhase2(){
		amount = $('#amount').val();
		ram = $('#ram').val();
		priority = $('#priority').val();
		qos = $('#qos').val();
		
		if(amount.length > 0) {
			
			$('#phase2').hide();
			$('#phase3').show();
		}
	}

	function processPhase3(){
	
			$('#phase3').hide();
			$('#phase4').show();
		
	}
	function processPhase4(){
	
			$('#phase4').hide();
			$('#phase5').show();
		
	}
	function processPhase5(){
	
			$('#phase5').hide();
			$('#phase6').show();
		
	}


	function backPhase1(){
		$('#phase2').hide();
		$('#phase1').show();
	}

	function backPhase2(){
		
		$('#phase3').hide();
		$('#phase2').show();
	}

	function backPhase3(){
		
		$('#phase4').hide();
		$('#phase3').show();
	}

	function backPhase4(){
		
		$('#phase5').hide();
		$('#phase4').show();
	}
	function backPhase5(){
		
		$('#phase6').hide();
		$('#phase5').show();
	}


	
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

$('#mytool').tooltip('hide')
$('#mytool').tooltip('toggle')

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
       postfix: '%'
    });
</script>
@stop
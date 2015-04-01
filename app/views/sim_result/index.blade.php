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
	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
	<ul>
		{{Session::get('success_msg')}}
	</ul>
	
</div>
@endif
<h1>Simulation result</h1>
<hr>
<div class="alert alert-danger alert-dismissible danger" role="alert" style="display:none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<ul>
	</ul>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div id="loading" style="display:none" >
			<p class="text-center"><img height="200" width="200" src="{{URL::to('images/loading.gif')}}" /><br> Please Wait </p>
		</div>
	</div>
</div>
<form  class="form-horizontal myform" role="form" method="post">
	
	<div id="phase1" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			Select simulation name </a>
			</h3>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">Simulation name</label>
					<div class="col-sm-6">
						{{Form::select('sim_name', $sim_name_list, $default,array('class'=>'form-control','id'=>'sim_select'))}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div  style="display:none;" class="panel panel-info rs_info" id="rs_info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
			Select type of simulation result</a>
			</h3>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="form-group">
					<div class="col-sm-offset-2 col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="radio">
							<label class="control-label "><input type="radio" name="rs_type" value="log" checked>Log file</label>
						</div>
						<div class="radio">
							<label class="control-label "><input type="radio" name="rs_type" value="net">Newrok trace</label>
						</div>
						
						<div class="radio">
							<label class="control-label "><input type="radio" name="rs_type" value="priority">Completely migrated VMs by priority level</label>
						</div>
						<div class="radio">
							<label class="control-label "><input type="radio" name="rs_type" value="down-time-round">Down time</label>
						</div>
						<div class="radio">
							<label class="control-label "><input type="radio" name="rs_type" value="migration-time-round">Migration time</label>
						</div>
						<div class="radio">
							<label class="control-label "><input type="radio" name="rs_type" value="violation">Violation</label>
						</div>
					</div>
				</div>
		
				
			</div>
		</div>
	</div>
	
	<!-- test tab ja-->
	<div id="tab--info" style="display:none;">
		<ul id="myTab" class="nav nav-tabs">
			<li class="active"><a href="#round" data-toggle="tab">On round</a></li>
			<li class=""><a href="#all" data-toggle="tab">On all round</a></li>
		</ul>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="loading" style="display:none" >
					<p class="text-center"><img height="200" width="200" src="{{URL::to('images/loading.gif')}}" /><br> Please Wait...... </p>
				</div>
			</div>
		</div>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade active in" id="round">
				<div class="panel-heading jumbotron">
					<h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> On round</h3>
					

				</div>
				
					<div id="round_info" class="form-group round_info" style="display:none;">
					<label for="inputEmail3" class="col-sm-4 control-label">round_name</label>
					<div class="col-sm-6">
						<select name="round_name" id="round_select" class="form-control round_select" required="required">
							<option value="" selected disabled>Please select</option>
						</select>
					</div>
				</div>
					<div id="graph--info__round" class="panel panel-info" style="display:none;">
						<div class="panel-heading">
							<h3 class="panel-title">
							<a class="graph_title" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"></a>
							</h3>
						</div>
						<div id="collapseFour" class="panel-collapse collapse in">
							<div class="panel-body">
								<div id="graph_container" style="min-width: 800px; height: 400px; margin: 0 auto">
								</div>
								<div id="graph--bar__container" style="min-width: 800px; height: 400px; margin: 0 auto; display:none;">
								</div>
							</div>
						</div>
					</div>
					<div id="content_info"  style="display:none;" class="panel panel-info">
						<div class="panel-heading">
							
							<h3 class="panel-title">
							<a id="stat_title" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
							</a></h3>
						</div>
						<div id="collapseThree" class="panel-collapse collapse in">
							<div class="panel-body mypanel">
								
							</div>
						</div>
					</div>


			</div>
			<div class="tab-pane fade" id="all" >
				<div class="panel-heading jumbotron">
					<h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> On all round</h3>
				</div>
				<div id="graph--info__all" class="panel panel-info" style="display:none;">
						<div class="panel-heading">
							<h3 class="panel-title">
			<a class="graph_title" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"></a>
			</h3>
						</div>
						<div id="collapseFive" class="panel-collapse collapse in">
							<div class="panel-body">
								<div id="graph--chart" style="min-width: 800px; height: 400px; margin: 0 auto display:none">
								</div>
								<div id="graph--bar" style="min-width: 800px; height: 400px; margin: 0 auto display:none">
								</div>
							</div>
						</div>
					</div>
					
			</div>
		</div>
	</div>
</form>
<style type="text/css">
.mypanel{
max-height: 400px;
overflow-y:scroll;
}
</style>
@section('js')
{{ HTML::script('js/jquery.bootstrap-touchspin.js') }}
{{ HTML::script('js/jquery.serialize-object.js') }}
{{ HTML::script('http://code.highcharts.com/stock/highstock.js') }}
{{ HTML::script('http://code.highcharts.com/modules/exporting.js') }}
{{ HTML::script('js/jquery-scrollto.js') }}
{{ HTML::script('js/sim_result.js') }}
@stop
@stop
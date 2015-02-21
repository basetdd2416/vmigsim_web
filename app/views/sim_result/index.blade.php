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
						<select name="sim_name" id="sim_select" class="form-control" required="required">
							<option value="" selected disabled>Please select</option>
							
							@foreach($sim_name_list as $s)
							<option value="{{$s}}">{{$s}}</option>
							@endforeach
						</select>
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
					</div>
				</div>
				<div id="round_info" class="form-group" style="display:none;">
					<label for="inputEmail3" class="col-sm-4 control-label">round_name</label>
					<div class="col-sm-6">
						<select name="round_name" id="round_select" class="form-control" required="required">
							<option value="" selected disabled>Please select</option>
						</select>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	<div id="content_info"  style="display:none;" class="panel panel-info">
						<div class="panel-heading">
						
							<h3 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
								Result information</a></h3>
						</div>
						<div id="collapseThree" class="panel-collapse collapse in">
						<div class="panel-body mypanel">
							
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
{{ HTML::script('js/sim_result.js') }}
@stop
@stop
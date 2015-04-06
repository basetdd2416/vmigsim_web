@extends('layouts.default-create')

@section('head-title')
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
.tooltip-inner {
min-width: 200px; //the minimum width
max-width: 300px;
}
</style>
	<h1>Create from existing configuration</h1>
	@stop
	
	@section('content')
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
	@stop
	

@section('js')
<script type="text/javascript">
	$(".tips").tooltip({
			placement : 'right'
		});
</script>
{{ HTML::script('js/jquery.bootstrap-touchspin.js') }}
{{ HTML::script('js/jquery.serialize-object.js') }}
{{ HTML::script('js/quicksim.js') }}
{{ HTML::script('js/exist-config.js') }}

@stop
@stop
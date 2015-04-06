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
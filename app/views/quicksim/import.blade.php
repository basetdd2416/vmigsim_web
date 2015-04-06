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
}

</style>
<h1>Upload from template json file</h1>

@stop

@section('content')
<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="fileuploader">
			Upload
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
{{ HTML::style('css/uploadfile.css') }}
{{ HTML::script('js/jquery.serialize-object.js') }}
{{ HTML::script('js/jquery.uploadfile.min.js') }}
{{ HTML::script('js/quicksim.js') }}
{{ HTML::script('js/exist-config.js') }}
{{ HTML::script('js/import.js') }}
@stop
@stop
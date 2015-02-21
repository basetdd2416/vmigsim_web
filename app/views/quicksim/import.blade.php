@extends('layouts.sidebarsim')
@section('content')
<h1>Comming soon.</h1>
<div class="panel panel-info" style="display:none;">
	<div class="panel-heading">
		<h3 class="panel-title">Import simulation</h3>
	</div>
	<div class="panel-body">
		
		
	<div class="fileinput fileinput-new input-group" data-provides="fileinput">
  <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
</div>
	</div>
	<a href="{{ URL::to('simulation/quicksim/createconfig') }}"class="btn btn-primary btn-lg"><i class="fa fa-play"></i> Start simulation</a>
</div>


@stop
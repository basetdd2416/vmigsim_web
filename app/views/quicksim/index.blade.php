@extends('layouts.sidebarsim')
@section('content')

<h1>Quick simulation</h1>
<hr>
<div class="form-group">
				<div class="col-sm-3">
					
					<a href="{{ URL::to('simulation/quicksim/createconfig') }}"class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> from screatches</a>

					
				</div>
				

				<div class="col-sm-4">

					<a href="{{ URL::to('simulation/quicksim/existing-config') }}"class="btn btn-success btn-lg"><i class="fa fa-file-text-o"></i> from existing configuration</a>
				</div>

				<div class="col-sm-4">
					<a href="{{ URL::to('simulation/quicksim/import') }}" class="btn btn-warning btn-lg"><i class="fa fa-download"></i> from upload file</a>
					
				</div>
</div>
@section('js')
{{ HTML::script('js/quicksim.js') }}

@stop
@stop
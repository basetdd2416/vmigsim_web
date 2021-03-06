@extends('layouts.sidebarsim')
@section('content')


<h1>Create configuration</h1>
<hr>
<div class="form-group">
				<div class="col-sm-2">
					
					<a href="{{ URL::to('simulation/quicksim/createconfig') }}"class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> from new</a>

					
				</div>
				

				<div class="col-sm-4">

					<a href="{{ URL::to('simulation/quicksim/existing-config') }}"class="btn btn-success btn-lg"><i class="fa fa-file-text-o"></i> from existing configuration</a>
				</div>

				<div class="col-sm-4">
					<a href="{{ URL::to('simulation/quicksim/import') }}" class="btn btn-warning btn-lg"><i class="fa fa-download"></i> from upload file</a>
					
				</div>
</div>

@section('js')
<script>
    $(document).ready(function () {
	    	$('#simbar').attr('class','active'); 
	    	$('#sidebar .nav > li:first').addClass('active');
	    	
	    	
        });
    </script>
@stop


@stop
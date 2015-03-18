@extends('layouts.sidebarsim')
@section('content')


{{ Form::open(array('url' => 'test/form1')) }}
	{{ Form::text('firstname',  ( Input::old('firstname')),array('class'=>'span4','placeholder'=>'click to enter email address')) }}
	{{ Form::submit('Save', array('class' => 'btn')) }}
{{Form::close()}}

	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Title!</strong> Running ...
	</div>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Title!</strong> Success ...
	</div>
<button onclick="myFunction()">Try it</button>
@section('js')
<script type="text/javascript">

	var alert_danger = $('.alert-danger');
    var alert_success = $('.alert-success');

	$(function() {
    	console.log( "ready!" );
    	
    	
	});

	function myFunction() {
    	$.ajax({
    		url: 'mytestform1',
    		dataType: 'json',
    		type:  'GET',
    		success: function(data)
           {
           		console.log(data.message);
    		},
    		complete: function() {
    			setTimeout(myFunction,5000);
    		}

		});
    }
</script>

@stop
@stop
@extends('layouts.sidebarsim')
@section('content')


{{ Form::open(array('url' => 'test/form1')) }}
	{{ Form::text('firstname',  ( Input::old('firstname')),array('class'=>'span4','placeholder'=>'click to enter email address')) }}
	{{ Form::submit('Save', array('class' => 'btn')) }}
{{Form::close()}}

@stop
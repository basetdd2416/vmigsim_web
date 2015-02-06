@extends('layouts.sidebarsim')
@section('content')

{{ Form::open(array('url' => 'test/form2')) }}
	{{ Form::text('lastname') }}
	{{ Form::hidden('firstname',Input::old('firstname')) }}
	{{ Form::submit('Back', array('class' => 'btn','name'=>'back')) }}
	{{ Form::submit('Next', array('class' => 'btn','name'=>'next')) }}
{{Form::close()}}

@stop
@extends('layouts.sidebarsim')
@section('content')
 <div class="row featurette">
          <h2 class="featurette-heading">Welcome to simmulation starting any function at the side bar.</h2>
 </div>

@section('js')
	<script>
    $(document).ready(function () {
    	
        $('#sidebar .nav > li').click(function (e) {
            
            
            $('#sidebar .nav > li').removeClass('active');
            $(this).addClass('active');                
        });            
    });
    </script>
@stop
    
@stop
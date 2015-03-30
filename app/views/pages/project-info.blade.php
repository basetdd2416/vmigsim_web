@extends('layouts.sidebarproject-info')
<style type="text/css">
/* Custom Styles */

</style>


@section('js')
	<script>
    $(document).ready(function () {
        $('#sidebar.nav > li').click(function (e) {
            e.preventDefault();
            
            $('#sidebar.nav > li').removeClass('active');
            $(this).addClass('active');                
        });            
    });
    </script>
@stop


@stop
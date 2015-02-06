@extends('layouts.sidebarsim')
@section('content')
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Line Chart Example
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

 
                  {{ HTML::script('js/jquery.js') }}
    <!-- Bootstrap Core JavaScript -->
   
    {{ HTML::script('js/bootstrap.min.js') }}
    <!-- Metis Menu Plugin JavaScript -->
   
     {{ HTML::script('js/plugins/metisMenu/metisMenu.min.js') }}


    <!-- Custom Theme JavaScript -->
    
    {{ HTML::script('js/plugins/flot/excanvas.min.js') }}
    {{ HTML::script('js/plugins/flot/jquery.flot.js') }}
    {{ HTML::script('js/plugins/flot/jquery.flot.pie.js') }}
    {{ HTML::script('js/plugins/flot/jquery.flot.resize.js') }}
     {{ HTML::script('js/plugins/flot/jquery.flot.tooltip.min.js') }}
    {{ HTML::script('js/plugins/flot/flot-data.js') }}
    {{ HTML::script('js/sb-admin-2.js') }}
@stop
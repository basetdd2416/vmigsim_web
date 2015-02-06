@extends('layouts.sidebarsim')
@section('content')
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="75"
  aria-valuemin="0" aria-valuemax="100" style="width:75%">
    3/4
  </div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Create migration environment</h3>
	</div>
	<div class="panel-body">
		
		
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Migration environment name</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" id="inputEmail3" value="" placeholder="enter your migration enviroment name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Migration algorithm</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option value="" selected disabled>Please select</option>
						<option>Offline</option>
						<option>Pre-copy</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Scheduling algorithm</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option value="" selected disabled>Please select</option>
						<option>FIFO</option>
						<option>Priority based</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Control alogorithm</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option value="" selected disabled>Please select</option>
						<option>Open loop</option>
						<option>Close loop</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Time limitation of migration (Min.)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter your time limitation of migration">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network bandwidth(Mbit/s)</label>
				<div class="col-sm-6">
					<input id="demo_vertical" type="text" value="" name="demo_vertical" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Network status</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option value="" selected disabled>Please select</option>
						<option>Stable</option>
						<option>Dynamic</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Page dirty rate</label>
				<div class="col-sm-6">
					<input id="page_dirty" type="text" value="" name="page_dirty" placeholder="enter your network bandwidth">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
					<a href="{{ URL::to('simulation/quicksim') }}"class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> Back</a>
					<a href="{{ URL::to('simulation/quicksim/reportcreate') }}"class="btn btn-primary btn-sm"><i class="fa fa-caret-right"></i> Next</a>
				</div>
					
					
				
			</div>
			
		</form>
	</div>
</div>
<script>
    $("input[name='demo_vertical']").TouchSpin({
      verticalbuttons: true,

    });
     $("input[name='page_dirty']").TouchSpin({
      verticalbuttons: true,
       postfix: '%'
    });
</script>

@stop
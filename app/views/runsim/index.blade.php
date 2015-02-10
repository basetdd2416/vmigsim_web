@extends('layouts.sidebarsim')
@section('content')
@if(Session::has('success_msg'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        {{Session::get('success_msg')}}
    </div>
 @endif
<h1>Run simulation</h1>
<hr>
<h3> Comming soon..... </h3>

<div id="phase5" class="panel panel-info">
	<div class="panel-heading">

		<h3 class="panel-title">
			 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
			Create simulation </a>
		</h3>
	</div>
	<div id="collapseFive" class="panel-collapse collapse">
	<div class="panel-body">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Simulation name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="simulation_name" id="simulation_name" value="{{Input::old('simulation_name')}}" placeholder="enter your simulation name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-4 control-label">Number of simulation round</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="sim_round" id="sim_round" value="" placeholder="enter your round">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
					<button id="backPhase4" type="button" class="btn btn-primary">
					<i class="fa fa-caret-left"></i> back
					</button>
					<button id="nextPahse5" type="submit" class="btn btn-primary update_form">
					<i class="fa fa-caret-right"></i> Save
					</button>
				</div>
			</div>
	</div>
</div>
</div>


<div id="phase6" class="panel panel-info">

	<div class="panel-heading">

		<h3 class="panel-title">
 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
			Overview your setting information
		</a>
		</h3>
	</div>
	<div id="collapseSix" class="panel-collapse collapse">
	<div class="panel-body">
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Export</a>
	</div>
</div>
<br>
<div class="row">
	<label for="input-id" class="col-sm-3">Configuration name</label>
	<label for="input-id" class="col-sm-2">configA</label>
</div>
<br>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">VMs information</h3>
	</div>
	<div class="panel-body">
		ข้อมูลจากหน้า create vm
					<div class="form-group">
				<div class="col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
				</div>
				
					
					
				
			</div>
				
			</div>
			
		
</div>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Migration environment information</h3>
	</div>
	<div class="panel-body">
		ข้อมูลจากหน้า migration environment
	<div class="form-group">
		<div class="col-sm-4">
			<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
		</div>	
	</div>	
	


	
		</div>
	</div>
	<br>
	<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
					<button id="backPhase5" type="button" class="btn btn-primary">
					<i class="fa fa-caret-left"></i> back
					</button>
					<button id="nextPhase6" type="submit" class="update_form btn btn-primary">
					<i class="fa fa-caret-right"></i> run
					</button>
				</div>
		</div>
</div>
</div>
</div>
<div class="form-group">
				
				<div class="col-sm-12">
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
					<button id="setAllDefault" type="button" class="btn btn-sm btn-primary">
					<i class="fa fa-circle-o-notch"></i> set all default
					</button>
				</div>
@stop
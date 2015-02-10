@extends('layouts.sidebarsim')
@section('content')

<h1>Quick simulation</h1>
<hr>
<div class="form-group">
				<div class="col-sm-3">
					
					<a href="{{ URL::to('simulation/quicksim/createconfig') }}"class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> from screatches</a>

					
				</div>
				<div class="col-sm-4">
					<a href="{{ URL::to('simulation/quicksim/import') }}" class="btn btn-warning btn-lg"><i class="fa fa-download"></i> Import exist simulation</a>
					
				</div>

				<div class="col-sm-4">

					<a href="{{ URL::to('simulation/quicksim/createconfig') }}"class="btn btn-primary btn-lg"><i class="fa fa-list-alt"></i> Default setting</a>
				</div>
</div>
@stop
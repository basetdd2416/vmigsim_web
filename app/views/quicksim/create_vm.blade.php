@extends('layouts.sidebarsim')
@section('content')



<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="50"
  aria-valuemin="0" aria-valuemax="100" style="width:50%">
    2/4
  </div>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Create VM</h3>
	</div>
	<div class="panel-body">
		
		
		<form class="form-horizontal" role="form">
			
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Amount</label>
				<div class="col-sm-6">
					<input id="amount" type="text" value="" name="amount" placeholder="enter your amount">
				</div>
			</div>
			
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">RAM(MB)</label>
				<div class="col-sm-6">
					<input id="ram" type="text" value="" name="ram" placeholder="enter your RAM">
				</div>
			</div>
		
			
			
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">Priority</label>
				<div class="col-sm-6">
					<select class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
				</div>
				<a id="mytool" href="#" data-toggle="tooltip" title="first tooltip"><i class="fa fa-question-circle"></i> </a>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-4 control-label">(QoS)Maximum down time(Min.)</label>
				<div class="col-sm-6">
					<input id="qos" type="text" value="" name="qos" placeholder="enter maximum down time">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-circle-o-notch"></i> Default</a>
					<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
				</div>
				<div class="col-sm-4">
						<a href="{{  URL::previous()  }}"class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> Back</a>
					<a href="{{  URL::previous()  }}"class="btn btn-primary btn-sm"><i class="fa fa-caret-right"></i> Next</a>
				</div>

					
					
				
			</div>
		</form>
		
	</div>
</div>
<script>
    $("input[name='amount']").TouchSpin({
      verticalbuttons: true,
      max: 1000,
      initval: 1
    });
    $("input[name='ram']").TouchSpin({
      verticalbuttons: true,
      max: 1000,
      initval: 512

    });
    $("input[name='qos']").TouchSpin({
      verticalbuttons: true,
      max: 1000,
      initval: 30

    });
    $('#mytool').tooltip('hide')
    $('#mytool').tooltip('toggle')
</script>


@stop
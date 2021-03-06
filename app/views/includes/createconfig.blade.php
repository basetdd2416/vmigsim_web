<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div id="loading" style="display:none" >
			<p class="text-center"><img height="200" width="200" src="{{URL::to('images/loading.gif')}}" /><br> Please Wait </p>
		</div>
	</div>
</div>
<form  class="form-horizontal myform" role="form" method="post">
	
	<hr>
	<div class="alert alert-danger alert-dismissible danger" role="alert" style="display:none;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<ul>
		</ul>
	</div>
	<div class="alert alert-success alert--success__reset alert-dismissible success" role="alert" style="display:none;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<ul>
		</ul>
	</div>
	<div id="config_info" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			Create configuration</a>
			</h3>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-4 control-label">New configuration name</label>
					<div class="col-sm-6">
						{{ Form::text('name', Input::old('name'), array('class' => 'form-control','id'=>'name')) }}
						
					</div>
				</div>
				<div class="form-group">
					
					<div class="col-sm-2 pull-right">
						
						<button id="nextPahse1" type="button" class="btn btn-primary" name="btnConfig" value="1">
						<i class="fa fa-caret-right"></i> Next
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="phase2" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				Create VM
			</a>
			</h3>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse">
			<div class="panel-body">
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
						<select id="priority" name="priority" class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
					<a class="tips" id="mytool" href="#" data-toggle="tooltip" title="The priority order of VMs  order by smallest number is very important."><i class="fa fa-question-circle"></i> </a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">(QoS)Maximum down time</label>
					<div class="col-sm-6">
						<input id="qos" type="text" value="" name="qos" placeholder="enter maximum down time">
					</div>
					<a class="tips" id="tip-max_qos" href="#" data-toggle="tooltip"
						title="The downtime of VMs that is acceptable.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					
					<div class="col-sm-4 pull-right">
						<button id="backPhase1" type="button" class="btn btn-primary">
						<i class="fa fa-caret-left"></i> Back
						</button>
						<button id="addVM" type="button" class="btn btn-primary">
						<i class="fa fa-caret-right"></i> Add
						</button>
						<button id="nextPahse2" type="button" class="btn btn-primary">
						<i class="fa fa-caret-right"></i> Next
						</button>
					</div>
				</div>
				<div class="alert alert-success alert--vm alert-dismissible success " role="alert" style="display:none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<ul>
					</ul>
				</div>
				<table id="showVM" class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>amount</th>
							<th>ram</th>
							<th>qos</th>
							<th>priority</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
	<div id="phase3" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
				Create migration environment
			</a>
			</h3>
		</div>
		<div id="collapseThree" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="form-group">
					<div class="col-sm-offset-4 col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="radio">
							<label class="control-label "><input type="radio" name="rs_type" value="1" checked>Psudo random</label>
						</div>
						<div class="radio">
							<label class="control-label "><input type="radio" name="rs_type" value="2">Record trace</label>
						</div>
					</div>
				</div>

				<div class="create--cont--mig">
					<div class="form-group" style="display:none">
						<label for="inputEmail3" class="col-sm-4 control-label">Migration environment name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="enviname_name" id="enviname_name" value="" placeholder="enter your migration enviroment name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Network type</label>
						<div class="col-sm-6">
							<select id="network_status" name="network_status" class="form-control">
								
								<option value="stable">Stable</option>
								<option value="dynamic">Dynamic</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Avaiable time for migration</label>
						<div class="col-sm-6">
							<input id="limit_time" name="limit_time" type="text" value="" placeholder="enter your time limitation of migration">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Network Interval</label>
						<div class="col-sm-6">
							<input id="network_interval" type="text" value="" name="network_interval" placeholder="enter your network interval">
						</div>
						<a class="tips" id="tip-network_interval" href="#" data-toggle="tooltip"
							title="The network monitoring interval.">
							<i class="fa fa-question-circle"></i>
						</a>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Network bandwidth</label>
						<div class="col-sm-6">
							<input id="network_bandwidth" type="text" value="" name="network_bandwidth" placeholder="enter your network bandwidth">
						</div>
					</div>
					
					<div class="form-group" style="display:none;">
						<label for="inputPassword3" class="col-sm-4 control-label">Page size</label>
						<div class="col-sm-6">
							<input id="page_dirty" type="text" value="" name="page_dirty" placeholder="enter your page size">
						</div>
						<a class="tips" id="tip-page_size" href="#" data-toggle="tooltip"
							title="The memory page size of VMs.">
							<i class="fa fa-question-circle"></i>
						</a>
					</div>
					
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Network Mean</label>
						<div class="col-sm-6">
							<input id="network_mean" type="text" value="" name="network_mean" placeholder="enter your network mean">
						</div>
						<a class="tips" id="tip-network_mean" href="#" data-toggle="tooltip"
							title="The mean of network bandwidth.">
							<i class="fa fa-question-circle"></i>
						</a>
					</div>
					<div id="containner-sd" class="form-group" style="display:none">
						<label for="inputPassword3" class="col-sm-4 control-label">Network SD</label>
						<div class="col-sm-6">
							<input id="network_sd" type="text" value="" name="network_sd" placeholder="enter your network bandwidth">
						</div>
						<a class="tips" id="tip-sd" href="#" data-toggle="tooltip"
							title="The standard derivation of bandwidth.">
							<i class="fa fa-question-circle"></i>
						</a>
					</div>	
				</div>
				
				
				<div id="select--record--trace" class="form-group" style="display:none">
					<label for="inputEmail3" class="col-sm-4 control-label">Record trace name</label>
					<div class="col-sm-6">
						{{Form::select('record_name', $fileNames,null,array('class'=>'form-control','id'=>'select-record-name'))}}
					</div>
				</div>
					<div class="form-group">
						<div class="col-sm-4 pull-right">
							<button id="backPhase2" type="button" class="btn btn-primary">
							<i class="fa fa-caret-left"></i> Back
							</button>
							<button id="nextPahse3" type="button" class="btn btn-primary">
							<i class="fa fa-caret-right"></i> Next
							</button>
						</div>
					</div>

			</div>
		</div>
	</div>
	<div id="phase5" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
				Create policy settings
			</a>
			</h3>
		</div>
		<div id="collapseFive" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Migration</label>
					<div  class="col-sm-6">
						<select id="migration_algorithm" name="migration_algorithm" class="form-control">
							
							<option value="offline">Offline</option>
							<option value="precopy">Pre-copy</option>
						</select>
					</div>
					<a class="tips" id="tip-migration" href="#" data-toggle="tooltip"
						title="VmigSim supports two types of migration algorithm, cold migration (Offline) and live migration (Pre-copy).">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Scheduling</label>
					<div class="col-sm-6">
						<select id="scheduling_algorithm" name="scheduling_algorithm" class="form-control">
							
							<option value="fifo">FIFO</option>
							<option value="priority">Priority based</option>
						</select>
					</div>
					<a class="tips" id="tip-scheduling" href="#" data-toggle="tooltip"
						title="Scheduling algorithm is used to manage the sequence of being-migrated VMs. FIFO does not considered VM's priority, while Priority-based do.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Control alogorithm</label>
					<div class="col-sm-6">
						<select id="control_algorithm" name="control_algorithm" class="form-control">
							
							<option value="openloop">Open loop</option>
							
						</select>
					</div>
					<a class="tips" id="tip-control" href="#" data-toggle="tooltip"
						title="The control alogrithm is utilization of resource, which open loop doesn't have feedback for utilization control.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					
					<div class="col-sm-4 pull-right">
						<button id="backPhase4" type="button" class="btn btn-primary">
						<i class="fa fa-caret-left"></i> Back
						</button>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="phase4" class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
				Create application setting
			</a>
			</h3>
		</div>
		<div id="collapseFour" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">WWS proportion</label>
					<div class="col-sm-6">
						<input id="wwws_ratio" name="wwws_ratio" type="text" value="" placeholder="enter your time limitation of migration">
					</div>
					<a class="tips" id="tip-wws_ratio" href="#" data-toggle="tooltip"
						title="The proportion of the memory pages that have very high update rate.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">WWS dirty rate</label>
					<div class="col-sm-6">
						<input id="wws_dirty_rate" type="text" value="" name="wws_dirty_rate" placeholder="enter your network bandwidth">
					</div>
					<a class="tips" id="tip-wws_dirty_rate" href="#" data-toggle="tooltip"
						title="The memory update rate of WWS.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Normal dirty rate</label>
					<div class="col-sm-6">
						<input id="normal_dirty_rate" type="text" value="" name="normal_dirty_rate" placeholder="enter your network bandwidth">
					</div>
					<a class="tips" id="tip-normal_dirty_rate" href="#" data-toggle="tooltip"
						title="The memory update rate of the pages that are not WWS.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Max pre-copy round</label>
					<div class="col-sm-6">
						<input id="max_pre_copy_rate" type="text" value="" name="max_pre_copy_rate" placeholder="enter your network bandwidth">
					</div>
					<a class="tips" id="tip-max_pre_round" href="#" data-toggle="tooltip"
						title="The maxmimum iteration of pre-copy phase.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Min dirty page</label>
					<div class="col-sm-6">
						<input id="min_dirty_page" type="text" value="" name="min_dirty_page" placeholder="enter your network bandwidth">
					</div>
					<a class="tips" id="tip-min_dir_page" href="#" data-toggle="tooltip"
						title="The minimum dirty pages that will cause the live migration process to enter the stop-and-copy phase.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-4 control-label">Max no progress round</label>
					<div class="col-sm-6">
						<input id="max_no_prog_round" type="text" value="" name="max_no_prog_round" placeholder="enter your network bandwidth">
					</div>
					<a class="tips" id="tip-max_no_prog" href="#" data-toggle="tooltip"
						title="The iteration number of pre-copy phase that has higher dirtied memory pages than transferred memory pages.">
						<i class="fa fa-question-circle"></i>
					</a>
				</div>
				<div class="form-group">
					
					<div class="col-sm-4 pull-right">
						<button id="backPhase3" type="button" class="btn btn-primary">
						<i class="fa fa-caret-left"></i> Back
						</button>
						<button id="nextPahse4" type="button" class="btn btn-primary">
						<i class="fa fa-caret-right"></i> Next
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		
		<div class="col-sm-offset-4 col-sm-8">
			<a href="{{URL::to('simulation/quicksim')}}" class="btn btn-warning btn-sm"><i class="fa fa-times"></i> Cancel</a>
			<button id="setAllDefault" type="button" class="btn btn-sm btn-primary">
			<i class="fa fa-circle-o-notch"></i> Reset all default
			</button>
			<button id="nextPahse5" type="submit" class="btn btn-sm btn-success update_form">
			<i class="fa fa-floppy-o"></i> Save
			</button>
		</div>
	</div>
</form>
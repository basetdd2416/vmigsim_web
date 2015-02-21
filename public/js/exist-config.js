$(function() {
	var mesgalert = $('.alert');
	var envi_info = $('#envi_info');
	var policy_info = $('#policy_info');
	var app_info = $('#app_info');
	var vm_info = $('#vm_info');
	var config_info = $('#config_info');

	function collaseAllPanel(){
		 $('#collapseOne').attr('class','panel-collapse collapse in');
		 $('#collapseTwo').attr('class','panel-collapse collapse in');
		 $('#collapseThree').attr('class','panel-collapse collapse in');
		 $('#collapseFour').attr('class','panel-collapse collapse in');
		 $('#collapseFive').attr('class','panel-collapse collapse in');
		 $('#collapseSix').attr('class','panel-collapse collapse in');
	}
	$("#cf-ajx").on('change',function(e){
		e.preventDefault();
		var config_id = e.target.value;
		 $.ajax({
		
           type: "GET",
           url: "../ajax-config?config_id=" + config_id,
           dataType: 'json',
      
           
           cache: false,
           data: {config_id : config_id,
           		  create_exist : true
           		},
           success: function(data)
           {
           		policy_info.hide();
           		envi_info.hide();
           		app_info.hide();
           		vm_info.hide();
           		config_info.hide();
           		
           		if(data.envi.id) {


           		//$('#envi_name').empty();
           		console.log(data.envi);
           		var date_time = moment().format('MM-DD-YYYY_h-mm-ss a');
				var user_name = 'Config';
				var config_name = user_name + '_' + date_time;
				$("input[name='name']").val(config_name);
           		$('#envi_name').val(data.envi.name);
           		$('#network_bandwidth').val(data.envi.bandwidth);
           		$('#limit_time').val(data.envi.time_limit);
         
           		$('#scheduling_algorithm').val(data.envi.schedule_type).attr('selected','selected');
           		$('#migration_algorithm').val(data.envi.migration_type).attr('selected','selected');
           		$('#control_algorithm').val(data.envi.control_type).attr('selected','selected');
           		$('#network_status').val(data.envi.network_type).attr('selected','selected');
           		$('#page_dirty').val(data.envi.page_size);
           		$('#wws_ratio').val(data.envi.wws_ratio);
           		$('#wwws_dirty_rate').val(data.envi.wwws_dirty_rate);
           		$('#max_pre_round').val(data.envi.max_precopy_round);
           		$('#normal_dirty_rate').val(data.envi.normal_dirty_rate);
           		$('#min_dirty_page').val(data.envi.min_dirty_page);
           		$('#max_no_prog').val(data.envi.max_no_progress_round);
           		$('#network_interval').val(data.envi.network_interval);
           		$('#network_sd').val(data.envi.network_sd);


           		$("#showVM > tbody").html("");
           		vmList = [];
				$.each(data.vms, function( index, value ) {
				$('#showVM').append('<tr><td>'+(index+1)+'</td><td>'+value.amount+'</td><td>'+value.ram+'</td><td>'+value.qos+'</td><td>'+value.priority+'</td><td><a class = "deleteLink" href="#">del</a></td></tr>');
				 
				 	vmList.push({
					 	amount: value.amount,
						qos: value.qos,
						priority: value.priority,
						ram: value.ram
				 	});
				});

           			
           		}
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			  	
			   
				
			   
			   
			  collaseAllPanel(); 
			  config_info.slideDown();
			  envi_info.slideDown();
           		policy_info.slideDown();
           		app_info.slideDown();
           		vm_info.slideDown();

           }
         });
	});
});
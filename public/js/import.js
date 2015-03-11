$(function() {
	var mesgalert = $('.alert');
	$("#fileuploader").uploadFile({
	dragDrop:true,
	
	url:"uploadConfig",
	allowedTypes:"json",
	fileName:"myfile",
	onSuccess:function (files,data,xhr) {
		if(data.success) {
				mesgalert.hide().find('ul').empty();
				var date_time = moment().format('MM-DD-YYYY_h-mm-ss a');
				var user_name = 'Config';
				var config_name = user_name + '_' + date_time;
				$("input[name='name']").val(config_name);
           		//$('#envi_name').val(data.config_data.maxBandwidth);
           		$('#network_bandwidth').val(data.config_data.environment.maxBandwidth);
           		$('#limit_time').val(data.config_data.environment.timeLimit);
         
           		$('#scheduling_algorithm').val(data.config_data.environment.scheduleType).attr('selected','selected');
           		$('#migration_algorithm').val(data.config_data.environment.migrationType).attr('selected','selected');
           		$('#control_algorithm').val(data.config_data.environment.controlType).attr('selected','selected');
           		$('#network_status').val(data.config_data.environment.networkType).attr('selected','selected');
           		$('#page_dirty').val(data.config_data.environment.pageSize);
           		$('#wws_ratio').val(data.config_data.environment.wwsRatio);
           		$('#wwws_dirty_rate').val(data.config_data.environment.wwsDirtyRate);
           		$('#max_pre_round').val(data.config_data.environment.maxPreCopyRound);
           		$('#normal_dirty_rate').val(data.config_data.environment.normalDirtyRate);
           		$('#min_dirty_page').val(data.config_data.environment.minDirtyPage);
           		$('#max_no_prog').val(data.config_data.environment.maxNoProgressRound);
           		$('#network_interval').val(data.config_data.environment.networkInterval);
           		$('#network_mean').val(data.config_data.environment.meanBandwidth);
           		$('#network_sd').val(data.config_data.environment.networkSD);


           		$("#showVM > tbody").html("");
           		vmList = [];
				$.each(data.config_data.vmSpecList, function( index, value ) {
				$('#showVM').append('<tr><td>'+(index+1)+'</td><td>'+value.vmAmount+'</td><td>'+value.ram+'</td><td>'+value.qos+'</td><td>'+value.priority+'</td><td><a class = "deleteLink" href="#">del</a></td></tr>');
				 
				 	vmList.push({
					 	amount: value.amount,
						qos: value.qos,
						priority: value.priority,
						ram: value.ram
				 	});
				});

				mesgalert = $('.alert--success__reset');
			 	mesgalert.find('ul').append('<li>uploaded completed. </li>');
		 		mesgalert.slideDown("slow");
		}

	}
	});
});
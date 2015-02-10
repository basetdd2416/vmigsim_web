$(function() {
	var mesgalert = $('.alert');
	var envi_info = $('#envi_info');
	var policy_info = $('#policy_info');
	var app_info = $('#app_info');
	var vm_info = $('#vm_info');
	$('.readMore').click(function(e){
		var content = $(this).next('div.content');
		e.preventDefault();
		if(content.is(":visible")) {
			
			
			content.width(content.parent().width()).slideUp(300);
		} else {
			
			content.width(content.parent().width()).slideDown(300);
		}
	});
	$("#nextPahse1").click(function(){
		 $('#collapseOne').attr('class','panel-collapse collapse');
		 $('#collapseTwo').attr('class','panel-collapse collapse in');
	});
	


	$("#backPhase3").click(function(){
		 $('#collapseFour').attr('class','panel-collapse collapse');
		 $('#collapseThree').attr('class','panel-collapse collapse in');
	});

	$("#setAllDefault").click(function(){
		
		var date_time = moment().format('MM-DD-YYYY_h-mm-ss a');
		var user_name = 'Vmig';
		var sim_name = user_name + '_' + date_time;
		
		 $("input[name='simulation_name']").val(sim_name);
		 $("input[name='sim_round']").val('1');
		 $("#config_select").val('1').change();
		
		   
		 
		
	});
	
	$("#config_select").on('change',function(e){
		e.preventDefault();
		var config_id = e.target.value;
		 $.ajax({
		
           type: "GET",
           url: "ajax-config?config_id=" + config_id,
           dataType: 'json',
      
           
           cache: false,
           data:  config_id,
           success: function(data)
           {
           		policy_info.hide();
           		envi_info.hide();
           		app_info.hide();
           		vm_info.hide();
           		
           		if(data.envi.id) {


           		//$('#envi_name').empty();
           		console.log(data.envi);
           		$('#envi_name').text(data.envi.name);
           		$('#bandwidth').text(data.envi.bandwidth);
           		$('#time_limit').text(data.envi.time_limit);
           		$('#schedule').text(data.envi.schedule_type);
           		$('#migration').text(data.envi.migration_type);
           		$('#control').text(data.envi.control_type);
           		$('#network').text(data.envi.network_type);
           		$('#page_size').text(data.envi.page_size);
           		$('#wws_ratio').text(data.envi.wws_ratio);
           		$('#wwws_dirty_rate').text(data.envi.wwws_dirty_rate);
           		$('#max_pre_round').text(data.envi.max_precopy_round);
           		$('#normal_dirty_rate').text(data.envi.normal_dirty_rate);
           		$('#min_dirty_page').text(data.envi.min_dirty_page);
           		$('#max_no_prog').text(data.envi.max_no_progress_round);
           		$('#network_interval').text(data.envi.network_interval);
           		$('#network_sd').text(data.envi.network_sd);


           		$("#showVM > tbody").html("");
				$.each(data.vms, function( index, value ) {
				$('#showVM').append('<tr><td>'+(index+1)+'</td><td>'+value.amount+'</td><td>'+value.ram+'</td><td>'+value.qos+'</td><td>'+value.priority+'</td></tr>');
				
				});

           		envi_info.slideDown();
           		policy_info.slideDown();
           		app_info.slideDown();
           		vm_info.slideDown();
           		}
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			  	
			   
				
			   
			   
			   
           }
         });
	});
	
	$(".update_form").click(function() { // changed
	 var myform = $(this).closest("form");
	 var mycustomform =	myform.serializeObject();
	 
	
	
    $.ajax({
		
           type: "POST",
           url: "savesimulation",
           dataType: 'json',
      
           
           cache: false,
           data:  mycustomform,
           success: function(data)
           {
           	alert(data.success);
           		mesgalert.hide().find('ul').empty();
           		if(!data.success) {
           			
           			//window.location.replace(data.redirect);
           			//top.location.href = data.redirect;
           			//window.location.href = data.redirect;
           			$.each(data.errors , function (index,error){
           				mesgalert.find('ul').append('<li>'+error+'</li>');
           			});
           			mesgalert.slideDown();
           		} else {
           			window.location.href = data.redirect;
           		}
           		
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			   
			   
				
			   
			   
			   
           }
         });
		 
    return false; // avoid to execute the actual submit of the form.
	});
});
$(function() {
	var mesgalert = $('.alert');
	var amount,qos,priority,ram,name;
	var vmList = [];

	function updateVMTable(){
			
	 	$("#showVM > tbody").html("");
			$.each(vmList, function( index, value ) {
			$('#showVM').append('<tr><td>'+(index+1)+'</td><td>'+value.amount+'</td><td>'+value.ram+'</td><td>'+value.qos+'</td><td>'+value.priority+'</td><td><td><a  href="#">del</a></td></tr>');
		});
	}

	$("#nextPahse1").click(function(){
		 $('#collapseOne').attr('class','panel-collapse collapse');
		 $('#collapseTwo').attr('class','panel-collapse collapse in');
	});
	
	$("#nextPahse2").click(function(){
		 $('#collapseTwo').attr('class','panel-collapse collapse');
		 $('#collapseThree').attr('class','panel-collapse collapse in');
	});
	
	$("#nextPahse3").click(function(){
		 $('#collapseThree').attr('class','panel-collapse collapse');
		 $('#collapseFour').attr('class','panel-collapse collapse in');
	});
	
	$("#nextPahse4").click(function(){
		 $('#collapseFour').attr('class','panel-collapse collapse');
		 $('#collapseFive').attr('class','panel-collapse collapse in');
	});
	
	$("#backPhase1").click(function(){
		 $('#collapseTwo').attr('class','panel-collapse collapse');
		 $('#collapseOne').attr('class','panel-collapse collapse in');
	});

	$("#backPhase2").click(function(){
		 $('#collapseThree').attr('class','panel-collapse collapse');
		 $('#collapseTwo').attr('class','panel-collapse collapse in');
	});

	$("#backPhase3").click(function(){
		 $('#collapseFour').attr('class','panel-collapse collapse');
		 $('#collapseThree').attr('class','panel-collapse collapse in');
	});

	$("#setAllDefault").click(function(){
		
		var date_time = moment().format('MM-DD-YYYY_h-mm-ss a');
		var user_name = 'Vmig';
		var config_name = user_name + '_' + date_time;
		 $("input[name='name']").val(config_name);
		 $("input[name='amount']").val('200');
		 $("input[name='priority']").val('1');
		 $("input[name='ram']").val('512');
		
		 $("input[name='network_bandwidth']").val('64');
		 $("input[name='limit_time']").val('21600');
		 $('#scheduling_algorithm option[value=priority]').attr('selected','selected');
		$('#migration_algorithm option[value=precopy]').attr('selected','selected');
		$('#control_algorithm option[value=closeloop]').attr('selected','selected');
		$('#network_status option[value=dynamic]').attr('selected','selected');
		$("input[name='enviname_name']").val('envA');
		
		 $("input[name='page_dirty']").val('4');

		 $("input[name='wwws_ratio']").val('1');
		 $("input[name='wws_dirty_rate']").val('90');
		 $("input[name='normal_dirty_rate']").val('20');
		 $("input[name='max_pre_copy_rate']").val('30');
		 $("input[name='min_dirty_page']").val('50');
		 $("input[name='max_no_prog_round']").val('2');

		 $("input[name='network_interval']").val('1');
		 $("input[name='network_sd']").val('54.8222');

		 $("input[name='simulation_name']").val('simA');
		 $("input[name='sim_round']").val('1');

		 vmList = [];
		 vmList.push({
		 	amount: 200,
			qos: 512,
			priority: 1,
			ram: 300
		 });
		 vmList.push({
		 	amount: 200,
			qos: 512,
			priority: 2,
			ram: 2700
		 });
		 vmList.push({
		 	amount: 200,
			qos: 512,
			priority: 3,
			ram: 32400
		 });
		 updateVMTable();
		 
		 
		
	});

	$('table#showVM').on('click','tr td',function(e){
        e.preventDefault();
        var row_index = $(this).parent().index();
        if (row_index > -1) {
         	alert(row_index);
        	vmList.splice(row_index, 1);
   		}
	    $(this).parents('tr').remove();
	    updateVMTable();  	

    });

	
	$("#addVM").click(function(){
		
		 var amount = $("input[name='amount']");
		 var qos = $("input[name='qos']");
		 var priority = $("#priority");
		 var ram = $("input[name='ram']");
		 vmList.push({
			amount: amount.val(),
			qos: qos.val(),
			priority: priority.val(),
			ram: ram.val()
		 });
		updateVMTable();
	});
	
	
	$(".update_form").click(function() { // changed
	 var myform = $(this).closest("form");
	 var mycustomform =	myform.serializeObject();
	 mycustomform['vmList'] = vmList;
	
	
    $.ajax({
		
           type: "POST",
           url: "saveallconfig",
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
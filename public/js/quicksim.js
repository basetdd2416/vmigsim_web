$(function() {
	if (typeof jQuery != 'undefined') {  
    // jQuery is loaded => print the version
   
    console.log(jQuery.fn.jquery);
}
	$('#sidebar .nav > li:first').addClass('active'); 
	$('#simbar').addClass('active'); 
	defineSpinner();
	
	var mesgalert = $('.alert-danger');

	var amount,qos,priority,ram,name;
	var vmList = [];
	$(document).ajaxStart(function(){
	mesgalert.hide().find('ul').empty();
    $('#loading').show();
    $('.myform').hide();
 }).ajaxStop(function(){
    $('#loading').hide();
    $('.myform').show();
 });

	$('#network_status').on('change', function() {
	  	var type = this.value ; // or $(this).val()
	  	var sd = $('#containner-sd');
	  	if (type == 'dynamic') {
	  		sd.slideDown();
	  	} else {
	  		sd.hide();
	  	}
	});

 	function defineSpinner() {
 		//part of spinnere
		$("input[name='amount']").TouchSpin({
		verticalbuttons: true,
		max: 1000,
		initval: 1,
		min: 1
		});
		$("input[name='ram']").TouchSpin({
		verticalbuttons: true,
		max: 1000,
		initval: 512,
		min: 1,
		postfix: 'MB'
		});

		$("input[name='qos']").TouchSpin({
		verticalbuttons: true,
		max: 1000,
		initval: 30,
		min: 1,
		postfix: 'Min'
		});

		$("input[name='network_interval']").TouchSpin({
		verticalbuttons: true,
		max: 1000,
		initval: 1,
		min: 1,
		postfix: 'Second'
		});
		$("input[name='network_mean']").TouchSpin({
		verticalbuttons: true,
		max: 1000,
		initval: 62,
		min: 1,	
		forcestepdivisibility: 'none',
		postfix: 'Mbps'
		});
		$("input[name='network_sd']").TouchSpin({
		verticalbuttons: true,
		max: 100,
		min: 1,
		initval: 54.8222,
		forcestepdivisibility: 'none',
		postfix: '%'
		});

		$("input[name='wwws_ratio']").TouchSpin({
		verticalbuttons: true,
		max: 100,
		min: 1,
		initval: 1,
		postfix: '%'
		});

		$("input[name='wws_dirty_rate']").TouchSpin({
		verticalbuttons: true,
		max: 100,
		min: 1,
		initval: 90,
		postfix: '%'
		});
		$("input[name='normal_dirty_rate']").TouchSpin({
		verticalbuttons: true,
		max: 100,
		min: 1,
		initval: 20,
		postfix: '%'
		});

		$("input[name='max_pre_copy_rate']").TouchSpin({
		verticalbuttons: true,
		max: 1000,
		min: 1,
		initval: 30
		});

		$("input[name='min_dirty_page']").TouchSpin({
		verticalbuttons: true,
		max: 1000,
		min: 1,
		initval: 50
		});

		$("input[name='max_no_prog_round']").TouchSpin({
		verticalbuttons: true,
		max: 1000,
		min: 1,
		initval: 2
		});



		$("input[name='demo_vertical']").TouchSpin({
		      verticalbuttons: true,

		    });
		$("input[name='limit_time']").TouchSpin({
		      verticalbuttons: true,
		      max: 100000,
		      min: 1,
		      postfix: 'Second'

		    });
		$("input[name='network_bandwidth']").TouchSpin({
		      verticalbuttons: true,
		      max: 150000,
		      min: 1,
		      forcestepdivisibility: 'none',
		      postfix: 'Mbps'
		    });
		     $("input[name='page_dirty']").TouchSpin({
		      verticalbuttons: true,
		      postfix: 'KB',
		      min: 1
		       
		    });

 	}

	function defineDefalut() {
		var date_time = moment().format('MM-DD-YYYY_h-mm-ss_a');
		var user_name = 'Config';
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
			qos: 300,
			priority: 1,
			ram: 512
		 });
		 vmList.push({
		 	amount: 200,
			qos: 2700,
			priority: 2,
			ram: 512
		 });
		 vmList.push({
		 	amount: 200,
			qos: 32400,
			priority: 3,
			ram: 512
		 });
		 updateVMTable();
		 $('#network_status').change();
	}

	defineDefalut();
	function updateVMTable(){
		
	 	$("#showVM > tbody").html("");
			$.each(vmList, function( index, value ) {
			$('#showVM').append('<tr><td>'+(index+1)+'</td><td>'+value.amount+'</td><td>'+value.ram+'</td><td>'+value.qos+'</td><td>'+value.priority+'</td><td><a class = "deleteLink" href="#">del</a></td></tr>');
		});
		$('table tr:last').hide().fadeIn('slow').css('display', 'table-row');
	}

	function collaseAllPanel(){
		 $('#collapseOne').attr('class','panel-collapse collapse in');
		 $('#collapseTwo').attr('class','panel-collapse collapse in');
		 $('#collapseThree').attr('class','panel-collapse collapse in');
		 $('#collapseFour').attr('class','panel-collapse collapse in');
		 $('#collapseFive').attr('class','panel-collapse collapse in');
		 $('#collapseSix').attr('class','panel-collapse collapse in');
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

	$("#nextPahse5").click(function(){
		
		 $('#collapseFive').attr('class','panel-collapse collapse');
		 $('#collapseSix').attr('class','panel-collapse collapse in');
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

	$("#backPhase4").click(function(){
		
		 $('#collapseFive').attr('class','panel-collapse collapse');
		 $('#collapseFour').attr('class','panel-collapse collapse in');
	});

	$("#setAllDefault").click(function(){
		mesgalert.hide().find('ul').empty();
		var date_time = moment().format('MM-DD-YYYY_h-mm-ss_a');
		var user_name = 'Config';
		var config_name = user_name + '_' + date_time;
		 $("input[name='name']").val(config_name);
		 $("input[name='amount']").val('200');
		 $("input[name='priority']").val('1');
		 $("input[name='ram']").val('512');
		
		 $("input[name='network_bandwidth']").val('64');
		 $("input[name='limit_time']").val('21600');
		 $('#scheduling_algorithm option[value=priority]').attr('selected','selected');
		$('#migration_algorithm option[value=precopy]').attr('selected','selected');
		$('#control_algorithm option[value=openloop]').attr('selected','selected');
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
			qos: 300,
			priority: 1,
			ram: 512
		 });
		 vmList.push({
		 	amount: 200,
			qos: 2700,
			priority: 2,
			ram: 512
		 });
		 vmList.push({
		 	amount: 200,
			qos: 32400,
			priority: 3,
			ram: 512
		 });
		 
		 updateVMTable();
		 mesgalert = $('.alert--success__reset');
		 mesgalert.find('ul').append('<li>reset all default completed. </li>');
		 mesgalert.slideDown("slow");
		collaseAllPanel();
		$("html, body").animate({ scrollTop: 0 }, "slow");
		 $('#network_status').change();
  		return false;
		
	});
	/*
	$('table#showVM').on('click','tr td',function(e){
        e.preventDefault();
        var row_index = $(this).parent().index();
        if (row_index > -1) {
         	//alert(row_index);
        	vmList.splice(row_index, 1);
   		}
	    $(this).parents('tr').remove();
	    updateVMTable();  	

    });*/

	
	$("#addVM").click(function(){
		mesgalert.hide().find('ul').empty();
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

		mesgalert = $('.alert--vm').attr('class','alert--vm alert alert-success');
		mesgalert.find('ul').append('<li>VM is added. </li>');
		mesgalert.slideDown();
	});

	//remove vm
	
       $('table#showVM ').on('click','tr td .deleteLink',function(e){ e.preventDefault();
        mesgalert.hide().find('ul').empty();
        var row_index = $(this).closest('tr').index();
        if (row_index > -1) {
         	//alert(row_index);
        	vmList.splice(row_index, 1);
   		}
   		var tr = $(this).closest('tr');
   		//tr.css("background-color","#FF3700");
        tr.fadeOut(400, function(){
            tr.remove();
        });

        mesgalert = $('.alert--vm').attr('class','alert--vm alert alert-danger');
        mesgalert.find('ul').append('<li> VM is deleted </li>');
        mesgalert.slideDown();
        //updateVMTable(); 
        return false;
        
	    
	  

    });
	
	
	$(".update_form").click(function() { // changed
	 var myform = $(this).closest("form");

	 var mycustomform =	myform.serializeObject();
	 
	 	
	 
	 mycustomform['vmList'] = vmList;
	 
	 console.log(mycustomform);	
	
    $.ajax({
		
           type: "POST",
           url: "saveallconfig",
           dataType: 'json',
      
           
           cache: false,
           data:  mycustomform,
           success: function(data)
           {
           	//alert(data.success);
           	    
           		mesgalert.hide().find('ul').empty();
           		if(!data.success) {
           			mesgalert = $('.alert-danger');
           			//window.location.replace(data.redirect);
           			//top.location.href = data.redirect;
           			//window.location.href = data.redirect;
           			$.each(data.errors , function (index,error){
           				mesgalert.find('ul').append('<li>'+error+'</li>');
           			});
           			mesgalert.slideDown();
           		} else {
           			console.log(data);
           			window.location.href = data.redirect;
           		}
           		
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			   
			   
				
			   
			   
			   
           }
         });
		 
    return false; // avoid to execute the actual submit of the form.
	});

	// radio type of injection
	$('input[type=radio][name=rs_type]').change(function() {
		var rs_type = $(this).val();
		var STATUS_PSUDO = 1;
		var STATUS_RECORD = 2;
		var select_contain = $('#select--record--trace');
		var cre_contain_mig = $('.create--cont--mig');
		console.log(rs_type);
		if(rs_type == STATUS_PSUDO) {
			select_contain.slideUp("slow");
			cre_contain_mig.slideDown("slow");
		} else {

			cre_contain_mig.slideUp("slow");
			select_contain.slideDown("slow");
			
		}
	});

	function ajaxReadRecord() {
		$.ajax({
				type: "GET",
           		url: "query-record",
           		dataType: 'json', 
           		cache: false,
           		success: function(data) {
           			console.log(data);
           			var select = $('#select-record-name');
           			select.empty();
           			$.each(data.fileNames, function (i, item) {
					    select.append($('<option>', { 
					        value: item,
					        text : item 
					    }));
					});

           			cre_contain_mig.slideUp("slow");
					select_contain.slideDown("slow");
           		}

			});
	}
});
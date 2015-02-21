$(function() {
	$('#simbar').attr('class','active');
	var mesgalert = $('.alert');
	var rs_info = $('#rs_info');
	var round_info = $('#round_info');
	var content_info = $('#content_info');
		$(document).ajaxStart(function(){
			mesgalert.hide().find('ul').empty();
    $('#loading').show();
    $('.myform').hide();
 }).ajaxStop(function(){
    $('#loading').hide();
    $('.myform').show();
 });

	$('input[type=radio][name=rs_type]').change(function() {
	        var rs_type = $(this).val();
	        var sim_name = $("#sim_select").val();
	       
	        $.ajax({
	        	type : 'GET',
	        	url : 'ajax-sim-rs',
	        	cache: false,
	        	data : {
	        		sim_name : sim_name,
	        		rs_type : rs_type
	        	},
	        	 success: function(data) {
	        	 	rs_info.hide();
	        	 	round_info.hide();
	        	 	content_info.hide();
	        	 	if(!data.success) {
	        	 		alert('failed');
	        	 	} else {
	        	 		$('#round_select').empty();
	        	 		$.each(data.f_names, function( index, n ) {
							$('#round_select').append('<option value="'+n+'">'+n+'</option>');
				
						});

	        	 		$('.mypanel').html(data.content_default);
	        	 		

	        	 		rs_info.slideDown("slow");
	        	 		round_info.slideDown("slow");
	        	 		content_info.slideDown("slow");
	        	 	}
	        	 }
	        });

	 });

	$("#sim_select").on('change',function(e){
		e.preventDefault();

		var sim_name = e.target.value;
		 $.ajax({
		
           type: "GET",
           url: "ajax-sim-name",
           dataType: 'json',
      	
           
           cache: false,
           data:  {
           		sim_name : sim_name

           },
           success: function(data)
           {
           		rs_info.hide();

           		if(!data.success) {
           			alert('it failed');
           		} else {
           			//alert(data.success);
           			$('input:radio[name=rs_type]')[0].checked = true;
           			$('input:radio[name=rs_type]:nth(0)').val('log').change();
           			
           			
           		}
           	

           		
           		
           	}
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			  	
			   
				
			   
			   
			   
           
         });
	});

	$("#round_select").on('change',function(e){
		e.preventDefault();

		var round_name = e.target.value;
		 $.ajax({
		
           type: "GET",
           url: "ajax-sim-round",
           dataType: 'json',
      	
           
           cache: false,
           data:  {
           		rs_type : $('input[name=rs_type]:checked').val(),
           		sim_name : $("#sim_select").val(),
           		round_name : round_name

           },
           success: function(data)
           {
           		content_info.hide();

           		if(!data.success) {
           			alert('it failed');
           		} else {
           			$('.mypanel').html(data.content_default);
           			content_info.slideDown("slow");
           			
           		}
           	

           		
           		
           	}
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			  	
			   
				
			   
			   
			   
           
         });
	});
});
$(function() {

	$('#simbar').attr('class','active');
	var mesgalert = $('.alert');
	var rs_info = $('#rs_info');
	var round_info = $('#round_info');
	var content_info = $('#content_info');
	var graph_info = $("#graph_info");
		$(document).ajaxStart(function(){
			mesgalert.hide().find('ul').empty();
    $('#loading').show();
    $('.myform').hide();
 }).ajaxStop(function(){
    $('#loading').hide();
    $('.myform').show();
 });

 	function showGraph (graphData) {

 		$('#graph_container').highcharts({
				        title: {
				            text: 'Monthly Average Temperature',
				            x: -20 //center
				        },
				        subtitle: {
				            text: 'Source: WorldClimate.com',
				            x: -20
				        },
				        xAxis: {
				            categories: graphData.categories
				        },
				        yAxis: {
				            title: {
				                text: 'Temperature (°C)'
				            },
				            plotLines: [{
				                value: 0,
				                width: 1,
				                color: '#808080'
				            }]
				        },
				        tooltip: {
				            valueSuffix: '°C'
				        },
				        legend: {
				            layout: 'vertical',
				            align: 'right',
				            verticalAlign: 'middle',
				            borderWidth: 0
				        },
				        series: [{
				            name: graphData.series.name,
				            data: graphData.series.bw
				        }


				        ]
				    });
 	}


 	function showGraphCompare (graphData) {
 		console.log(graphData);

 		var chart = new Highcharts.Chart(graphData.chart);
 		if (graphData.bar) {
	 			var barData = graphData.bar;
	 			var option_bar = {
	 			chart: {

	            type: 'column',
	            renderTo: 'graph--bar__container'
	        },
		        title: {
		            text: 'Summary network bandwidth all round'
		        },
		        subtitle: {
		            text: 'Source: VmigSimEngine'
		        },
		        xAxis: {
		            categories: barData.sim_round_name,
		            crosshair: true
		        },
		        yAxis: {
		            min: 0,
		            title: {
		                text: 'Bandwidth (Mbps)'
		            }
		        },
		        tooltip: {
		            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		                '<td style="padding:0"><b>{point.y:.1f} Mbps</b></td></tr>',
		            footerFormat: '</table>',
		            shared: true,
		            useHTML: true
		        },
		        plotOptions: {
		            column: {
		                pointPadding: 0.2,
		                borderWidth: 0
		            }
		        },
		        series: [{
		            name: 'Min',
		            data: barData.min

		        }, {
		            name: 'Max',
		            data: barData.max

		        }, {
		            name: 'Average',
		            data: barData.avg

		        }, {
		            name: 'SD',
		            data: barData.sd

		        }]
	    

 		}

 			var bar = new Highcharts.Chart(option_bar);

 		}
 		

 	}

	$('input[type=radio][name=rs_type]').change(function() {
	        var rs_type = $(this).val();
	        var sim_name = $("#sim_select").val();
	       
	        $.ajax({
	        	type : 'GET',
	        	url : 'ajax-sim-rs',
	        	cache: false,
	        	dataType: 'json',
	        	data : {
	        		sim_name : sim_name,
	        		rs_type : rs_type
	        	},
	        	 success: function(data) {
	        	 	graph_info.hide();
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
	        	 		
	        	 		if(data.graphData) {
	        	 			showGraphCompare(data.graphData);
		        	 		graph_info.slideDown("slow");
	        	 		}
	        	 		
	        	 		// chche rs tpye change anchor
	        	 		var stat_title = $("#stat_title");
	        	 		var bar_graph = $("#graph--bar__container");
	        	 		if(rs_type == "log") {
	        	 			stat_title.text('Log stat');
	        	 			round_info.slideDown("slow");
	        	 		} else if(rs_type == "net") {
	        	 			stat_title.text('Network trace stat');
	        	 			round_info.slideDown("slow");
	        	 			bar_graph.hide();	        	 			
	        	 			
	        	 		} else {
	        	 			stat_title.text('Network trace stat');
	        	 			round_info.hide();
	        	 			bar_graph.slideDown("slow");
	        	 		}

	        	 		
	        	 		rs_info.slideDown("slow");
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
           		graph_info.hide();

           		if(!data.success) {
           			alert('it failed');
           		} else {
           			$('.mypanel').html(data.content_default);
           			
           			if (data.graphData) {
           				showGraphCompare(data.graphData);
           				graph_info.slideDown("slow");
           			}
           			
           			
           			content_info.slideDown("slow");
           			
           		}
           	

           		
           		
           	}
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			  	
			   
				
			   
			   
			   
           
         });
	});
	 
	 
});
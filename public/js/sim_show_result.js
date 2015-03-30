$(function() {

	$('#sidebar .nav > li:eq(3)').addClass('active'); 
	var pathName = $(location).attr('pathname');
	pathName = pathName.split("/");
	var myPathReal = "";
	for (var i = 1; i < pathName.length; i++) {
		if(i!= pathName.length-1) {
			myPathReal += '/' + pathName[i];
		}
		
	};
	window.history.pushState("", "", myPathReal);
	console.log(myPathReal);

	$('#simbar').attr('class','active');
	var mesgalert = $('.alert');
	var rs_info = $('#rs_info');
	var round_info = $('#round_info');
	var content_info = $('#content_info');
	var graph_info_round = $("#graph--info__round");
	var graph_info_all = $("#graph--info__all");
	var bar_graph = $("#graph--bar__container");
	var tab_info = $("#tab--info");
		$(document).ajaxStart(function(){
			mesgalert.hide().find('ul').empty();
    $('#loading').show();
    $('.myform').hide();
 }).ajaxStop(function(){
    $('#loading').hide();
    $('.myform').show();
 });

 

 	function checkRsType (rstype,target) {
		
		if(rstype == 'net') {
	   		
	   		if(target == '#round') {
	   			
	   			rstype = 'net';
	   			
	   		} else {

	   			rstype = 'compar-net';

	   		}
	   		
	   	} else if (rstype == 'down-time-round') {
	   		if(target == '#round') {
	   			
	   			rstype = 'down-time-round';
	   			
	   		} else {

	   			rstype = 'down-time';

	   		}

	   	} else if (rstype == 'migration-time-round') {
	   		if(target == '#round') {
	   			
	   			rstype = 'migration-time-round';
	   			
	   		} else {

	   			rstype = 'migration-time';

	   		}
	   	} else if (rstype == 'violation') {
	   		if(target == '#round') {
	   			
	   			rstype = 'violation';
	   			
	   		} else {

	   			rstype = 'violation-all';

	   		}
	   	}  
	   	return rstype;
	}
 	function showGraphCompare (graphData) {
 		console.log(graphData);
 		if(graphData.chart) {
 			var chart = new Highcharts.Chart(graphData.chart);
 		}

 		if (graphData.bar) {
	 			var barData = graphData.bar;
	 			var option_bar = {
	 			chart: {

	            type: 'column',
	            renderTo: barData.renderTo
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

 		if (graphData.priority) {
 			var pbar = graphData.priority;
 			var option_bar = {
		 				chart: {
		                renderTo: pbar.renderTo,
		                type: 'column'
		            },
		            title: {
		                text: 'Percent of VMs complete migrated by each priority '
		            },
		            xAxis: {
		                categories: ['Priority1', 'Priority2', 'Priority3'],
		                title: {
			            	enabled: true,
			            	text: 'Level of priority'
			            }
		            },
		            yAxis: {
		            		min: 0,
		            		title: {
		                	text: 'Amount of VMs'
		            	},
		                stackLabels: {
		                    style: {
		                        color: 'black'
		                    },
		                    enabled: true,
		                    formatter: function() {
		                        	if(this.axis.series[1].yData[this.x]) {
		                        		return (this.axis.series[1].yData[this.x] / this.total * 100).toPrecision(2) + '%';
		                        	} else {
		                        		return 'No VM';
		                        	}
		                        	
		                        
		                        
		                            
		                    }
		                }
		            },
		            tooltip: {
		                formatter: function() {
		                    return '' + this.series.name + ': ' + this.y + '';
		                }
		            },
		            plotOptions: {

		                series: {

				                events: {
				                    legendItemClick: function () {
				                        return false; // <== returning false will cancel the default action
				                    }
				                }
				            ,
		                	animation: {
                    		duration: 3000
                			},
		                    stacking: 'normal'

		                }
		            },
		                series: [{
		                name: 'Incomplete',
		                data: pbar.incomplete,
		                color: '#808A87'
		            }, {
		                name: 'Complete',
		                data: pbar.complete,
		                color: '#90EE90'
		            }]
 			}
 			var bar = new Highcharts.Chart(option_bar);
 		}

 		else if (graphData.downtime) {
 			var downData = graphData.downtime
 			var option_bar = {

			        chart: {
			            type: 'column',
			             renderTo: downData.renderTo
			        },
			        title: {
			            text: 'VMs downtime each round in second '
			        },
			        subtitle: {
			            text: 'VmigSimEngine'
			        },
			        xAxis: {
			            categories: downData.name,
			            crosshair: true,
			            title: {
			            	enabled: true,
			            	text: 'Round name'
			            }
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Downtime (seconds)'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			                '<td style="padding:0"><b>{point.y:.2f} seconds</b></td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
			        plotOptions: {
			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            },
			             series: {
		                	animation: {
                    		duration: 3000
                			}
		                }

			        },
			        series: [{
			            
			            name: 'average',
			            data: downData.average

			        }]
 			}

 			var bar = new Highcharts.Chart(option_bar);
 		} else if (graphData.downtime_round) {
 			var downData = graphData.downtime_round
 			var option_bar = {

			        chart: {

			             renderTo: downData.renderTo
			        },
			        title: {
			            text: 'VMs down time in '+ downData.name
			        },
			        subtitle: {
			            text: 'VmigSim Engine'
			        },
			        legend: {
			        	enabled: false
			        }
			        ,
			        xAxis: {
			            categories: downData.number,
			            crosshair: true,
			            title: {
			            	enabled: true,
			            	text: '#VMs'
			            }
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Down time (seconds)'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px"><b>#VM:</b> {point.key}</span><table>',
			            pointFormat: '<tr><td style="padding:0"><b>VM id:</b> {point.vmId} </td></tr>' +
			                '<tr><td style="padding:0"><b>Down time:</b> {point.y:.2f} seconds</td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true

			        },
			        plotOptions: {
			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            },
			             series: {
		                	animation: {
                    		duration: 3000
                			}
		                }

			        },
			        series: [{
			            name: downData.name,
			            data: downData.data
			        
			        }]
 			}

 			var bar = new Highcharts.Chart(option_bar);
	 	} else if (graphData.migrationtime_round) {
 			var downData = graphData.migrationtime_round
 			var option_bar = {

			        chart: {
			                renderTo: downData.renderTo
			        },
			        title: {
			            text: 'VMs Migration time in '+ downData.name
			        },
			        subtitle: {
			            text: 'VmigSimEngine'
			        },
			        xAxis: {
			            categories: downData.number,
			            crosshair: true,
			            title: {
			            	enabled: true,
			            	text: '#VM'
			            }
			        },
			        legend: {
			        	enabled: false
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Migration time (seconds)'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px"><b>#VM:</b> {point.key}</span><table>',
			            pointFormat: '<tr><td style="padding:0"><b>VM id:</b> {point.vmId} </td></tr>' +
			                '<tr><td style="padding:0"><b>Migration time:</b> {point.y:.2f} seconds</td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
			        plotOptions: {
			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            },
			             series: {
		                	animation: {
                    		duration: 3000
                			}
		                }

			        },
			        series: [{
			            name: downData.name,
			            data: downData.data

			        }]
 			}

 			var bar = new Highcharts.Chart(option_bar);
	 	}

 		else if (graphData.migrationtime) {
 			var migration = graphData.migrationtime;
 			var option_bar = {

			        chart: {
			            type: 'column',
			            renderTo: migration.renderTo
			        },
			        title: {
			            text: 'VMs Migration time each round in second '
			        },
			        subtitle: {
			            text: 'VmigSimEngine'
			        },
			        xAxis: {
			            categories: migration.name,
			            crosshair: true,
			            title: {
			            	enabled: true,
			            	text: 'Round name'
			            }
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Migration time (seconds)'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			                '<td style="padding:0"><b>{point.y:.1f} seconds</b></td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
			        plotOptions: {
			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            },
			             series: {
		                	animation: {
                    		duration: 3000
                			}
		                }

			        },
			        series: [{
			           
			            name: 'average',
			            data: migration.average

			        }]
 			}

 			var bar = new Highcharts.Chart(option_bar);
 		}

 		else if (graphData.violation) {
 			var vio = graphData.violation;
 			var option = {
 				chart: {
 					type: 'pie',
 				renderTo: 'graph_container',
 				events: {
 					load: function (event) {
 						 var text = this.renderer.text(
				                'Total VMs migrated : ' + vio.total,
				                this.plotLeft,
				                this.plotTop + 20
				            ).attr({
				                zIndex: 3
				            }).add()
 					}
 				}
               
            },
	            title: {
	                text: 'VMs violation in '+ vio.name
	            },
	            tooltip: {
	                pointFormat: '{series.name}: <b>{point.y:.1f}</b>'
	            },
	            plotOptions: {
	                pie: {
	                    allowPointSelect: true,
	                    cursor: 'pointer',
	                    dataLabels: {
	                        enabled: true,
	                         formatter: function() {
	                         	return Math.round(this.percentage*100)/100 + ' %';
	                         },
	                         distance: -30,
                    		color:'white'

	                    },
	                    showInLegend: true
	                }
	            },
	            series: [{
	               
	                name: 'Amount VMs',
	                data: [
	                    {
	                    	name: 'Violation',
	                    	y: vio.violated,
	                    	sliced: true,
	                        selected: true
	                    },
	                    ['Non Violation', vio.nonviolated],
	                ]
	            }]

	 		}
	 		var pie = new Highcharts.Chart(option);
	 	} else if (graphData.violationall) {
 			var vio = graphData.violationall;
 			var option_bar = {

			        chart: {
			            type: 'column',
			            renderTo: vio.renderTo
			        },
			        title: {
			            text: 'VMs violation each round '
			        },
			        subtitle: {
			            text: 'VmigSimEngine'
			        },
			        xAxis: {
			            categories: vio.name,
			            crosshair: true,
			            title: {
			            	enabled: true,
			            	text: 'Round name'
			            }
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Amount of VMs'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			                '<td style="padding:0"><b>{point.y:.1f} VMs</b></td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
			        plotOptions: {
			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            },
			             series: {
		                	animation: {
                    		duration: 3000
                			}
		                }

			        },
			        series: [{
			            name: 'violated',
			            data: vio.violated

			        }, {
			            name: 'non-violated',
			            data: vio.nonviolated

			        }]
 			}

 			var bar = new Highcharts.Chart(option_bar);
 		}

 	}

	$('input[type=radio][name=rs_type]').change(function() {
		
	        var rs_type = $(this).val();
	        var sim_name = $("#sim_select").val();
	       	var tab_bar = $("#myTab");
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
	        	 	
	        	 	
	        	 	graph_info_round.hide();
	        	 	graph_info_all.hide();
	        	 	bar_graph.hide();
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
		        	 		
	        	 		}
	        	 		
	        	 		// chche rs tpye change anchor
	        	 		var stat_title = $("#stat_title");
	        	 		var graph_title = $(".graph_title");
	        	 		tab_bar.find("li:eq(0)").hide();
	        	 		tab_bar.find("li:eq(1)").hide();
	        	 		
	        	 		if(rs_type == "log") {
	        	 			stat_title.text('Log stat');
	        	 			
	        	 			round_info.slideDown("slow");
	        	 		} else if(rs_type == "net") {
	        	 			graph_title.text('Network bandwidth graph');
	        	 			stat_title.text('Network trace stat');

	        	 			$('.nav-tabs li:first-child a').tab('show'); 
	        	 			tab_bar.find("li:eq(0)").show();
	        	 			tab_bar.find("li:eq(1)").show();
	        	 			round_info.slideDown("slow");
	        	 			graph_info_round.slideDown("slow");
	        	 			

	        	 	   	 			
	        	 			
	        	 		} else if(rs_type == "compar-net" ){
	        	 			graph_title.text('Network bandwidth comapre graph');
	        	 			stat_title.text('Network trace stat');
	        	 			
	        	 			$('.nav-tabs li:eq(1) a').tab('show'); 
	        	 			tab_bar.find("li:eq(0)").show();
	        	 			tab_bar.find("li:eq(1)").show();
	        	 			graph_info_all.slideDown("slow");
	        	 			//bar_graph.slideDown("slow");

	        	 		} else if(rs_type == "priority" ){
	        	 			
	        	 			graph_title.text('Priority graph');
	        	 			stat_title.text('priority stat');
	        	 			tab_bar.find("li:eq(0)").show();
	        	 			$('.nav-tabs li:first-child a').tab('show'); 
	        	 			
	        	 			
	        	 			round_info.slideDown("slow");
	        	 			graph_info_round.slideDown("slow");
	        	 			//$("#graph_info").scrollTo("#graph_container");
	        	 		} else if(rs_type == "down-time") {
	        	 			graph_title.text('VMs Down time graph');
	        	 			stat_title.text('Down time stat');
	        	 			graph_info_all.slideDown("slow");
	        	 			tab_bar.find("li:eq(0)").show();
	        	 			tab_bar.find("li:eq(1)").show();
	        	 			$('.nav-tabs li:eq(1) a').tab('show'); 
	        	 			$('#graph--chart').hide();
	        	 			$('#graph--bar').show();
	        	 		} else if(rs_type == "down-time-round") {
	        	 			
	        	 			graph_title.text('VMs Down time graph');
	        	 			stat_title.text('Down time stat');
	        	 			$('.nav-tabs li:first-child a').tab('show'); 
	        	 			tab_bar.find("li:eq(0)").show();
	        	 			tab_bar.find("li:eq(1)").show();
	        	 			round_info.slideDown("slow");
	        	 			graph_info_round.slideDown("slow");
	        	 			
	        	 		} else if(rs_type == "migration-time-round") {
	        	 			graph_title.text('VMs Migration time graph');
	        	 			stat_title.text('VMs time stat');
	        	 			$('.nav-tabs li:first-child a').tab('show'); 
	        	 			tab_bar.find("li:eq(0)").show();
	        	 			tab_bar.find("li:eq(1)").show();
	        	 			round_info.slideDown("slow");
	        	 			graph_info_round.slideDown("slow");
	        	 		} else if(rs_type == "migration-time") {
	        	 			graph_title.text('VMs Migration time graph');
	        	 			stat_title.text('VMs time stat');
	        	 			tab_bar.find("li:eq(1)").show();
	        	 			$('.nav-tabs li:eq(1) a').tab('show'); 
	        	 			$('#graph--chart').hide();
	        	 			$('#graph--bar').show();
	        	 			graph_info_all.slideDown("slow");
	        	 		} else if(rs_type == "violation") {
	        	 			
	        	 			graph_title.text('VMs Violation graph');
	        	 			stat_title.text('VMs Violation stat');
	        	 			$('.nav-tabs li:first-child a').tab('show'); 
	        	 			tab_bar.find("li:eq(0)").show();
	        	 			tab_bar.find("li:eq(1)").show();
	        	 			round_info.slideDown("slow");
	        	 			graph_info_round.slideDown("slow");
	        	 		} 

	        	 		
	        	 		tab_info.slideDown("slow");
	        	 		rs_info.slideDown("slow");
	        	 		content_info.slideDown("slow");
	        	 		
	        	 		
	        	 		/* jump to elemnt 
	        	 		$('html, body').animate({
				        scrollTop: $("#content_info").offset().top
				    	}, 2000);*/
	        	 	}
	        	 }
	        });

	 });

	$("#sim_select").on('change',function(e){
		e.preventDefault();

		$('input:radio[name=rs_type]')[0].checked = true;
		$('input:radio[name=rs_type]:nth(0)').val('log').change();
		
		
		
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
           		graph_info_round.hide();

           		if(!data.success) {
           			alert('it failed');
           		} else {
           			$('.mypanel').html(data.content_default);
           			
           			if (data.graphData) {
           				showGraphCompare(data.graphData);
           				graph_info_round.slideDown("slow");
           			}
           			
           			
           			content_info.slideDown("slow");
           			
           		}
           	

           		
           		
           	}
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			  	
			   
				
			   
			   
			   
           
         });
	});
	 
	$('.nav-tabs').bind('click', function (e) {
	    var target = $(e.target).attr("href"); // activated tab
	  	var sim_name = $("#sim_select").val();
	    var tab_bar = $("#myTab");
	    var tab_content =  $('#myTabContent');
	    var rstype = $('input:radio[name=rs_type]:checked').val();
	    var graph_info_round = $("#graph--info__round");
	    var graph_info_all = $("#graph--info__all");
	   	var graph_chart = $('#graph--chart');
	   	var graph_bar = $('#graph--bar');

	    
	    //tabpane.empty();
	   	rstype = checkRsType(rstype,target);

	    tab_content.hide();

	     $.ajax({
	     		type : 'GET',
	        	url : 'ajax-sim-rs',
	        	cache: false,
	        	dataType: 'json',
	        	data : {
	        		sim_name : sim_name,
	        		rs_type : rstype
	        	},
	        	 success: function(data) {
	        	 	graph_info_round.hide();
	        	 	graph_info_all.hide();
	        	 	graph_chart.hide();
	        	 	graph_bar.hide();
	        	 	tab_bar.find("li:eq(0)").hide();
	        	 	tab_bar.find("li:eq(1)").hide();
	        	 	showGraphCompare(data.graphData);
	        	 	if(rstype == 'net') {
	        	 		$('.nav-tabs li:eq(0) a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		tab_bar.find("li:eq(1)").show();
	        	 		graph_info_round.slideDown("slow");
	        	 	} else if (rstype == 'compar-net') {
	        	 		$('.nav-tabs li:eq(1) a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		tab_bar.find("li:eq(1)").show();
	        	 		graph_info_all.slideDown("slow");
	        	 		graph_chart.show();
	        	 		graph_bar.show();
	        	 	} else if (rstype == 'priority') {
	        	 		$('.nav-tabs li:eq(0) a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		//tab_bar.find("li:eq(1)").show();
	        	 		graph_info_round.slideDown("slow");

	        	 	} else if (rstype == 'down-time-round') {
	        	 		$('.nav-tabs li:first-child a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		tab_bar.find("li:eq(1)").show();
	        	 		graph_info_round.slideDown("slow");

	        	 	} else if (rstype == 'down-time') {
	        	 		$('.nav-tabs li:eq(1) a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		tab_bar.find("li:eq(1)").show();
	        	 		graph_info_all.slideDown("slow");

	        	 		graph_bar.show();

	        	 	} else if (rstype == 'migration-time-round') {
	        	 		$('.nav-tabs li:first-child a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		tab_bar.find("li:eq(1)").show();
	        	 		graph_info_round.slideDown("slow");

	        	 	} else if (rstype == 'migration-time') {
	        	 		$('.nav-tabs li:eq(1) a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		tab_bar.find("li:eq(1)").show();
	        	 		graph_info_all.slideDown("slow");
	        	 		
	        	 		graph_bar.show();

	        	 	}  else if (rstype == 'violation') {
	        	 		$('.nav-tabs li:eq(0) a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		tab_bar.find("li:eq(1)").show();
	        	 		graph_info_round.slideDown("slow");

	        	 	} else if (rstype == 'violation-all') {
	        	 		$('.nav-tabs li:eq(1) a').tab('show'); 
	        	 		tab_bar.find("li:eq(0)").show();
	        	 		tab_bar.find("li:eq(1)").show();
	        	 		graph_info_all.slideDown("slow");
	        	 		graph_bar.slideDown('slow');
	        	 	} 
	        	 	tab_content.slideDown("slow");
	        	 }

	     });


	    
    });


	var sim_name = $("#sim_select").val();
	$("#sim_select").val(sim_name).trigger('change');
});
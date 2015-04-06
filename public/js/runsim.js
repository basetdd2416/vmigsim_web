

$(function() {
	// clock

 $('#sidebar .nav > li:eq(1)').addClass('active'); 

 var run_info = $('#run--info');
 var run_history = $('#run--history');

	function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
        
  }
  $('#accordion').on('hidden.bs.collapse', toggleChevron);
  $('#accordion').on('shown.bs.collapse', toggleChevron);

	

	//
	$('#simbar').attr('class','active');
	var mesgalert = $('.alert--sim');
	var envi_info = $('#envi_info');
	var policy_info = $('#policy_info');
	var app_info = $('#app_info');
	var vm_info = $('#vm_info');


	$(document).ajaxStart(function(){
	 mesgalert.hide().find('ul').empty();
    $('#loading').show();
    
    
    run_info.hide();
 }).ajaxStop(function(){
   $('#loading').hide();
    run_info.show();

 });
 

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
		mesgalert.hide().find('ul').empty();
		mesgalert = $('.alert--sim');

		var date_time = moment().format('MM-DD-YYYY_h-mm-ss_a');
		var user_name = 'Sim';
		var sim_name = user_name + '_' + date_time;
		
		 $("input[name='simulation_name']").val(sim_name);
		 $("input[name='sim_round']").val('1');
		 $("#config_select option:eq(1)").change();

		mesgalert.attr('class','alert alert--sim alert-success');
		mesgalert.find('ul').append('<li>set all default simulation completed.</li>');
		mesgalert.slideDown();
		 
		
	});
	
	$("#config_select").on('change',function(e){
		e.preventDefault();
		$('img').attr('height','200');
		$('img').attr('width','200');
		$('img').attr('src','http://vmig.dev/images/loading.gif');
		

		var config_id = e.target.value;
		 $.ajax({
		
           type: "GET",
           url: "ajax-config?config_id=" + config_id,
           dataType: 'json',
      		async : false,
           
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
           		$("#config_select").val(data.envi.configuration_id);
           		$('#envi_name').text(data.envi.name);
           		$('#bandwidth').text(data.envi.bandwidth);
           		$('#time_limit').text(data.envi.time_limit);
           		$('#schedule').text(data.envi.schedule_type);
           		$('#migration').text(data.envi.migration_type);
           		$('#control').text(data.envi.control_type);
           		
           		$('#page_size').text(data.envi.page_size);
           		$('#wws_ratio').text(data.envi.wws_ratio);
           		$('#wws_dirty_rate').text(data.envi.wws_dirty_rate);
           		$('#max_pre_round').text(data.envi.max_precopy_round);
           		$('#normal_dirty_rate').text(data.envi.normal_dirty_rate);
           		$('#min_dirty_page').text(data.envi.min_dirty_page);
           		$('#max_no_prog').text(data.envi.max_no_progress_round);
           		$('#network_type').text(data.envi.network_type);
           		$('#page_size').text(data.envi.page_size);
           		$('#network_interval').text(data.envi.network_interval);
           		$('#network_mean').text(data.envi.network_mean);
           		$('#network_sd').text(data.envi.network_sd);

              var sd = $('#containner-sd');
              if(data.envi.network_type == 'dynamic') {
                
                sd.show();
              } else {
                sd.hide();
              }

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
  	
    /*$("#collapseOne").collapse('show');
    $("#collapseTwo").collapse('hide');
    $('img').attr('height','600');
  	$('img').attr('width','600');
  	$('img').attr('src','http://vmig.dev/images/loading-src-dest-3.gif');*/
  	var sim_name = $('#info--sim__name');
    var sim_status = $('#info--sim__status');
    var sim_link = $('#info--sim__link');
  	var myform = $(this).closest("form");
  	var mycustomform =	myform.serializeObject();
  	 //setInterval('updateClock()', 1000);
    
  	sim_name.text(mycustomform.simulation_name);
	  sim_link.hide();

    $.ajax({

           type: "POST",
           url: "savesimulation",
           dataType: 'json',
           async : true,
           
           cache: false,
           data:  mycustomform,
           success: function(data)
           {
           	//alert(data.success);
           		mesgalert.hide().find('ul').empty();
           		//mesgalert.attr('class','alert alert--sim alert-danger');
           		if(!data.success) {
           			mesgalert.attr('class','alert--sim alert-danger alert');
           			//window.location.replace(data.redirect);
           			//top.location.href = data.redirect;
           			//window.location.href = data.redirect;
           			$.each(data.errors , function (index,error){

           				mesgalert.find('ul').append('<li>'+error+'</li>');
           			});
                
                sim_status.hide();
                sim_status.find('span').attr('class','label label-danger');
                sim_status.find('span').text('failed');
                sim_status.fadeIn("slow");
           			mesgalert.slideDown();
           		} else { // sucess case 
           			//window.location.href = data.redirect;
                // change status to complete and link to view result na ja
                var ajaxTime = new Date().getTime();
                var clock = $('.your-clock').FlipClock({
                });
                  


                console.log(ajaxTime);
                console.log(data);
                
                window.location.href = "history";
                
                $.ajax({
                    type: "GET",
                    url: "run-sim-engine",
                    dataType: 'json',
                    cache: false,
                    data: data,
                    success: function(engineData) {
                      console.log(engineData);
                      if(engineData.success) {
                          clock.stop();
                          console.log(clock);
                          var totalTime = new Date().getTime() - ajaxTime;
                          var totalTimeUse =  clock.getTime();
                          console.log('totalTimeUse: '+ (totalTimeUse - 1) );
                          console.log('total time: '+ totalTime);
                      } else {
                        alert('failed');
                      }
                    },
                    complete: function () {
                      
                    }
                });
                /*sim_link.find('a').attr('href',data.redirect);
                sim_status.hide();
                sim_status.find('span').attr('class','label label-success');
                sim_status.find('span').text('success');
                sim_status.fadeIn("slow");
           			sim_link.fadeIn("slow");*/
           		}
           		
               // show response from the php script.
			   //$('#collapseOne').attr('class','panel-collapse collapse');
			   //$('#collapseTwo').attr('class','panel-collapse collapse in');
			   
			   
				
			   
			   
			   
           },
            error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
            alert(thrownError);
          }
         });
		 
    return false; // avoid to execute the actual submit of the form.
	});
});
var timer = null
function checkStatus() {
      
      $.ajax({
        url: 'check-status', //'check-status',
        
        type:  'GET',
       
        success: function(data)
           {
              
              console.log(data);
              $('#collapseOne').html(data.render);
              //$('#collapseOne').find('.panel-body').hide();
            
              //$('#collapseOne').find('.panel-body').fadeIn('slow');
              // element running will fadeIn
              $('.run').each(function() {
                var currentElement = $(this);
                currentElement.hide();
                currentElement.fadeIn(1000);
              });
              if(data.isSimRun) {
                timer = setTimeout(checkStatus,1000);
              } else {
                
                clearTimeout(timer);
                var mesgalert = $('.alert--sim');
                mesgalert.attr('class','alert alert--sim alert-success');
                mesgalert.find('ul').append('<li>Run simulation completed.</li>');
                mesgalert.slideDown();
              }
              
              
        }

    });
}

 


$(document).on('click','tr td .details',function(e){ 
    e.preventDefault();
    var sim = null;
    var config = null;
    var envi = null;
    var vmobj = {};
    var netCapDetail = [];
    var $textAndPic = $('<div></div>');
    $textAndPic.append('<img id="beatles" src="../images/map-area.jpg" usemap="#beatles-map"/>');
    var $capStype = $('<div class="center-block" style="width:390px; height: 200px; font-size: 12px; "></div>');
    var $capContain = $('<div  id="beatles-caption" style="clear:both;border: 1px solid black; width: 400px; padding: 6px; display:none;"></div>');
    var $capHead = $('<div id="beatles-caption-header" style="font-style: italic; font-weight: bold; margin-bottom: 12px;"></div>')
    var $capText = $('<div id="beatles-caption-text"></div>')
    $capContain.append($capHead);
    $capContain.append($capText);
    $capStype.append($capContain);
    $textAndPic.append($capStype);

    var id = $(this).attr('href');

    $.ajax({
        url: 'query-sim-detail',
        data: {
          id: id
        },
        cache: false,
        dataType: 'json',

        success: function (data){
          
          if(!data.success) {
              alert('id not found');
          } else {

            sim = data.sim;
            config = data.config;
            envi = data.envi;
            vmobj = processVM(data.vms);
            netCapDetail = processNetwork(data.envi);
            console.log(vmobj);
            console.log(netCapDetail);
              BootstrapDialog.show({
                title: sim.sim_name,
                cssClass: 'login-dialog',
                message:  $textAndPic,
                       buttons: [{
                            id: 'btn-ok',   
                            icon: 'glyphicon glyphicon-check',       
                            label: 'OK',
                            cssClass: 'btn-primary', 
                            autospin: false,
                            action: function(dialogRef){    
                                dialogRef.close();
                            }
                    }]
            });
          }
        
        },
        complete: function() {

          var captions = {
              src: ["Source datacenter",
                  "<b>Total VMs:</b> "+ vmobj.total,
                  "<b>Priority 1:</b> " + vmobj.p1,
                  "<b>Priority 2:</b> " + vmobj.p2,
                  "<b>Priority 3:</b> " + vmobj.p3,
                  "<b>Priority 4:</b> " + vmobj.p4
                   ],
              dest: ["Destination datacenter results type",
                  "Log file","Network bandwidth trace interval","Completely migrated VM by priority", "VM migration time", "VM downtime", "QoS violated VM"],
              envi: ["Environment",
                  "<b>Scheduling:</b> "    + envi.schedule_type , 
                  "<b>Migration:</b> "         + envi.migration_type ,
                  "<b>Control algorithm:</b> " + envi.control_type ,
                  "<b>Time limit:</b> " + (envi.time_limit / 60 ) + ' '+ '<b>Minutes</b>'

                  ],
              network: []
     
        }

        captions.network = processNetwork(envi);
         
          
          
          var inArea,
    map = $textAndPic.find('#beatles'),
    
    single_opts = {
        fillColor: '000000',
        fillOpacity: 0,
        stroke: true,
        strokeColor: 'ff0000',
        strokeWidth: 2
    },
    all_opts = {
        fillColor: 'ffffff',
        fillOpacity: 0.6,
        stroke: true,
        strokeWidth: 2,
        strokeColor: 'ffffff'
    },
    initial_opts = {
        mapKey: 'data-name',
        isSelectable: false,
        onMouseover: function (data) {
            inArea = true;
            for (var i = 0 ; i < captions[data.key].length ; i++) {
              if(i==0) {
                $textAndPic.find('#beatles-caption-header').text(captions[data.key][0]);
              } else {
                $textAndPic.find('#beatles-caption-text').append('<p>'+ captions[data.key][i] +'</p>');
              }
            }
            
            $textAndPic.find('#beatles-caption').show();
        },
        onMouseout: function (data) {
            inArea = false;
            $textAndPic.find('#beatles-caption-text').empty();
            $textAndPic.find('#beatles-caption').hide();

        }
    };
    opts = $.extend({}, all_opts, initial_opts, single_opts);


    // Bind to the image 'mouseover' and 'mouseout' events to activate or deactivate ALL the areas, like the
    // original demo. Check whether an area has been activated with "inArea" - IE<9 fires "onmouseover" 
    // again for the image when entering an area, so all areas would stay highlighted when entering
    // a specific area in those browsers otherwise. It makes no difference for other browsers.

    map.mapster('unbind')
        .mapster(opts)
        .bind('mouseover', function () {
         
            if (!inArea) {
               //alert('over');
                map.mapster('set_options', all_opts)
                    .mapster('set', true, 'all')
                    .mapster('set_options', single_opts);
            }
        }).bind('mouseout', function () {

            if (!inArea) {
              //alert('out');
                map.mapster('set', false, 'all');
            }
        });
        }
    });
    
});




$(document).on('click','.pagination a',function(e){
  e.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  getSims(page);
});

function getSims(page) {
  $.ajax({
    url: 'ajax-run-sim-history?page='+ page
  }).done(function(data){
    $('#collapseOne').html(data);
    
  });
}
function updateClock ( )
    {
    var currentTime = new Date ( );
    var currentHours = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentSeconds = currentTime.getSeconds ( );
 
    // Pad the minutes and seconds with leading zeros, if required
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
 
    // Choose either "AM" or "PM" as appropriate
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";
 
    // Convert the hours component to 12-hour format if needed
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
 
    // Convert an hours component of "0" to "12"
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;
 
    // Compose the string for display
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
     
     
    $("#clock").html(currentTimeString);
         
 	}

  function createMapArea() {

    var inArea,
    map = $textAndPic.find('#beatles'),
    captions = {
        src: ["Paul McCartney - Bass Guitar and Vocals",
            "Paul McCartney's song, Yesterday, recently voted the most popular song "
                + "of the century by a BBC poll, was initially composed without lyrics. "
                + "Paul used the working title 'scrambled eggs' before coming up with the final words."],
        dest: ["Ringo Starr - Drums",
            "Dear Prudence was written by John and Paul about Mia Farrow's sister, Prudence, "
            + "when she wouldn't come out and play with Mia and the Beatles at a religious retreat "
            + "in India."],
        envi: ["John Lennon - Guitar and Vocals",
            "In 1962, The Beatles won the Mersyside Newspaper's biggest band in Liverpool "
            + "contest principally because they called in posing as different people and voted "
            + "for themselves numerous times."]
     
    },
    single_opts = {
        fillColor: '000000',
        fillOpacity: 0,
        stroke: true,
        strokeColor: 'ff0000',
        strokeWidth: 2
    },
    all_opts = {
        fillColor: 'ffffff',
        fillOpacity: 0.6,
        stroke: true,
        strokeWidth: 2,
        strokeColor: 'ffffff'
    },
    initial_opts = {
        mapKey: 'data-name',
        isSelectable: false,
        onMouseover: function (data) {
            inArea = true;
            $textAndPic.find('#beatles-caption-header').text(captions[data.key][0]);
            $textAndPic.find('#beatles-caption-text').text(captions[data.key][1]);
            $textAndPic.find('#beatles-caption').show();
        },
        onMouseout: function (data) {
            inArea = false;
            $textAndPic.find('#beatles-caption').hide();
        }
    };
    opts = $.extend({}, all_opts, initial_opts, single_opts);


    // Bind to the image 'mouseover' and 'mouseout' events to activate or deactivate ALL the areas, like the
    // original demo. Check whether an area has been activated with "inArea" - IE<9 fires "onmouseover" 
    // again for the image when entering an area, so all areas would stay highlighted when entering
    // a specific area in those browsers otherwise. It makes no difference for other browsers.

    map.mapster('unbind')
        .mapster(opts)
        .bind('mouseover', function () {
            if (!inArea) {
              
                map.mapster('set_options', all_opts)
                    .mapster('set', true, 'all')
                    .mapster('set_options', single_opts);
            }
        }).bind('mouseout', function () {
            if (!inArea) {

                map.mapster('set', false, 'all');
            }
        });
  }

  function processVM (data) {
    var vms = data;
    var vmo = {};
    vmo.total = 0;
    vmo.p1 = 0;
    vmo.p2 = 0;
    vmo.p3 = 0;
    vmo.p4 = 0;
          for (var i = 0 ; i< vms.length ; i++ ) {
            
            if (vms[i].priority == 1) {
              vmo.p1 = parseInt(vmo.p1 + vms[i].amount);
            } else if (vms[i].priority == 2) {
              vmo.p2 = parseInt(vmo.p2 + vms[i].amount);
            } else if(vms[i].priority == 3) {
              vmo.p3 = parseInt(vmo.p3 + vms[i].amount);
            } else {
              vmo.p4 = parseInt(vmo.p4 + vms[i].amount);
            }
          }
          vmo.total = vmo.p1+vmo.p2+vmo.p3+vmo.p4;
    return vmo;
  }

  function processNetwork (data) {
    var envi = data;
    var nettmp = [];
    nettmp[0] = "Network"
    nettmp[1] = "<b>Type:</b> "    + envi.network_type;
    nettmp[2] = "<b>Bandwidth:</b> "         + envi.bandwidth      +' '+ '<b>Mbp per seconds</b>';
    nettmp[3] = "<b>Mean:</b> " + envi.network_mean + ' '+ '<b>%</b>';
            
   if (data.network_type=='dynamic') {
    nettmp[4]  = "<b>Standard deviation:</b> " + envi.network_sd + ' '+ '<b>%</b>'
   }

    return nettmp;
  }
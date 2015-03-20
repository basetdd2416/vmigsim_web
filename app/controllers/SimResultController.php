<?php
date_default_timezone_set("Asia/Bangkok"); 
class SimResultController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id = null)
	{
		$default = null;
		$directory = 'run_simulation/output/';
		$scanned_directory = array_diff(scandir($directory), array('..', '.'));
		$dirs = array();
		$index = 0;
		for ($i=2; $i < count($scanned_directory)+2 ; $i++) { 

			$dirs[$scanned_directory[$i]] = $scanned_directory[$i];
			$index++;
		}
		if($id != null) {
			if(Input::get('sim_name')) {
				$sim_name = Input::get('sim_name');
				return View::make('sim_result.index')->with('sim_name_list',$dirs)->with('default',$sim_name);
			}
			

			$default = Simulation::find($id);
			return View::make('sim_result.index')->with('sim_name_list',$dirs)->with('default',$default->sim_name);
		} else {
			return View::make('sim_result.index')->with('sim_name_list',$dirs)->with('default',$default);
		} 
		
		
		/*var_dump($scanned_directory);
		var_dump($dirs);
		$dir_out = 'run_simulation/output';
		$dir_log = '/logfile';
		$dir_net = '/network';
		$dir_sim_full_path = array();
*/
		/*$files = array();
		for ($i=0; $i < count($dirs) ; $i++) { 
			$content_file = "";
			$dir_sim = "/".$dirs[$i];
			$dir_full_log = $dir_out.$dir_sim.$dir_log;
			$dir_full_net = $dir_out.$dir_sim.$dir_log;
			$dir_sim_full_path[$i]['sim_name'] = $dir_sim;
			$dir_sim_full_path[$i]['sim_name']['log_list'] = $dir_full_log;
			$dir_sim_full_path[$i]['sim_name']['net_list'] = $dir_full_net;
			//$file = file_get_contents('./people.txt', FILE_USE_INCLUDE_PATH);
			//$dirs[$i] = $scanned_directory[$i];
			
		}*/
		/*
	for ($i=0; $i < count($dirs) ; $i++) { 
			$files1 = array_diff(scandir($dir_out.'/'.$dirs[$i]), array('..', '.'));
			var_dump($files1);
			//$file = file_get_contents('./people.txt', FILE_USE_INCLUDE_PATH);
		}
		
		$file = file_get_contents('run_simulation/output/Vmig_02-11-2015_12-50-38_pm/logfile/log-round1.txt', FILE_USE_INCLUDE_PATH);
		var_dump($file);

		$di = new RecursiveDirectoryIterator('run_simulation\\output\\',RecursiveDirectoryIterator::SKIP_DOTS);
		$it = new RecursiveIteratorIterator($di);

		foreach($it as $file)
		{
		    if(pathinfo($file,PATHINFO_EXTENSION) == "txt")
		    echo $file .'<br>';
		}*/
	}

	public function ajaxSimRsType() {
		$data = array();
		$data['compare'] = false;
		$sim_name = Input::get('sim_name');
		//$sim_name = substr(0,strpos(Input::get('sim_name'), '.text'));
		//return var_dump($sim_name);
		
		$rs_type = Input::get('rs_type');
		$dir_output_base = 'run_simulation/output/';
		$dir_log = '/logfile';
		$dir_net = '/network';
		$dir_result = "/result";
		if($rs_type=='log') {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_log;
		} else if ($rs_type=='net' || $rs_type=='compar-net') {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_net;
		} else if ($rs_type=='priority' || $rs_type=='down-time' 
			|| $rs_type=='migration-time' || $rs_type=='violation' 
			|| $rs_type=='violation-all'
			|| $rs_type=='down-time-round'
			|| $rs_type=='migration-time-round') {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_result;
		}
		// scan file
		$scanned_directory = scandir($dir_output_to_file);
		
		$dirs = array();
		$index = 0;
		for ($i=0; $i < count($scanned_directory) ; $i++) { 
			if($i!=0 && $i!=1) {
				$dirs[$index] = $scanned_directory[$i];
				$index++;
			}
			
		}
		// read by line and graph
		if ($rs_type == 'net') {
			$graphData = array();
			$details = array();

			$details['head_title'] = 'Network bandwidth each interval in second.';
			$details['sub_title'] = $dirs['0'];
			$details['y_title'] = 'Bandwidth (Mbps)';
			

			$graphData = $this->initGraph($details);
			$graphData['legend']['enabled'] = false;
			

			$graphData['chart']['zoomType'] = 'x';
			$graphData['chart']['renderTo'] = 'graph_container';
			$graphData['chart']['type'] = 'line';
		
			//$graphData['xAxis']['minTickInterval'] = 10;
			$graphData['scrollbar']['enabled'] = true;
			$graphData['xAxis']['minRange'] = 20;
			

			

				$sim_obj = Simulation::where('sim_name','=',$sim_name)->first();
				$envi = Environment::where('configuration_id','=',$sim_obj->configuration_id)->first();
				$amountData = $envi->time_limit / $envi->network_interval;
				// optional
				if($amountData  > 600) {
					$graphData['xAxis']['max'] = 600;
				}
				

				$handle = fopen($dir_output_to_file.'/'.$dirs[0], "r");
				


				if ($handle) {
					
					$graphData['series'][0]['name'] = $dirs[0];
					
					$index = 1;
				    while (($line = fgets($handle)) !== false) {
				    			
				    				$graphData['xAxis']['categories'][] = $index * $envi->network_interval;
				    				$graphData['series'][0]['data'][] = floatval($line);
				    				
				    		
				    		$index++;
				    }
				    $data['compare'] = true;
				    $data['graphData']['chart'] = $graphData;
				    fclose($handle);
				} else {
				    // error opening the file.
				} 
			}
		
		else if ($rs_type == 'compar-net') {
			$graphData = array();
			$details = array();
			$barData = array(); 
			$details['head_title'] = 'Network bandwidth each interval in second.';
			$details['sub_title'] = 'All round';
			$details['y_title'] = 'Bandwidth (Mbps)';

			$graphData = $this->initGraph($details);
			


			$graphData['chart']['zoomType'] = 'x';

			$graphData['chart']['renderTo'] = 'graph--chart';
			$graphData['chart']['type'] = 'line';
		
			//$graphData['xAxis']['minTickInterval'] = 10;
			$graphData['scrollbar']['enabled'] = true;
			$graphData['xAxis']['minRange'] = 20;

			$graphData['tooltip']['shared'] = true;
			$sim_obj = Simulation::where('sim_name','=',$sim_name)->first();
			$envi = Environment::where('configuration_id','=',$sim_obj->configuration_id)->first();
			$amountData = $envi->time_limit / $envi->network_interval;
				// optional
				if($amountData  > 600) {
					$graphData['xAxis']['max'] = 600;
				}
			for ($i = 0 ; $i < count($dirs) ; $i++) {

				
				$handle = fopen($dir_output_to_file.'/'.$dirs[$i], "r");
				
				if ($handle) {
					
					$graphData['series'][$i]['name'] = $dirs[$i];
					
					$index = 1;
				    while (($line = fgets($handle)) !== false) {
				    			
				    				if ($i==0) {
				    					$graphData['xAxis']['categories'][] = $index * $envi->network_interval;
				    				}
				    				
				    				$graphData['series'][$i]['data'][] = floatval($line);
				    			
				    			
				    		
				    		$index++;
				    }
				    // part of min max avg sd of each round for bar graph.
				    
				    
				    $barData['sim_round_name'][] = $dirs[$i]; 
				    $barData['max'][] = max($graphData['series'][$i]['data']);
				    $barData['min'][] = min($graphData['series'][$i]['data']);
				    $barData['avg'][] = array_sum($graphData['series'][$i]['data']) / count($graphData['series'][$i]['data']);
				    $barData['sd'][] = $this->stats_standard_deviation($graphData['series'][$i]['data']);				
				    


				    
				    fclose($handle);
				} else {
				    // error opening the file.
				} 
			}

			

			$all_round = array();

			$all_round['max'] = array_sum($barData['max']) / count($barData['sim_round_name']);
			$all_round['min'] = array_sum($barData['min']) / count($barData['sim_round_name']);
			$all_round['avg'] = array_sum($barData['avg']) / count($barData['sim_round_name']);
			$all_round['sd'] = array_sum($barData['sd']) / count($barData['sim_round_name']);

			$barData['sim_round_name'][] = 'All round';
			$barData['max'][] = $all_round['max'];
			$barData['min'][] = $all_round['min']; 
			$barData['avg'][] = $all_round['avg'];
			$barData['sd'][] = $all_round['sd'];

			$data['compare'] = true;
			$barData['renderTo'] = 'graph--bar';
			$data['graphData']['bar'] = $barData;
			$data['graphData']['chart'] = $graphData;
		}

		else if ($rs_type == "priority") {
			
			$data['graphData']['priority'] = $this->graphByPriority($sim_name);

		} else if($rs_type == "down-time") {
			$data['graphData']['downtime'] = $this->graphByDownTime($sim_name); 
		} else if($rs_type == "down-time-round") {
			$data['graphData']['downtime_round'] = $this->graphByDownTimeRound($sim_name); 
		} else if ($rs_type == "migration-time") {
			$data['graphData']['migrationtime'] = $this->graphByMigrationTime($sim_name); 
		}  else if ($rs_type == "migration-time-round") {
			$data['graphData']['migrationtime_round'] = $this->graphByMigrationTimeRound($sim_name); 
		} else if ($rs_type == "violation") {
			$data['graphData']['violation'] = $this->graphByViolation($sim_name); 
		} else if ($rs_type == "violation-all") {
			$data['graphData']['violationall'] = $this->graphByViolationAll($sim_name); 
		}

		// take name and show detail of file name
		$file = file_get_contents($dir_output_to_file.'/'.$dirs['0'], FILE_USE_INCLUDE_PATH);
		$file = '<pre>'. $file .'</pre>';
		$data['content_default'] = $file;
		
		$data['f_names'] = $dirs;
		$data['success'] = true;
		return Response::json($data);
	}

	public function ajaxSimName() {
		$data = array();
		$data['success'] = true;
		return Response::json($data);
	}

	public function ajaxSimRound() {
		$data = array();
		$sim_name = Input::get('sim_name');
		$rs_type = Input::get('rs_type');
		$round_name = Input::get('round_name');
		$dir_output_base = 'run_simulation/output/';
		$dir_log = '/logfile';
		$dir_net = '/network';
		$dir_result = "/result";
		if($rs_type=='log') {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_log;
		} else if ($rs_type=='net' || $rs_type=='compar-net') {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_net;
		}  else if ($rs_type=='priority'||$rs_type=='violation' || $rs_type=='down-time-round'||$rs_type=='migration-time-round') {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_result;
		}

		// read by line and graph
		if ($rs_type == 'net') {
			$graphData = array();
			$details = array();

			$details['head_title'] = 'Network bandwidth each interval in second.';
			$details['sub_title'] = $round_name;
			$details['y_title'] = 'Bandwidth (Mbps)';
			

			$graphData = $this->initGraph($details);
			$graphData['legend']['enabled'] = false;
			

			$graphData['chart']['zoomType'] = 'x';
			$graphData['chart']['renderTo'] = 'graph_container';
			$graphData['chart']['type'] = 'line';
		
			//$graphData['xAxis']['minTickInterval'] = 10;
			$graphData['scrollbar']['enabled'] = true;
			$graphData['xAxis']['minRange'] = 20;

			$sim_obj = Simulation::where('sim_name','=',$sim_name)->first();
			$envi = Environment::where('configuration_id','=',$sim_obj->configuration_id)->first();
			$amountData = $envi->time_limit / $envi->network_interval;
				// optional
				if($amountData  > 600) {
					$graphData['xAxis']['max'] = 600;
				}
			$handle = fopen($dir_output_to_file.'/'.$round_name, "r");
			
			if ($handle) {
				$graphData['series'][0]['name'] = $round_name;
				$index = 1;
			    while (($line = fgets($handle)) !== false) {
			    			$graphData['xAxis']['categories'][] = $index * $envi->network_interval;
				    		$graphData['series'][0]['data'][] = floatval($line);
			    		$index++;
			    }
			    $data['graphData']['chart'] = $graphData;
			    fclose($handle);
			} else {
			    // error opening the file.
			} 
		} else if ($rs_type == 'priority') {

			$data['graphData']['priority'] = $this->graphByPriority($sim_name,$round_name);
		} else if ($rs_type == 'priority_compare') {
			$data['graphData']['priority']['compare'] = $this->graphByPriorityCompare($sim_name);
		} else if ($rs_type == 'down-time-round') {
			$data['graphData']['downtime_round'] = $this->graphByDownTimeRound($sim_name,$round_name);
		} else if ($rs_type == 'migration-time-round') {
			$data['graphData']['migrationtime_round'] = $this->graphByMigrationTimeRound($sim_name,$round_name);
		} else if($rs_type == 'violation') {
			$data['graphData']['violation'] = $this->graphByViolation($sim_name,$round_name);
		}



		
		

		$file = file_get_contents($dir_output_to_file.'/'.$round_name, FILE_USE_INCLUDE_PATH);
		$file = '<pre>'. $file .'</pre>';
		$data['content_default'] = $file;
		
		$data['success'] = true;
		return Response::json($data);
	}


	public function initGraph($details)
	{
			$graphData = array();

			$graphData['title']['text'] = $details['head_title'];
			$graphData['title']['x'] = -20;

			$graphData['subtitle']['text'] = $details['sub_title'];
			$graphData['subtitle']['x']	  = -20;

			$graphData['yAxis']['title']['text'] = $details['y_title'];
			$graphData['yAxis']['plotLines'][]['value'] = 0;
			$graphData['yAxis']['plotLines'][]['width'] = 1;
			$graphData['yAxis']['plotLines'][]['color'] = '#808080';
			
			$graphData['tooltip']['valueSuffix'] = 'Mbps';
			$graphData['legend']['layout'] = 'vertical';
			$graphData['legend']['align'] = 'right';
			$graphData['legend']['verticalAlign'] = 'middle';
			$graphData['legend']['borderWidth'] = 0;

			
			

		return $graphData;
	}

	public function stats_standard_deviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$n;
        }
        return sqrt($carry / $n);
    }

    public function graphByPriority($sim_name = null ,$round_name = null) {


    	$grapPriority = array();
    	
    	$pathToRsDir = "run_simulation/output/".$sim_name."/result/";
    	$rsFiles = $this->scanDirectory($pathToRsDir);
    	if($round_name != null){
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$round_name;
    	} else {
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$rsFiles[0]; 
    	} 
    	
    	$jsonData = json_decode(file_get_contents($pathToFile,FILE_USE_INCLUDE_PATH),true);

    	$total_vm_migrated[] = $jsonData['overall']['totalMigratedPriority']['priority1']['total'];
    	$total_vm_migrated[] = $jsonData['overall']['totalMigratedPriority']['priority2']['total'];
    	$total_vm_migrated[] = $jsonData['overall']['totalMigratedPriority']['priority3']['total'];

    	



    	$migrated_incomple[] = $jsonData['overall']['totalMigratedPriority']['priority1']['total'] - $jsonData['overall']['totalMigratedPriority']['priority1']['migrated'];
    	$migrated_comple[] = $jsonData['overall']['totalMigratedPriority']['priority1']['migrated'];
    	$migrated_incomple[] = $jsonData['overall']['totalMigratedPriority']['priority2']['total'] - $jsonData['overall']['totalMigratedPriority']['priority2']['migrated'];
    	$migrated_comple[] = $jsonData['overall']['totalMigratedPriority']['priority2']['migrated'];
    	$migrated_incomple[] = $jsonData['overall']['totalMigratedPriority']['priority3']['total'] - $jsonData['overall']['totalMigratedPriority']['priority3']['migrated'];
    	$migrated_comple[] = $jsonData['overall']['totalMigratedPriority']['priority3']['migrated'];
    	
    	// check total 0
    	if($migrated_incomple[0] != 0) {
    		$grapPriority['incomplete'][0] = $migrated_incomple[0];
    	} else {
    		$grapPriority['incomplete'][0] = null;
    	} 

    	if($migrated_incomple[1] != 0) {
    		$grapPriority['incomplete'][1] = $migrated_incomple[1];
    	} else {
    		$grapPriority['incomplete'][1] = null;
    	}

    	if($migrated_incomple[2] != 0) {
    		$grapPriority['incomplete'][2] = $migrated_incomple[2];
    	} else {
    		$grapPriority['incomplete'][2] = null;
    	}

    	if($migrated_comple[0] != 0) {
    		$grapPriority['complete'][0] = $migrated_comple[0];
    	} else {
    		$grapPriority['complete'][0] = null;
    	}

    	if($migrated_comple[1] != 0) {
    		$grapPriority['complete'][1] = $migrated_comple[1];
    	} else {
    		$grapPriority['complete'][1] = null;
    	}

    	if($migrated_comple[2] != 0) {
    		$grapPriority['complete'][2] = $migrated_comple[2];
    	} else {
    		$grapPriority['complete'][2] = null;
    	}
    	/*
    	$grapPriority['complete'][0] =  $migrated_comple[0];
    	$grapPriority['incomplete'][1] = $migrated_incomple[1];
    	$grapPriority['complete'][1] =  $migrated_comple[1];
    	$grapPriority['incomplete'][2] = $migrated_incomple[2];
    	$grapPriority['complete'][2] =  $migrated_comple[2];*/
    	$grapPriority['renderTo'] = 'graph_container';

    		
    	
    	



    	return $grapPriority;

    }

    public function graphByPriorityCompare($sim_name) {
   		$compare = array();

   		$pathToRsDir = "run_simulation/output/".$sim_name."/result/";
   		$rsFiles = $this->scanDirectory($pathToRsDir);
   		
    }

    public function graphByDownTime($sim_name = null ,$round_name = null) {
   		
   		$graphDownTime = array();
    	
    	$pathToRsDir = "run_simulation/output/".$sim_name."/result/";
    	$rsFiles = $this->scanDirectory($pathToRsDir);

    	for ($i=0; $i < count($rsFiles); $i++) { 
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$rsFiles[$i];
    		$jsonData = json_decode(file_get_contents($pathToFile,FILE_USE_INCLUDE_PATH),true);
    		$graphDownTime['name'][] = $rsFiles[$i];
	    	$graphDownTime['average'][] = $jsonData['overall']['downtime']['average'];
	    	$graphDownTime['total'][] = $jsonData['overall']['downtime']['total'];
    	}
    	$graphDownTime['title'] = 'VMs Down time in second ';
    	$graphDownTime['name'][] = 'All round';
    	$graphDownTime['average'][] = array_sum($graphDownTime['average']) / count($graphDownTime['average']);
    	$graphDownTime['total'][] = array_sum($graphDownTime['total']) / count($graphDownTime['total']);
    	$graphDownTime['renderTo'] = 'graph--bar';
    	return $graphDownTime;
   		
   		
    }

    public function graphByDownTimeRound($sim_name = null ,$round_name = null) {
   		
   		$graphDownTime = array();
    	
    	$pathToRsDir = "run_simulation/output/".$sim_name."/result/";
    	$rsFiles = $this->scanDirectory($pathToRsDir);

    	if($round_name!=null){
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$round_name;
    		$graphDownTime['name'][] = $round_name;
    	} else {
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$rsFiles[0];
    		
    		$graphDownTime['name'][] = $rsFiles[0];
    	}
    	$jsonData = json_decode(file_get_contents($pathToFile,FILE_USE_INCLUDE_PATH),true);
    	$vmList = array();
    	$index = 0;
	    foreach ($jsonData['migratedVm'] as $vmId => $value) {
	    		$graphDownTime['data'][$index]['y'] = $value['downtime'];
	    		$graphDownTime['data'][$index]['vmId'] = $vmId;
	    		$vmList['number'][] = $index+1;
	    		$index++;
	    }
	    
	  
	  
	    $graphDownTime['number'] = $vmList['number'];
	    $graphDownTime['total'][] = $jsonData['overall']['downtime']['total'];
    	

    	$graphDownTime['renderTo'] = 'graph_container';
    	return $graphDownTime;
   		
   		
    }

    public function graphByMigrationTime($sim_name = null ,$round_name = null) {
   		
   		$graphMigrationTime = array();
    	
    	$pathToRsDir = "run_simulation/output/".$sim_name."/result/";
    	$rsFiles = $this->scanDirectory($pathToRsDir);

    	for ($i=0; $i < count($rsFiles); $i++) { 
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$rsFiles[$i];
    		$jsonData = json_decode(file_get_contents($pathToFile,FILE_USE_INCLUDE_PATH),true);
    		$graphMigrationTime['name'][] = $rsFiles[$i];
	    	$graphMigrationTime['average'][] = $jsonData['overall']['migrationTime']['average'];
	    	$graphMigrationTime['total'][] = $jsonData['overall']['migrationTime']['total'];
    	}
    	$graphMigrationTime['title'] = 'VMs Migration time in second ';
    	$graphMigrationTime['name'][] = 'All round';
    	$graphMigrationTime['average'][] = array_sum($graphMigrationTime['average']) / count($graphMigrationTime['average']);
    	$graphMigrationTime['total'][] = array_sum($graphMigrationTime['total']) / count($graphMigrationTime['total']);
    	$graphMigrationTime['renderTo'] = 'graph--bar';
    	return $graphMigrationTime;
   		
   		
    }

     public function graphByMigrationTimeRound($sim_name = null ,$round_name = null) {
   		
   		$graphMigrationTime = array();
    	
    	$pathToRsDir = "run_simulation/output/".$sim_name."/result/";
    	$rsFiles = $this->scanDirectory($pathToRsDir);

    	if($round_name!=null){
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$round_name;
    		$graphMigrationTime['name'][] = $round_name;
    	} else {
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$rsFiles[0];
    		$graphMigrationTime['name'][] = $rsFiles[0];
    	}
    	
    	$jsonData = json_decode(file_get_contents($pathToFile,FILE_USE_INCLUDE_PATH),true);
    
	    $graphMigrationTime['average'][] = $jsonData['overall']['migrationTime']['average'];
	    $graphMigrationTime['total'][] = $jsonData['overall']['migrationTime']['total'];
    	
    	//$graphMigrationTime['title'] = 'VMs Migration time in second ';
	    $vmList = array();
    	$index = 0;
	    foreach ($jsonData['migratedVm'] as $vmId => $value) {
	    		$graphMigrationTime['data'][$index]['y'] = $value['migrationTime'];
	    		$graphMigrationTime['data'][$index]['vmId'] = $vmId;
	    		$vmList['number'][] = $index+1;
	    		$index++;
	    }
    	$graphMigrationTime['number'] = $vmList['number'];
    	$graphMigrationTime['renderTo'] = 'graph_container';
    	return $graphMigrationTime;
   		
   		
    }

    public function graphByViolation($sim_name = null ,$round_name = null) {
   		
   		$graphViolation = array();
    	
    	$pathToRsDir = "run_simulation/output/".$sim_name."/result/";
    	$rsFiles = $this->scanDirectory($pathToRsDir);

    	if($round_name!=null){
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$round_name;
    		$graphViolation['name'] = $round_name;
    	} else {
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$rsFiles[0];
    		$graphViolation['name'] = $rsFiles[0];
    	}
    	
    	$jsonData = json_decode(file_get_contents($pathToFile,FILE_USE_INCLUDE_PATH),true);

    	
	    $graphViolation['nonviolated'] = $jsonData['overall']['totalMigrated'] - $jsonData['overall']['totalViolated'];
	    $graphViolation['violated'] = $jsonData['overall']['totalViolated'];
	    $graphViolation['total'] = $jsonData['overall']['totalMigrated'];
    	//$graphViolation['renderTo'] = 'graph--bar';
    	
    	

    	return $graphViolation;
   		
   		
    }

    public function graphByViolationAll($sim_name = null ,$round_name = null) {
    	$graphViolation = array();
    	
    	$pathToRsDir = "run_simulation/output/".$sim_name."/result/";
    	$rsFiles = $this->scanDirectory($pathToRsDir);

    	for ($i=0; $i < count($rsFiles); $i++) { 
    		$pathToFile = "run_simulation/output/".$sim_name."/result/".$rsFiles[$i];
    		$jsonData = json_decode(file_get_contents($pathToFile,FILE_USE_INCLUDE_PATH),true);
    		$graphViolation['name'][] = $rsFiles[$i];
	    	$graphViolation['nonviolated'][] = $jsonData['overall']['totalMigrated'] - $jsonData['overall']['totalViolated'];
	    	$graphViolation['violated'][] = $jsonData['overall']['totalViolated'];
	    	$graphViolation['total'][] = $jsonData['overall']['totalMigrated'];
    	}
    	$graphViolation['title'] = 'VMs Migration time in second ';
    	$graphViolation['name'][] = 'All round';
    	$graphViolation['nonviolated'][] = array_sum($graphViolation['nonviolated']) / count($graphViolation['nonviolated']);
    	$graphViolation['violated'][] = array_sum($graphViolation['violated']) / count($graphViolation['violated']);
    	$graphViolation['total'][] = array_sum($graphViolation['total']) / count($graphViolation['total']);
    	$graphViolation['renderTo'] = 'graph--bar';
    	return $graphViolation;
    }
    public function scanDirectory ($path) {

    	$scanned_directory = scandir($path);
		
		$dirs = array();
		$index = 0;
		for ($i=0; $i < count($scanned_directory) ; $i++) { 
			if($i!=0 && $i!=1) {
				$dirs[$index] = $scanned_directory[$i];
				$index++;
			}
			
		}
		return $dirs;

    }

	public function ajaxSimNetCompar ()
	{

	} 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

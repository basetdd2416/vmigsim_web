<?php

class SimResultController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$directory = 'run_simulation/output/';
		$scanned_directory = array_diff(scandir($directory), array('..', '.'));
		$dirs = array();
		$index = 0;
		for ($i=2; $i < count($scanned_directory)+2 ; $i++) { 

			$dirs[$index] = $scanned_directory[$i];
			$index++;
		}
		return View::make('sim_result.index')->with('sim_name_list',$dirs);
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
		if($rs_type!='log') {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_net;
		} else {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_log;
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
			$graphData['chart']['renderTo'] = 'graph_container';
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
			$data['graphData']['bar'] = $barData;
			$data['graphData']['chart'] = $graphData;
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
		


		if($rs_type!='log') {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_net;
		} else {
			$dir_output_to_file = $dir_output_base.$sim_name.$dir_log;
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

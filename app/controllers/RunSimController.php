<?php

class RunSimController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$config_select = array('0'=>'Please select configuration name');
		$configs = Configuration::orderBy('created_at', 'desc')->get();
		/*foreach ($configs as $c) {
			$config_select[$c->id] = $c->config_name; 
		}*/
		//var_dump($config_select);
		return View::make('runsim.index')->with('configs',$configs);
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

		public function ajaxConfig()
	{
		$data = array();
		$config_id = Input::get('config_id');
		$envi = Environment::where('configuration_id','=',$config_id)->first();
		if($envi->network_type=="static") {
			$envi->network_type = "Stable";
		}
		if(!Input::get('create_exist')) {


			if($envi->schedule_type == 'priority') {
				$envi->schedule_type = 'Priority based';
			}else {
				$envi->schedule_type = 'FIFO';
			}
			if($envi->migration_type == 'offline') {
				$envi->migration_type = 'Offline';
			}else {
				$envi->migration_type = 'Pre-copy';
			}
			if($envi->control_type == 'openloop') {
				$envi->control_type = 'Open loop';
			}else {
				$envi->control_type = 'Close loop';
			}
		}
		$data['envi'] = $envi;
		$data['vms'] = Vm::where('configuration_id','=',$config_id)->get();
		$data['message'] = true;
		return Response::json($data);

	}
		public function ajaxSaveSimulation()
	{
		$data = array();

		$validator = Validator::make(
			
			array(
				"sim_name" => Input::get('simulation_name'),
				"config_name" => Input::get('config_name'),
				"round" => Input::get('round')

			), 

			array(
				"sim_name" => 'required|unique:simulations',
				"config_name" => 'required',
				"round" => 'required'

			));

		if(!$validator->fails()) {
			$sim = new Simulation;
			$sim->sim_name = Input::get('simulation_name');
			$sim->configuration_id = Input::get('config_name');
			$sim->round = Input::get('round');
			if($sim->save()){
				// get json
				
				$config_input_file = array();
				$envi = array();
				$vms = array();
				$envi_db = Environment::where("configuration_id","=",Input::get('config_name'))->first();
				$vms_db = Vm::where("configuration_id","=",Input::get('config_name'))->get();

				$envi['maxBandwidth'] = $envi_db->bandwidth;
				$envi['meanBandwidth'] = $envi_db->network_mean;
				$envi['timeLimit'] = $envi_db->time_limit;
				$envi['scheduleType'] = $envi_db->schedule_type;
				$envi['migrationType'] = $envi_db->migration_type;
				$envi['controlType'] = $envi_db->control_type;
				$envi['networkType'] = $envi_db->network_type;
				$envi['pageSize'] = $envi_db->page_size; // fix name
				$envi['wwsRatio'] = $envi_db->wws_ratio;
				$envi['wwsDirtyRate'] = $envi_db->wws_dirty_rate;
				$envi['normalDirtyRate'] = $envi_db->normal_dirty_rate;
				$envi['maxPreCopyRound' ] = $envi_db->max_precopy_round;
				$envi['minDirtyPage' ] = $envi_db->min_dirty_page;
				$envi['maxNoProgressRound' ] =$envi_db->max_no_progress_round;
				$envi['networkInterval' ] = $envi_db->network_interval;
				$envi['networkSD' ] = $envi_db->network_sd;

				for ($i=0; $i < count($vms_db) ; $i++) { 
					$vms[$i]['vmAmount'] = $vms_db[$i]['amount'];
					$vms[$i]['ram'] = $vms_db[$i]['ram'];
					$vms[$i]['qos'] = $vms_db[$i]['qos'];
					$vms[$i]['priority'] = $vms_db[$i]['priority'];
				}


				$config_input_file['environment'] = $envi;
				$config_input_file['vmSpecList'] = $vms;
				$configname = Configuration::find(Input::get('config_name'))->config_name.'.json';
				$dirname = $sim->sim_name;
				$filename = 'run_simulation\\input\\' . $dirname . '\\';
				$fullpathtofile = $filename.$configname;
				$outputPath = 'run_simulation\\output\\' . $dirname;
				
				if(!file_exists($filename)){
					mkdir($filename, 0777);
				}

				$fp = fopen($fullpathtofile, 'w');
 				fwrite($fp, json_encode($config_input_file,JSON_PRETTY_PRINT));
 				fclose($fp);

 				//$this->execInBackground('java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . '1');
 				//$objDateTime = new DateTime('NOW')

			
				ini_set('max_execution_time', 300);
 				exec('java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . $sim->round,$output, $return);
 				
 				//pclose(popen('start /B java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . $sim->round.' 2>nul >nul', "r")); 
 				if (!$return) {
 				//var_dump( shell_exec('java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . '1 2>&1'));
 				//$PID = shell_exec('nohup java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . '1' . ' ' . '> /dev/null 2> /dev/null & echo $!');
 				//var_dump($PID);
 				Session::flash('success_msg', 'Run simulation completed.');
				$data['redirect'] = 'simulation_result';
				$data['success'] = true;

				return Response::json($data);
				}
			} else {
				$data['success'] = false;
				$data['errors'] = 'insert fails';
				return Response::json($data);
			}
				
			
		} else {
			$data['success'] = false;
			$data['errors'] = $validator->errors()->toArray();
			return Response::json($data);
		}
		

	}
	public function execInBackground($cmd) { 
    if (substr(php_uname(), 0, 7) == "Windows"){ 
        pclose(popen("start /B ". $cmd, "r"));  
    } 
    else { 
        exec($cmd . " > /dev/null &");   
    } 
}

public function get_time_difference($time1, $time2) 
{ 
    $time1 = strtotime("1/1/1980 $time1"); 
    $time2 = strtotime("1/1/1980 $time2"); 
     
    if ($time2 < $time1) 
    { 
        $time2 = $time2 + 86400; 
    } 
     
    return ($time2 - $time1) / 3600; 
     
}  

}

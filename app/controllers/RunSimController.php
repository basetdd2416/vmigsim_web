<?php
date_default_timezone_set("Asia/Bangkok"); 
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
		$sim_list = Simulation::orderBy('id','desc')->paginate(5);
		/*foreach ($configs as $c) {
			$config_select[$c->id] = $c->config_name; 
		}*/
		//var_dump($config_select);
		return View::make('runsim.index')->with('configs',$configs)->with('sim_list',$sim_list);
	}

	public function ajaxSimList()
	{
		//$config_select = array('0'=>'Please select configuration name');
		$configs = Configuration::orderBy('created_at', 'desc')->get();
		$sim_list = Simulation::orderBy('id','desc')->paginate(5);
		/*foreach ($configs as $c) {
			$config_select[$c->id] = $c->config_name; 
		}*/
		//var_dump($config_select);
		return View::make('runsim.simlist')->with('configs',$configs)->with('sim_list',$sim_list)->render();
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
			$sim->status = 'running';
			if($sim->save()){
				// get json
				
				$config_input_file = array();
				$envi = array();
				$vms = array();
				$envi_db = Environment::where("configuration_id","=",$sim->configuration_id)->first();
				$vms_db = Vm::where("configuration_id","=",$sim->configuration_id)->get();

				$envi['maxBandwidth'] = $envi_db->bandwidth;
				$envi['meanBandwidth'] = $envi_db->network_mean;
				$envi['timeLimit'] = $envi_db->time_limit;
				$envi['scheduleType'] = $envi_db->schedule_type;
				$envi['migrationType'] = $envi_db->migration_type;
				$envi['controlType'] = $envi_db->control_type;
				$envi['networkType'] = $envi_db->network_type;
				//$envi['pageSize'] = $envi_db->page_size; // fix name
				$envi['wwsPercentage'] = $envi_db->wws_ratio;
				$envi['wwsDirtyRate'] = $envi_db->wws_dirty_rate;
				$envi['normalDirtyRate'] = $envi_db->normal_dirty_rate;
				$envi['maxPreCopyRound' ] = $envi_db->max_precopy_round;
				$envi['minDirtyPage' ] = $envi_db->min_dirty_page;
				$envi['maxNoProgressRound' ] =$envi_db->max_no_progress_round;
				$envi['networkInterval' ] = $envi_db->network_interval;
				$envi['networkSD' ] = $envi_db->network_sd;
				// save to trace
				$quick = new QuickSimController;
				if($envi_db->is_record_trace == $quick->RECORD_STATUS) {
					$envi['isRecordedTrace' ] = true;
				} else {
					$envi['isRecordedTrace' ] = false;
				}
				
				$fileType = ".txt"; 
				$pathToFiles = 'run_simulation/record-trace/'. $envi_db->record_trace_file . $fileType;
				$envi['traceFile' ] = realpath($pathToFiles);
				$envi['threadNum' ] = $envi_db->thread_num;
				/*
				$typeMigration = Input::get('rs_type');
				$fileName = Input::get('record_name');
				$PSUDO_STATUS = 1;
				$RECORD_STATUS = 2;
				$fileType = ".txt"; 
				$pathToFiles = 'run_simulation/record-trace/'. $fileName . $fileType;*/
				//$pathToFiles = 'run_simulation' . DIRECTORY_SEPARATOR .'record-trace' . DIRECTORY_SEPARATOR . $fileName . $fileType;
				/*if($typeMigration == $RECORD_STATUS) {
					
					$splitFileName = explode("-",$fileName);
					$THREAD_NUM_POS = 2;
					$threadNum = $splitFileName[$THREAD_NUM_POS];	
					$envi['isRecordedTrace'] = true;
					$envi['traceFile'] = realpath($pathToFiles);
					$envi['threadNum'] = $threadNum;

				} else {
					$envi['traceFile'] = null;
					$envi['isRecordedTrace'] = false;

				}*/

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
				$filename = 'run_simulation/input/' . $dirname . '/';
				$fullpathtofile = $filename.$configname;
				$outputPath = 'run_simulation/output/' . $dirname;
				
				if(!file_exists($filename)){
					mkdir($filename, 0777);
				}

				

				$fp = fopen($fullpathtofile, 'w');
 				fwrite($fp, json_encode($config_input_file,JSON_PRETTY_PRINT));
 				fclose($fp);
 				$data['simId'] = $sim->id;
 				$data['inputPathToFile'] = $fullpathtofile;
 				$data['outputPath'] = $outputPath;
 				$data['round'] = $sim->round;
 				$data['success'] = true;

 				return Response::json($data);
 				//$this->execInBackground('java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . '1');
 				//$objDateTime = new DateTime('NOW')

			
				
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

	public function saveOutputTodb() {

	}

	public function runSimEngine() {
		ini_set("display_errors", 1);
		ini_set("track_errors", 1);
		ini_set("html_errors", 1);
		error_reporting(E_ALL);
		//putenv("PATH=/usr/lib/jvm/java-8-oracle/bin/");
		$data = array();
		$simId = Input::get('simId');
		$fullpathtofile = Input::get('inputPathToFile');
		$outputPath = Input::get('outputPath');
		$round = Input::get('round');
		$sim = Simulation::find(Input::get('simId'));
		ini_set('max_execution_time', 300);
 		
 		$startedTime = date('Y-m-d G:i:s');
 		$sim->started = $startedTime;
 		//$sim->save();
 		ob_start();
 		
 		//passthru('/opt/bitnami/apps/laravel/public/java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . $round);
 		//passthru('java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . $round);
		//exec('java -version 2>&1', $output);
		//exec('which java 2>&1', $output);
		exec('java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . $round . ' ' . '2>&1',$output);
		//exec('java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . $round. ' ' . '100000' . ' ' . '2>&1',$output);
		//print_r($output);
		//var_dump($output);
		$var = ob_get_contents();
		$data['response'] = $output;
		$finishedTime = date('Y-m-d G:i:s');
		
		
		$sim->status = 'success';
		$sim->started = $startedTime;
		$sim->finished = $finishedTime;
 		if($sim->save()){
 			//$this->saveOutputTodb();
 			//pclose(popen('start /B java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . $sim->round.' 2>nul >nul', "r")); 
	 		
		 		//var_dump( shell_exec('java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . '1 2>&1'));
		 		//$PID = shell_exec('nohup java -jar vmigsim.jar'. ' ' . $fullpathtofile . ' ' . $outputPath . ' ' . '1' . ' ' . '> /dev/null 2> /dev/null & echo $!');
		 		//var_dump($PID);
		 		Session::flash('success_msg', 'Run simulation completed.');
				$data['redirect'] = 'simulation_result';
				$data['success'] = true;

				return Response::json($data);
			
		} else {
			$data['success'] = false;
			$data['errors'] = 'insert fails';
			return Response::json($data);
		}
	}

	public function checkStatus() {
		$data = array();
		$data['isSimRun'] = false;
		$sim_id = Input::get('id');
		$sim_list = Simulation::where('status','=','running')->get();
		if(count($sim_list) > 0 ) {
			$data['isSimRun'] = true;
		}
		/*$all_sim = Simulation::orderBy('id','desc')->get();
		$all_sim = Simulation::find($sim_id);
		$data['redirect'] = 'simulation_result';
		$data['all_sim'] = $all_sim;*/
		$configs = Configuration::orderBy('created_at', 'desc')->get();
		$sim_list = Simulation::orderBy('id','desc')->paginate(5);
		/*foreach ($configs as $c) {
			$config_select[$c->id] = $c->config_name; 
		}*/
		//var_dump($config_select);
		$data['render'] = View::make('runsim.simlist')->with('configs',$configs)->with('sim_list',$sim_list)->render();
		return Response::json($data);
	}

	public function querySimDetail() {
		$data = array();
		$simId = Input::get('id');

		// found id
		if($simId != null) {
			$sim = Simulation::find($simId);
			$configId = $sim->configuration_id;
			$config = $sim->configuration;
			$envi = Environment::where('configuration_id','=',$configId)->first();
			$vms = Vm::where('configuration_id','=',$configId)->get();
		
			$data['sim'] = $sim;
			$data['config'] = $config;
			$data['envi'] = $envi;
			$data['vms'] = $vms;

 			$data['success'] = true;
			return Response::json($data);
		}
		// no id found
		$data['success'] = falase;
		return Response::json($data);
		
		
	}



}

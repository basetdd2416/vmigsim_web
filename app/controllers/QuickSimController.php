<?php

class QuickSimController extends \BaseController {
	public $config_name;
	public $amount;
	public $ram;
	public $qos;
	public $priority;
	public $environment;
	public $migration_alg;
	public $scheduling_alg;
	public $network_alg;
	public $control_alg;
	public $limit_time;
	public $network_bandwidth;
	public $page_dirty;
	public $network_interval;
	public $network_sd;
	public $wwws_ratio;
	public $wws_dirty_rate;
	public $normal_dirty_rate;
	public $max_pre_copy_rate;
	public $min_dirty_page;
	public $max_no_prog_round;
	public $simulation_name;
	public $sim_round;
	public $vmList;
	public $network_mean;
	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('quicksim.index');
	}

	public function import()
	{
		return View::make('quicksim.import');
	}

	public function createConfig()
	{	

		return View::make('quicksim.create_configuration');
	}

	public function execInBackground($cmd) { 
    if (substr(php_uname(), 0, 7) == "Windows"){ 
        pclose(popen("start /B ". $cmd, "r"));  
    } 
    else { 
        exec($cmd . " > /dev/null &");   
    } 
} 

	
	public function saveConfig()
	{
		$config_data = array(
				'name' => Input::get('name')
			);
		$config_rules = array(
				'name' => 'required|unique:configurations'
			);
		$validator = Validator::make($config_data, $config_rules);

		 if($validator->fails()){
		 	$data = array('message'=>'errors');
		 	return Response::json( $data );
		 }

		 $data = array();
		 $data['message'] = 'ok';
		 $data['configs'] = Configuration::all(); 
		 return Response::json( $data );
		


		/*
		$rules = array(
            'name'       => 'required'
        );
		
		 $validator = Validator::make(Input::all(), $rules);
		 if($validator->fails()) 
		 {
		 	return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('name'));
		 }
		 $data = array('name'=>Input::get('name'));
		 Session::flash('data', $data);
		 */
		/*
		$config_rules = array(
				'name' => 'required|unique:configurations'
			);

		$config_data = array(
				'name' => Input::get('name')
			);

		$validator = Validator::make($config_data, $config_rules);

		if( $validator->fails()){
			return 'it config failed';
		}

		$config_create = Configuration::create($config_data);
		
		if($config_create){
			return 'create complete';
		}
		*/
		
/*
		$envi_data = array(
			'bandwidth' => 64,
			'timeLimit' => 21600,
			'scheduleType' => 'priority',
			'migrationType' => 'precopy',
			'controlType' => 'openloop',
			'networkType' => 'dynamic',
			'pageSize' => 4,

			'wwsRatio' => 1,
			'wwsDirtyRate' => 90,
			'normalDirtyRate' => 20,
			'maxPreCopyRound' => 30,
			'minDirtyPage' => 50,
			'maxNoProgressRound' => 2,

			'networkInterval' => 1,
			'networkSD' => 54.8222
		);

		$vm_data = array(
			array(
				'vmAmount' => 200,
				'ram' => 512,
				'priority' => 1,
				'qos' => 300
			),
			array(
				'vmAmount' => 200,
				'ram' => 512,
				'priority' => 2,
				'qos' => 2700
			),
			array(
				'vmAmount' => 200,
				'ram' => 512,
				'priority' => 3,
				'qos' => 32400
			)
		);

		$dataJson = array(
			'environment' => $envi_data,
			'vmSpecList' => $vm_data
		);

		var_dump(json_encode($dataJson,JSON_PRETTY_PRINT));
		$round = 5;

		$configname = 'configA'.'.json';
		$dirname = 'simA';
		$filename = "run_simulation/input/" . $dirname . "/";
		$fullpathtofile = $filename.$configname;
		$outputPath = 'run_simulation/output/' . $dirname . "/";
		if(!file_exists($filename)){
			mkdir($filename, 0777);
		}

		$fp = fopen($filename.$configname, 'w');
 		fwrite($fp, json_encode($dataJson,JSON_PRETTY_PRINT));
 		fclose($fp);
 		//execInBackground('java -jar poa.jar ' . $fullpathtofile . ' ' .$round);
 		//var_dump($this->execInBackground('java -jar test1.jar'));
		//var_dump($this->execInBackground('whoami'));
		//var_dump(exec("start /B vmigsim.jar configA.json run_simulation/temp/text.txt 1 2"));
		//var_dump($this->execInBackground('java -jar vmigsim.jar configA.json text.txt 1'));
		return json_encode(Configuration::all());
		*/

	}

	public function checkVM() {

		$vm_data = array(
				'name' => Input::get('name')
			);
		$vm_rules = array(
				'amount' => 'required',
				'ram' => 'required',
				'priority' => 'required',

			);
		$validator = Validator::make($config_data, $config_rules);

		if($validator->fails()){
		 	$data = array('message'=>'errors');
		 	return Response::json( $data );
		 }




	}
	public function setAllInput() {
		$this->config_name = Input::get('name'); 
		$this->amount = Input::get('amount');
		$this->ram = Input::get('ram');
		$this->priority = Input::get('priority');
		$this->qos = Input::get('qos');
		$this->environment = Input::get('enviname_name');
		$this->scheduling_alg = Input::get('scheduling_algorithm');
		$this->migration_alg = Input::get('migration_algorithm');
		$this->control_alg = Input::get('control_algorithm');
		$this->network_alg = Input::get('network_status');
		if($this->network_alg == "stable") {
			$this->network_alg = "static";
		}
		$this->limit_time = Input::get('limit_time');
		$this->network_bandwidth = Input::get('network_bandwidth');
		$this->network_interval = Input::get('network_interval');
		$this->network_mean = Input::get('network_mean');
		$this->network_sd = Input::get('network_sd');
		$this->page_dirty = Input::get('page_dirty');
		$this->wwws_ratio = Input::get('wwws_ratio');
		$this->wws_dirty_rate = Input::get('wws_dirty_rate');
		$this->normal_dirty_rate = Input::get('normal_dirty_rate');
		$this->max_pre_copy_rate = Input::get('max_pre_copy_rate');
		$this->min_dirty_page = Input::get('min_dirty_page');
		$this->max_no_prog_round = Input::get('max_no_prog_round');
		$this->simulation_name = Input::get('simulation_name');
		$this->sim_round = Input::get('sim_round');

	}
	public function saveAllConfig() {
		
		$data = array();
		
		$this->vmList = Input::get('vmList');
		//var_dump($vmList);
		
		// validate config name
			$config_rules = array(
				'config_name' => 'required|unique:configurations'
			);

		$config_data = array(
				'config_name' => Input::get('name')
			);

		$validator = Validator::make($config_data, $config_rules);

		if( $validator->fails()){
			$data['success'] = false;
			//$data['redirect'] = 'createconfig';
			$data['errors'] = $validator->errors()->toArray();
			

			return Response::json($data);
		}


		$envi_data = array();
		$vms_data = array();
		$all_data = array();
		$this->setAllInput();
		for ($i=0; $i < count($this->vmList); $i++) { 
			$vms_data[$i]['vmAmount'] = (int)$this->vmList[$i]['amount'];
			$vms_data[$i]['ram'] = (int)$this->vmList[$i]['ram'];
			$vms_data[$i]['qos'] = (int)$this->vmList[$i]['qos'];
			$vms_data[$i]['priority'] = (int)$this->vmList[$i]['priority'];
		}
		//return Response::json($vms_data);
		
		

		

		

		$envi_data['bandwidth'] = (double)$this->network_bandwidth;
		$envi_data['timeLimit'] = (double)$this->limit_time;
		$envi_data['scheduleType'] = $this->scheduling_alg;
		$envi_data['migrationType'] = $this->migration_alg;
		$envi_data['controlType'] = $this->control_alg;
		$envi_data['networkType'] = $this->network_alg;
		$envi_data['pageSize'] = (int)$this->page_dirty; // fix name
		$envi_data['wwsRatio'] = (double)$this->wwws_ratio;
		$envi_data['wwsDirtyRate'] = (double)$this->wws_dirty_rate;
		$envi_data['normalDirtyRate'] = (double)$this->normal_dirty_rate;
		$envi_data['maxPreCopyRound' ] = (int)$this->max_pre_copy_rate;
		$envi_data['minDirtyPage' ] = (int)$this->min_dirty_page;
		$envi_data['maxNoProgressRound' ] =(int) $this->max_no_prog_round;
		$envi_data['networkInterval' ] = (double)$this->network_interval;
		$envi_data['networkSD' ] = (float)$this->network_sd;
		$envi_data['networkSD' ] = (float)$this->network_mean;

		// this will be looped
		
		/*
		$vms_data[$i]['amonut'] = $this->amonut;
			$vms_data[$i]['ram'] = $this->ram;
			$vms_data[$i]['qos'] = $this->qos;
			$vms_data[$i]['priority'] = $this->priority;
			$i++;*/

		$all_data['environment'] = $envi_data;
		$all_data['vmSpecList'] = $vms_data;
		

		$configname = $this->config_name.'.json';
		$dirname = $this->simulation_name;
		$filename = "run_simulation/input/" . $dirname . "/";
		$fullpathtofile = $filename.$configname;
		$outputPath = 'run_simulation/output/' . $dirname . "/";
		if(!file_exists($filename)){
			mkdir($filename, 0777);
		}
		$fp = fopen($filename.$configname, 'w');
 		fwrite($fp, json_encode($all_data,JSON_PRETTY_PRINT));
 		fclose($fp);


		$this->saveToDatabase();
		
		$data['redirect'] = '../runsimulation';
		$data['success'] = true;
		//exec("start /B vmigsimOK.jar ". $filename.$configname . ' ' . $outputPath.'rs.txt' .' '. "1");
		Session::flash('success_msg', 'Create configuration success.');
		return Response::json($data);

		//return Response::json($data);
		
	}

	public function saveToDatabase() {
		// config
		$config = new Configuration;
		$config->config_name = $this->config_name;
		if($config->save()) {
			//vm
			for ($i=0; $i < count($this->vmList); $i++) { 
				$vm = new Vm;
				$vm->amount = $this->vmList[$i]['amount'];
				$vm->ram = $this->vmList[$i]['ram'];
				$vm->qos = $this->vmList[$i]['qos'];
				$vm->priority = $this->vmList[$i]['priority'];
				$vm->configuration_id = $config->id;
				$vm->save();
			}
			

			//envi
			$envi = new Environment;
			$envi->name = $this->environment;
			$envi->bandwidth = $this->network_bandwidth;
			$envi->time_limit = $this->limit_time;
			$envi->schedule_type = $this->scheduling_alg;
			$envi->migration_type = $this->migration_alg;
			$envi->control_type = $this->control_alg;
			$envi->network_type = $this->network_alg;
			$envi->page_size = $this->page_dirty;
			$envi->wws_ratio = $this->wwws_ratio;
			$envi->wws_dirty_rate =$this->wws_dirty_rate;
			$envi->normal_dirty_rate =$this->normal_dirty_rate;
			$envi->max_precopy_round = $this->max_pre_copy_rate;
			$envi->min_dirty_page = $this->min_dirty_page;
			$envi->max_no_progress_round = $this->max_no_prog_round;
			$envi->network_interval = $this->network_interval;
			$envi->network_mean = $this->network_mean;
			$envi->network_sd = $this->network_sd;
		
			$envi->configuration_id = $config->id;
			$envi->save();
			// sim 
			/*$sim = new Simulation;
			$sim->name = $this->simulation_name;
			$sim->round = $this->sim_round;
			$sim->configuration_id = $config->id;
			$sim->save();*/
		}
		

	}
 
	public function runSim() {
		return var_dump(Simulation::all());
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createVM()
	{
		
		$data = array('name'=>Input::get('name'));
		
		return View::make('quicksim.create_vm',$data);
	}

	public function createEnvi()
	{
		
		return View::make('quicksim.create_envi');
	}

	public function reportCreate()
	{
		return View::make('quicksim.report_create');
	}

	public function backToConfig()
	{
		return Redirect::to('simulation/quicksim/createconfig')->with_input();
		
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

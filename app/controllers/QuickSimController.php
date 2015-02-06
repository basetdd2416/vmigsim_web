<?php

class QuickSimController extends \BaseController {

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
		var_dump(exec("start /B vmigsim.jar configA.json run_simulation/temp/text.txt 1 2"));
		//var_dump($this->execInBackground('java -jar vmigsim.jar configA.json text.txt 1'));
		
		

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

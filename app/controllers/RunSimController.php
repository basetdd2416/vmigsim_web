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
		$configs = Configuration::all();
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
		$data['envi'] = Environment::where('configuration_id','=',$config_id)->first();
		$data['vms'] = Vm::where('configuration_id','=',$config_id)->get();
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
				$envi = Environment::where("configuration_id","=",Input::get('config_name'))->first();
				$vms = Vm::where("configuration_id","=",Input::get('config_name'))->get();
				$config_input_file['environment'] = $envi;
				$config_input_file['vmSpecList'] = $vms;
				$configname = Configuration::find(Input::get('config_name'))->first()->config_name.'.json';
				$dirname = $sim->sim_name;
				$filename = "run_simulation/input/" . $dirname . "/";
				$fullpathtofile = $filename.$configname;
				$outputPath = 'run_simulation/output/' . $dirname . "/";
			
				if(!file_exists($filename)){
					mkdir($filename, 0777);
				}
				$fp = fopen($fullpathtofile, 'w');
 				fwrite($fp, json_encode($config_input_file,JSON_PRETTY_PRINT));
 				fclose($fp);
 				//$this->execInBackground('java -jar vmigsim.jar configA.json text.txt 1');

				$data['redirect'] = 'simulation_result';
				$data['success'] = true;
			} else {
				$data['success'] = false;
				$data['errors'] = 'insert fails';
			}
				
			return Response::json($data);
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

}

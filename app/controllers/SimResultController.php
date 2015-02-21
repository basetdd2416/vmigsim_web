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
		$sim_name = Input::get('sim_name');
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
		// take name and show detail of file name
		$file = file_get_contents($dir_output_to_file.'/'.$dirs['0'], FILE_USE_INCLUDE_PATH);
		
		$file = '<pre>'. $file .'</pre>';
		 //$file = explode("\n", $file);
		/*$file  = "";
		$handle = fopen($dir_output_to_file.'/'.$dirs['0'], "r");
		if ($handle) {
   			 while (($line = fgets($handle)) !== false) {
        // process the line read
        $file .= $line . '</br>';
   	 	}

    	
} else {
    // error opening the file.
		}
		fclose($handle); */
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





		
		

		$file = file_get_contents($dir_output_to_file.'/'.$round_name, FILE_USE_INCLUDE_PATH);
		$file = '<pre>'. $file .'</pre>';
		$data['content_default'] = $file;
		
		$data['success'] = true;
		return Response::json($data);
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

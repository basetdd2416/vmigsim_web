<?php

class TestJsonController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// assign array specific value
		$vmList = array("vmList"=>array(array("name"=>"a","amount"=>30,"qos"=>360,"ram"=>512),array("name"=>"b","amount"=>100,"qos"=>360,"ram"=>1024)));
		// array to json 
		var_dump(json_encode($vmList));
		var_dump($vmList);
		var_dump(count($vmList["vmList"]));
		// print only array object zero
		var_dump($vmList["vmList"][0]); 
		$vmList = array();
		$vmList["round"] = 10;
		$vmList["environment"] = array(
			"bandwidth"=>500,
			"timeLimit"=>21600,
			"scheduleType"=>"FIFO",
			"migrationType"=>"xx",
			"networkType"=>"Dynamic",


			);

		// assign array value dynamic 
		for ($i=0; $i < 2 ; $i++) {

			$vmList["VMs"][$i]["name"] = 'a';
			$vmList["VMs"][$i]["amount"] = 20;
			$vmList["VMs"][$i]["qos"] = 360;
			$vmList["VMs"][$i]["ram"] = 512;

		}
		var_dump($vmList);
		var_dump(json_encode($vmList,JSON_PRETTY_PRINT));

		// write file 
		$path = 'run_simulation/input/';
		$simFolderName = 'simA/';
		$countFileName = 'countfile.txt';
		$countFilePath = $path.$simFolderName.$countFileName;
		if (!file_exists($path.$simFolderName)) {
	    	if(!mkdir($path.$simFolderName, 0777, true)){
				 die('Failed to create folders...');
			};
		}

		// read file from directory
		foreach(glob('./'.$path.$simFolderName.'*.*') as $filename){
     		echo $filename."<br/>";
 		}

 		
 		// read file 
 		$currentCount = file_get_contents($countFilePath, FILE_USE_INCLUDE_PATH);
 		$nextCount = $currentCount + 1;
 		$fp = fopen($countFilePath, 'w');
 		fwrite($fp, $nextCount);
 		fclose($fp);
		$configName = $currentCount.'.json';
		$fullPath = $path.$simFolderName.$configName;
		$fp = fopen($fullPath, 'w');
		fwrite($fp, json_encode($vmList,JSON_PRETTY_PRINT));
		fclose($fp);
		
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

	public function createConfigFile()
	{

	}

	public function queryData() 
	{
		var_dump(Environment::all()->toArray());
		$config = Configuration::find(1);
		var_dump($config->environment->toArray());
		//return Response::json(['name'=>'a','age'=>30], 200, array(), JSON_PRETTY_PRINT);
	}

	public function form1()
	{
		
		return View::make('test.form1');
	}

	public function processform1()
	{

		return Redirect::to('test/form2')->withInput();
	}
public function processForm2()
	{

		if(Input::get('back')) {
			return Redirect::to('test/form1')->withInput();
		}
	}
		public function backForm1()
	{

		return Redirect::to('test/form1')->withInput();
	}

	public function createForm2()
	{
		
		return View::make('test.form2');
	}

}

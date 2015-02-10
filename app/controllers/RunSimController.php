<?php

class RunSimController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$config_select = array('default'=>'Please select configuration name');
		$configs = Configuration::all();
		foreach ($configs as $c) {
			$config_select[$c->id] = $c->config_name; 
		}
		//var_dump($config_select);
		return View::make('runsim.index')->with('config_select',$config_select);
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

}

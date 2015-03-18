<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('pages.index');
});

Route::get('/getting_start', function()
{
	return View::make('pages.getstart');
});

Route::get('/simulation', function()
{
	return View::make('pages.simulation');
});

Route::get('/about', function()
{
	return View::make('pages.about');
});

Route::resource('simulation/srcdc', 'SrcDCController');
Route::resource('simulation/srchost', 'SrcHostController');
Route::resource('simulation/srcvm', 'SrcVMController');
Route::resource('simulation/migration', 'MigrationController');
Route::resource('simulation/configuration', 'ConfigurationController');
Route::resource('simulation/simsetup', 'SimsetupController');
Route::get('simulation/showresult', function()
{
	return View::make('showrs.index');
});
Route::get('simulation/showresult/qit', function()
{
	return View::make('showrs.qit');
});
Route::get('simulation/showresult/qos', function()
{
	return View::make('showrs.qos');
});
Route::get('simulation/showresult/bwu', function()
{
	return View::make('showrs.bwu');
});

Route::get('simulation/quicksim', 'QuickSimController@index');
Route::get('simulation/quicksim/import', 'QuickSimController@import');
Route::get('simulation/quicksim/createconfig', 'QuickSimController@createConfig');
Route::post('simulation/quicksim/saveallconfig', 'QuickSimController@saveAllConfig');
Route::post('simulation/quicksim/backtoconfig', 'QuickSimController@backToConfig');
Route::get('simulation/quicksim/createvm', 'QuickSimController@createVM');
Route::get('simulation/quicksim/createenvi', 'QuickSimController@createEnvi');
Route::get('simulation/quicksim/reportcreate', 'QuickSimController@reportCreate');
Route::get('simulation/runsimulation', 'RunSimController@index');
Route::get('simulation/ajax-config', 'RunSimController@ajaxConfig');
Route::post('simulation/savesimulation', 'RunSimController@ajaxSaveSimulation');
Route::get('simulation/simulation_result', 'SimResultController@index');
Route::get('simulation/ajax-sim-name', 'SimResultController@ajaxSimName');
Route::get('simulation/ajax-sim-rs', 'SimResultController@ajaxSimRsType');
Route::get('simulation/ajax-sim-round', 'SimResultController@ajaxSimRound');
Route::get('simulation/ajax-sim-netcompar', 'SimResultController@ajaxSimNetCompar');
//existing sim
Route::get('simulation/quicksim/existing-config', 'ExistConfigController@index');
Route::post('simulation/quicksim/uploadConfig', 'UploadConfigController@index');
Route::get('/shell', function()
{
	return View::make('shell');
});

Route::get('test', 'TestJsonController@index');
Route::get('test/querydata', 'TestJsonController@queryData');
Route::get('test/form1', 'TestJsonController@form1');
Route::get('test/mytestform1', function()
{
	$data = array();
	$data['message'] = 'hello';
	return Response::json($data);
});
Route::post('test/form1', 'TestJsonController@processform1');
Route::post('test/form2', 'TestJsonController@processForm2');
Route::get('test/form2', 'TestJsonController@createForm2');
Route::get('test/file', function () {
	$data = array();
	$data['xAxis'] = array(1,2,3,4,5);
	$data['yAxis'] = array(
						array(
							'name'=>'apisit',
							'lastname' => 'onakekasit',
							'ages' => 19
						),
						array(
							'name'=>'lookme',
							'lastname' => 'lookmho',
							'ages' => 30
							)
					);
	//$workflow = json_decode(file_get_contents('C:\xampp\htdocs\vmig\public\temp.json'), true);
	return var_dump(json_encode($data, JSON_PRETTY_PRINT) );
});


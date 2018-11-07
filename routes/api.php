<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getEstates', 'EstateControllerN@getEstates');
Route::get('/getDivisions', 'EstateControllerN@getDivisions');
Route::get('/getEmployees', 'EstateControllerN@getEmployees');
Route::get('/getClientUrls', 'EstateControllerN@getClientUrls');
Route::get('/getSchedules', 'EstateControllerN@getSchedules');
Route::get('/getPrices', 'EstateControllerN@getPrices');
Route::get('/getUsertypes', 'EstateControllerN@getUsertypes');
Route::get('/getRegions', 'EstateControllerN@getRegions');
Route::get('/getBestImprovementOnprofitPerHects', 'EstateControllerN@getBestImprovementOnprofitPerHects');
Route::get('/getTopPrices', 'EstateControllerN@getTopPrices');
Route::get('/getBestImprovementInRanks', 'EstateControllerN@getBestImprovementInRanks');
Route::get('/getHighestYphs', 'EstateControllerN@getHighestYphs');
Route::get('/getHighestRevenuePerHects', 'EstateControllerN@getHighestRevenuePerHects');
Route::get('/getBestImprovementInrankTeaFactories', 'EstateControllerN@getBestImprovementInrankTeaFactories');  
Route::get('/getVideos', 'EstateControllerN@getVideos');	  
Route::get('/getTblScreens', 'EstateControllerN@getTblScreens');	  
Route::get('/getTblCounters', 'EstateControllerN@getTblCounters');			    	    
Route::get('/getplantations', 'EstateControllerN@getplantations');			
Route::get('/getAllTimeRecordPrices', 'EstateControllerN@getAllTimeRecordPrices');		 
Route::get('/getBestYphRankImprovements', 'EstateControllerN@getBestYphRankImprovements');	
Route::get('/getBestProfitPerHects', 'EstateControllerN@getBestProfitPerHects');	
Route::get('/getResources', 'EstateControllerN@getResources');		 
			  	  
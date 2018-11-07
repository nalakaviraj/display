<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'SignageController@index');

//Route::get('/', 'HomeController@index');

Route::get('/geturl', 'SignageController@Get_url');
Route::get('/loadevideo', 'SignageController@loadevideo');
Route::get('/imageupload', 'SignageController@image');

Auth::routes();


Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//Employee
Route::get('/admin/employee', 'EmployeeController@index')->name('employee');

Route::get('/admin/employee/add', 'EmployeeController@createView')->name('add_employee');
Route::post('/admin/employee/add', 'EmployeeController@store')->name('store_employee');

Route::get('/admin/employee/edit/{id}', 'EmployeeController@editView')->name('edit_employee');
Route::post('/admin/employee/edit', 'EmployeeController@update')->name('update_employee');
Route::post('/admin/employee/delete', 'EmployeeController@delete')->name('delete_employee');

////rss
Route::get('/admin/news', 'RssController@index')->name('rss');
//
Route::get('/admin/news/add', 'RssController@create')->name('add_rss');
Route::post('/admin/news/add', 'RssController@store')->name('store_rss');

Route::get('/admin/news/edit/{id}', 'RssController@edit')->name('edit_rss');
Route::post('/admin/news/edit', 'RssController@update')->name('update_rss');
Route::post('/admin/news/delete', 'RssController@destroy')->name('delete_rss');

//price
Route::get('/admin/price', 'PriceController@index')->name('price');

Route::get('/admin/price/add', 'PriceController@createView')->name('add_price');
Route::post('/admin/price/add', 'PriceController@store')->name('store_price');

Route::get('/admin/price/edit/{id}', 'PriceController@editView')->name('edit_price');
Route::post('/admin/price/edit', 'PriceController@update')->name('update_price');
Route::post('/admin/price/delete', 'PriceController@delete')->name('delete_price');



// Manage URL
Route::get('/admin/manage_url', 'ManageUrlController@index')->name('manage_url');

Route::get('/admin/manage_url/add', 'ManageUrlController@createView')->name('manage_url_add');
Route::post('/admin/manage_url/add', 'ManageUrlController@store')->name('manage_url_store');

Route::get('/admin/manage_url/edit/{id}', 'ManageUrlController@editView')->name('manage_url_edit');
Route::post('/admin/manage_url/edit', 'ManageUrlController@update')->name('manage_url_update');

Route::post('/admin/manage_url/delete', 'ManageUrlController@delete')->name('manage_url_delete');


// Schedule
Route::get('/admin/schedule', 'ScheduleController@index')->name('schedule');

Route::get('/admin/schedule/view_screen_schedule/{screen_id}', 'ScheduleController@viewScreenSchedule')->name('view_screen_schedule');

Route::post('/admin/schedule/change', 'ScheduleController@update')->name('update_schedule');

Route::get('/admin/schedule/view_screen_schedule_update/{screen_id}', 'ScheduleController@viewScreenScheduleUpdate')->name('view_screen_schedule_update');

Route::post('/admin/schedule/screen_schedule_update', 'ScheduleController@screenScheduleUpdate');



//Admin User
Route::get('/admin/user', 'UserController@index')->name('user');


Route::get('/admin/user/add', 'UserController@createView')->name('add_user');
Route::post('/admin/user/add', 'UserController@store')->name('store_user');

Route::post('/admin/user/delete', 'UserController@delete')->name('delete_user');

//First page
Route::get('/firstpage', 'HaylesFirstPage@index');

//Best profit per hect
Route::get('/admin/pro_report/bestprofitperhect/add/{plan}', 'BestProfitPerHectController@createView');
Route::post('/admin/pro_report/bestprofitperhect/add', 'BestProfitPerHectController@create');
Route::post('/admin/pro_report/bestprofitperhect/delete', 'BestProfitPerHectController@delete');

/////best improvement on profit per hect
Route::get('/admin/pro_report/bestimprovementonprofitperhect/add/{plan}', 'BestImprovementOnProfitPerHectController@createView');

Route::post('/admin/pro_report/bestimprovementonprofitperhect/add', 'BestImprovementOnProfitPerHectController@create');
Route::post('/admin/pro_report/bestimprovementonprofitperhect/delete', 'BestImprovementOnProfitPerHectController@delete');

/////highest yph
Route::get('/admin/pro_report/highestyph/add/{plan}', 'HighestYphController@createView');

Route::post('/admin/pro_report/highestyph/add', 'HighestYphController@create');

Route::post('/admin/pro_report/highestyph/delete', 'HighestYphController@delete');

/////best yph rank improvement
Route::get('/admin/pro_report/bestyphrankimprovement/add/{plan}', 'BestYphRankImprovementController@createView');

Route::post('/admin/pro_report/bestyphrankimprovement/add', 'BestYphRankImprovementController@create');

Route::post('/admin/pro_report/bestyphrankimprovement/delete', 'BestYphRankImprovementController@delete');

/////highest revenue per hect
Route::get('/admin/pro_report/highestrevenueperhect/add/{plan}', 'HighestRevenuePerHectController@createView');

Route::post('/admin/pro_report/highestrevenueperhect/add', 'HighestRevenuePerHectController@create');

Route::post('/admin/pro_report/highestrevenueperhect/delete', 'HighestRevenuePerHectController@delete');

/////best improvement in rank
Route::get('/admin/pro_report/bestimprovementinrank/add/{plan}', 'BestImprovementInRankController@createView');

Route::post('/admin/pro_report/bestimprovementinrank/add', 'BestImprovementInRankController@create');

Route::post('/admin/pro_report/bestimprovementinrank/delete', 'BestImprovementInRankController@delete');

/////All time Record Prices
Route::get('/admin/pro_report/alltimerecordprices/add/{plan}', 'AllTimeRecordPricesController@createView');

Route::post('/admin/pro_report/alltimerecordprices/add', 'AllTimeRecordPricesController@create');

Route::post('/admin/pro_report/alltimerecordprices/delete', 'AllTimeRecordPricesController@delete');

/////Top Price
Route::get('/admin/pro_report/topprice/add/{plan}', 'TopPriceController@createView');

Route::post('/admin/pro_report/topprice/add', 'TopPriceController@create');

Route::post('/admin/pro_report/topprice/delete', 'TopPriceController@delete');

//Add Price topprice / alltimetop
Route::get('/admin/pro_report/price/add/{table}/{id}', 'PriceController@create');

Route::post('/admin/pro_report/price/add', 'PriceController@store');

Route::post('/admin/pro_report/price/delete', 'PriceController@destroy');

/////Best Improvement in Rank Tea Factories 
Route::get('/admin/pro_report/bestimprovementinrankteafactory/add/{plan}', 'BestimprovementinrankteafactoryController@createView');

Route::post('/admin/pro_report/bestimprovementinrankteafactory/add', 'BestimprovementinrankteafactoryController@create');

Route::post('/admin/pro_report/bestimprovementinrankteafactory/delete', 'BestimprovementinrankteafactoryController@delete');

//video
Route::get('/admin/video', 'VideoController@index');
Route::post('/admin/video/active', 'VideoController@active');


//Front End View
Route::get('/signage/apex_logo/img1', function () {
    return view('signage.apex_logo.index1');
});

Route::get('/signage/apex_logo/img2', function () {
    return view('signage.apex_logo.index2');
});

Route::get('/signage/apex_logo/img3', function () {
    return view('signage.apex_logo.index3');
});

Route::get('/signage/apex_logo/img4', function () {
    return view('signage.apex_logo.index4');
});

Route::get('/signage/apex_logo/img5', function () {
    return view('signage.apex_logo.index5');
});

Route::get('/signage/apex_logo/img6', function () {
    return view('signage.apex_logo.index6');
});


//get division for estate
Route::get('/getDivision/{id}', 'DivisionController@get_division');

//1st
Route::get('/signage/firstpage', 'SignageController@firstpage');
//2st
Route::get('/signage/second', 'SignageController@second');

//3
Route::get('/signage/bestimprovementonprofitperhect/ttl', 'SignageController@bestimprovementonprofitperhecttttl');
//4
Route::get('/signage/bestimprovementonprofitperhect/kvpl', 'SignageController@bestimprovementonprofitperhectkvpl');

//5
Route::get('/signage/higestrevenueperhect/ttl', 'SignageController@higestrevenueperhectttl');
//6
Route::get('/signage/higestrevenueperhect/kvpl', 'SignageController@higestrevenueperhectkvpl');

//7
Route::get('/signage/bestprofitperhect/ttl', 'SignageController@bestprofitperhectttl');
//8
Route::get('/signage/bestprofitperhect/kvpl', 'SignageController@bestprofitperhectkvpl');

//9
Route::get('/signage/highestyph/ttl', 'SignageController@highestyphttl');
//10
Route::get('/signage/highestyph/kvpl', 'SignageController@highestyphkvpl');

//11
Route::get('/signage/bestyphrankimprovement/ttl', 'SignageController@bestyphrankimprovementttl');
//12
Route::get('/signage/bestyphrankimprovement/kvpl', 'SignageController@bestyphrankimprovementkvpl');

//13
Route::get('/signage/bestimprovementinrank/ttl', 'SignageController@bestimprovementinrankttl');
//14
Route::get('/signage/bestimprovementinrank/kvpl', 'SignageController@bestimprovementinrankkvpl');

//15
Route::get('/signage/alltimerecordprices/ttl', 'SignageController@alltimerecordpricesttl');
//16
Route::get('/signage/alltimerecordprices/kvpl', 'SignageController@balltimerecordpriceskvpl');

//17
Route::get('/signage/topprice/ttl', 'SignageController@toppricettl');
//18
Route::get('/signage/topprice/kvpl', 'SignageController@toppricekvpl');

//20
Route::get('/signage/newsfeed', 'SignageController@newsfeed');

//21
Route::get('/signage/bestimprovementinrankteafactory/ttl', 'SignageController@bestimprovementinrankteafactoryttl');
//22
Route::get('/signage/bestimprovementinrankteafactory/kvpl', 'SignageController@bestimprovementinrankteafactorykvpl');

//marketing slides
Route::get('/signage/mar1', 'SignageController@mar1');
Route::get('/signage/mar2', 'SignageController@mar2');
Route::get('/signage/mar3', 'SignageController@mar3');
Route::get('/signage/mar4', 'SignageController@mar4');
Route::get('/signage/mar5', 'SignageController@mar5');
Route::get('/signage/mar6', 'SignageController@mar6');
Route::get('/signage/mar7', 'SignageController@mar7');
Route::get('/signage/mar8', 'SignageController@mar8');
Route::get('/signage/mar9', 'SignageController@mar9');
Route::get('/signage/mar10', 'SignageController@mar10');
Route::get('/signage/mar11', 'SignageController@mar11');
Route::get('/signage/mar12', 'SignageController@mar12');
Route::get('/signage/mar13', 'SignageController@mar13');
Route::get('/signage/mar14', 'SignageController@mar14');
Route::get('/signage/mar15', 'SignageController@mar15');
Route::get('/signage/mar15', 'SignageController@mar17');
Route::get('/signage/mar16', 'SignageController@mar16');
Route::get('/signage/mar18', 'SignageController@mar18');
Route::get('/signage/mar19', 'SignageController@mar19');

Route::get('/signage/bestprofitperhect', 'SignageController@bestprofitperhect');
Route::get('/signage/bestimprovementonprofitperhect', 'SignageController@bestimprovementonprofitperhect');
Route::get('/signage/highestyph', 'SignageController@highestyph');


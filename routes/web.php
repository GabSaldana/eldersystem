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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('users/logout','Auth\LoginController@userlogout')->name('user.logout');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::prefix('admin')->group( function(){

  Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
  //pass Reset
  Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

Route::group(['prefix'=>'patients', 'middleware' => 'admin'],  function(){
  //Route::get('patient','PatientController@index')->name('patient.index');
  Route::post('patient','PatientController@store')->name('patient.store');
  Route::get('patient/create','PatientController@create')->name('patient.create');
  Route::get('patient/{id}/destroy','PatientController@destroy')->name('patient.destroy');
  Route::put('patient/{patient}','PatientController@update')->name('patient.update');
  Route::get('patient/{patient}/edit','PatientController@edit')->name('patient.edit');
  Route::get('patient','PatientController@index')->name('patient.index');
});

//Route::get('doctor/create','DoctorController@create')->name('doctor.create');
Route::get('doctor/add', 'DoctorController@add')->name('doctor.add');
Route::post('doctor','DoctorController@store')->name('doctor.store');
Route::get('doctor/show/{id}', 'DoctorController@show')->name('doctor.show');
Route::get('patient/show/{id}', 'PatientController@show')->name('patient.show');
//Route::get('patient/create','PatientController@create')->name('patient.create');

Route::group(['prefix'=>'patients' ],  function(){
  Route::get('patient/{patient}/see','PatientController@see')->name('patient.see');
  Route::put('patient/{patient}/updatesee','PatientController@updatesee')->name('patient.updatesee');
});

Route::group(['prefix'=>'doctors' ],  function(){
  Route::get('doctor/{doctor}/see','DoctorController@see')->name('doctor.see');
  Route::put('doctor/{doctor}/updatesee','DoctorController@updatesee')->name('doctor.updatesee');
});

Route::group(['prefix'=>'doctors', 'middleware' => 'auth' ],  function(){ //, 'middleware' => 'auth'
	//Route::resource('doctor','DoctorController');
  //Route::get('doctor','DoctorController@index')->name('doctor.index');
  Route::get('doctor/{id}/destroy','DoctorController@destroy')->name('doctor.destroy');
  Route::put('doctor/{doctor}','DoctorController@update')->name('doctor.update');
  Route::get('doctor/create','DoctorController@create')->name('doctor.create');
  Route::get('doctor/{doctor}/edit','DoctorController@edit')->name('doctor.edit');
  //Route::get('doctor/see', 'DoctorController@see')->name('doctor.see');
  //Route::get('patient','PatientController@index')->name('patient.index');
  Route::get('doctor','DoctorController@index')->name('doctor.index');
});

Route::group(['prefix'=>'notifications'],  function(){
	//Route::resource('notification','NotificationController');
  Route::get('notification','NotificationController@index')->name('notification.index');
  Route::post('notification','NotificationController@store')->name('notification.store');
  Route::get('notification/create','NotificationController@create')->name('notification.create');
  Route::get('notification/{id}/destroy','NotificationController@destroy')->name('notification.destroy');
  Route::put('notification/{notification}','NotificationController@update')->name('notification.update');
  Route::get('notification/{notification}/edit','NotificationController@edit')->name('notification.edit');
  Route::get('notification/show/{id}', 'NotificationController@show')->name('notification.show');

});

Route::group(['prefix'=>'nodes' ],  function(){
	//Route::resource('notification','NotificationController');
  Route::get('node','NodeController@index')->name('node.index');
  Route::post('node','NodeController@store')->name('node.store');
  Route::get('node/create','NodeController@create')->name('node.create');
  Route::get('node/add','NodeController@add')->name('node.add');
  Route::get('node/{id}/destroy','NodeController@destroy')->name('node.destroy');
  Route::get('node/{variable}/{user}/destroyvar','NodeController@destroyvar')->name('node.destroyvar');
  Route::post('node','NodeController@update')->name('node.update');
  Route::get('node/{node}/edit','NodeController@edit')->name('node.edit');
  Route::get('node/show/{id}', 'NodeController@show')->name('node.show');
});

Route::group(['prefix'=>'measures'],  function(){

  Route::get('measure/{node}/{temp}/{pulso}','MeasureController@store')->name('measure.store');

});

Route::get('measure/show/{id}', 'PatientController@meashow')->name('measure.show');

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

Route::prefix('admin')->group( function(){
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
  //pass Reset
  Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

Route::group(['prefix'=>'patients'],  function(){
  //Route::get('patient','PatientController@index')->name('patient.index');
  Route::post('patient','PatientController@store')->name('patient.store');
  Route::get('patient/create','PatientController@create')->name('patient.create');
  Route::get('patient/{id}/destroy','PatientController@destroy')->name('patient.destroy');
  Route::put('patient/{patient}','PatientController@update')->name('patient.update');
  Route::get('patient/{patient}/edit','PatientController@edit')->name('patient.edit');
  Route::get('patient/show/{id}', 'PatientController@show')->name('patient.show');
  Route::get('doctor','DoctorController@index')->name('doctor.index');

});

Route::group(['prefix'=>'doctors', 'middleware' => 'auth' ],  function(){

	//Route::resource('doctor','DoctorController');
  //Route::get('doctor','DoctorController@index')->name('doctor.index');
  Route::post('doctor','DoctorController@store')->name('doctor.store');
  Route::get('doctor/create','DoctorController@create')->name('doctor.create');
  Route::get('doctor/{id}/destroy','DoctorController@destroy')->name('doctor.destroy');
  Route::put('doctor/{doctor}','DoctorController@update')->name('doctor.update');
  Route::get('doctor/{doctor}/edit','DoctorController@edit')->name('doctor.edit');
  Route::get('doctor/show/{id}', 'DoctorController@show')->name('doctor.show');
  Route::get('patient','PatientController@index')->name('patient.index');

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

Route::group(['prefix'=>'nodes'],  function(){
	Route::resource('node','NodeController');
	Route::get('node/{id}/destroy' ,[
		'uses' => 'NodeController@destroy',
		'as' => 'node.destroy'
	]);
});

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

Route::get('governments','MainController@governments');
Route::get('cities','MainController@cities');
Route::get('bloodtypes','MainController@bloodtypes');


	Route::post('client','ClientController@store');
	Route::post('client/login','ClientController@login');

	
	Route::post('resetpassword','ClientController@resetpassword');
	Route::post('restorepassword','ClientController@restorepassword');



	Route::post('client/contact','ClientController@contact');


	Route::group(['middleware'=>'auth:api'],function(){

	Route::post('registertoken','ClientController@registerToken');
	

	Route::post('request','MainController@request');

	Route::get('orders','MainController@orders');

	Route::get('order','MainController@order');

	Route::post('favourite','MainController@favourite');

	Route::post('favourites','MainController@favourites');

	Route::get('posts','MainController@posts');
	Route::post('client/{id}','ClientController@update');

	Route::post('sendnotification','MainController@sendnotification');
	Route::post('notificationSettings','ClientController@notificationSettings');

	Route::get('singleOrder','MainController@singleOrder');






	//Route::post('notificationSettings','MainController@notificationSettings');

	


});







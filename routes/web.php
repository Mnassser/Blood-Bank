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

Route::get('test','FrontController@index');
Route::get('test/login','FrontController@login');
Route::get('test/article','FrontController@article');
Route::get('test/contact-us','FrontController@contact_us');
Route::get('test/donations','FrontController@donations');
Route::get('test/donation-details','FrontController@donation_details');
Route::get('test/who-we-are','FrontController@who_we_are');
Route::get('test/donation-details','FrontController@donation_details');
Route::get('test/donation-details','FrontController@donation_details');
Route::get('test/signup','FrontController@signup');

Auth::routes();
	
//Auth::check();

Route::group(['middleware'=>'auth:web'],function(){
Route::resource('bloodbank/clients','ClientsController')->middleware('isAdmin');
Route::resource('bloodbank/posts','PostsController')->middleware('isAdmin');
Route::resource('bloodbank/categories','CategoriesController')->middleware('isAdmin');
Route::resource('bloodbank/orders','OrdersController')->middleware('isAdmin');
Route::resource('bloodbank/governments','GovernmentsController')->middleware('isAdmin');
Route::resource('bloodbank/governments.citis','CitisController')->middleware('isAdmin');
Route::resource('bloodbank/contacts','ContactsController')->middleware('isAdmin');


Route::resource('bloodbank/permissions','PermissionController')->middleware('isAdmin');
Route::resource('bloodbank/users','UserController')->middleware('isAdmin');
Route::resource('bloodbank/roles','RoleController')->middleware('isAdmin');


//Route::get('bloodbank/governments/show/id', 'GovernmentsController@show');


//Route::get('bloodbank/governments/edit/id', 'GovernmentsController@edit');
Route::get('/home', 'HomeController@index');
});


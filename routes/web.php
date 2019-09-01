<?php

// use Illuminate\Auth\Middleware\Auth;
use Illuminate\Support\Facades\Auth;

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
	

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/testing',function(){
	return view('frontend.index');
});

// frontend routes



// frontend routes end here

// admin routes
Route::group(['middleware' => 'auth'],function(){


	Route::get('/dashboard', 'AdminController@index')->name('home');

	// custom permission route
	Route::get('permission/filter','PermissionController@filter')->name('permission.filter');

	// custom permission route end here
	Route::resource('user','UserController');
	Route::resource('role','RoleController');
	Route::resource('tag','TagController');
	Route::resource('category','CategoryController');
	Route::resource('permission','PermissionController');
});
// admin routes end here



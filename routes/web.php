<?php

// use Illuminate\Auth\Middleware\Auth;
use App\Notifications\PostNotification;
use App\User;
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
	$user = User::find(1);
	$user->notify(new PostNotification);
	dd('cool');
	
});


Route::post('upload_image','PostController@uploadImage')->name('upload');

// frontend routes



// frontend routes end here

// admin routes

// subscriber route
	
Route::resource('subscriber','SubscriberController');

// subscriber route end here
Route::group(['middleware' => 'auth'],function(){


	Route::get('/dashboard', 'AdminController@index')->name('home');

	// custom permission route
	Route::get('permission/filter','PermissionController@filter')->name('permission.filter');
	Route::get('articles')->name('articles');
	Route::get('/approve_post/{post}','PostController@approved')->name('approve.post');

	// custom permission route end here
	Route::resource('user','UserController');
	Route::resource('role','RoleController');
	Route::resource('tag','TagController');
	Route::resource('category','CategoryController');
	Route::resource('permission','PermissionController');
	Route::resource('post','PostController');
	// Route::resource('subscriber','SubscriberController');
});
// admin routes end here



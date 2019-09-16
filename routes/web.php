<?php

// use Illuminate\Auth\Middleware\Auth;
use App\Notifications\PostNotification;
use App\User;
use App\Subscriber;
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
	

Route::get('/', 'HomeController@index')->name('');


Auth::routes();

Route::get('/testing',function(){
	dd(file_exists(public_path().'/images/posts/1568212688.jpg'));
	
});
Route::get('/response',function()
{
	dd('hi');
});


Route::post('upload_image','PostController@uploadImage')->name('upload');

// frontend routes
	Route::get('article/{slug}','HomeController@get_post')->name('get_post');
	Route::get('auther/{name}','HomeController@fetch_auther_details')->name('fetch_auther');
	Route::get('/about_us','HomeController@about_us')->name('about_us');
	Route::get('/contact','HomeController@contact_us')->name('contact_us');
	Route::post('/contact_us/form','HomeController@contact_us_form')->name('contact_us_form');
	Route::get('/article/category/{category}','HomeController@get_category_related_posts')->name('get_category_related_posts');
	Route::get('/article/tag/{tag}','HomeController@get_tags_related_posts')->name('get_tags_related_posts');
	Route::post('/post/comment','HomeController@post_comment')->name('post_comment');
	Route::get('/search_result','HomeController@search')->name('search_post');


// frontend routes end here

// admin routes

// subscriber route
	
Route::resource('subscriber','SubscriberController');

// subscriber route end here

// route with out middleware

	

// end here
Route::group(['middleware' => 'auth'],function(){


	Route::get('/dashboard', 'AdminController@index')->name('home');

	// custom permission route
	Route::get('permission/filter','PermissionController@filter')->name('permission.filter');
	Route::get('articles')->name('articles');
	Route::get('/approve_post/{post}','PostController@approved')->name('approve.post');

	// custom permission route end here

	// custom route for post
		Route::get('post/pending_posts','PostController@pending_posts')->name('post.pending');
		Route::get('post/archived_posts','PostController@archived_posts')->name('post.archived');


	// custom route for post end here

	Route::resource('user','UserController');
	Route::resource('role','RoleController');
	Route::resource('tag','TagController');
	Route::resource('category','CategoryController');
	Route::resource('permission','PermissionController');
	Route::resource('post','PostController');
	
});

// admin routes end here



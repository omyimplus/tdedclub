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


// ========== user ===========
// Route::get('/', function () {
//     return view('pages.home');
// });






Route::get('/test', function() {
    $img = Image::make('img/noimg.jpg')->resize(400, 250);
    return $img->response('jpg');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/home', 'HomeController@index');
// });
// //Route for admin
// Route::group(['prefix' => 'admin'], function(){
//     Route::group(['middleware' => ['admin']], function(){
//         Route::get('/', 'admin\AdminController@index');
//         Route::resource('/blogs', 'Admin\BlogsController');
//     });
// });

// Route::get('/artisan/{key}/{value}', function() {
//     Artisan::call('cache:clear');
//     Artisan::call('config:clear');
//     Artisan::call('route:clear');
//     Artisan::call('view:clear');
//     return "All cache is cleared";
// });Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
// });


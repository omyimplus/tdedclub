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
Route::get('/test', function() {
    $img = Image::make('img/noimg.jpg')->resize(400, 250);
    return $img->response('jpg');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false,'reset' => false,'verify' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/', 'admin\AdminController@index');
        Route::resource('/blogs', 'Admin\BlogsController');
    });
});

// Route::get('/artisan/{key}/{value}', function() {
//     Artisan::call('cache:clear');
//     Artisan::call('config:clear');
//     Artisan::call('route:clear');
//     Artisan::call('view:clear');
//     return "All cache is cleared";
// });
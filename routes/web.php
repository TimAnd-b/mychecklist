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

Auth::routes();


Route::group(['namespace' => 'Admin', 'middleware' => ['auth:web', 'isAdmin']], function () {
    Route::get('/', function (){
        return redirect('/admin');
    });
    Route::get('/admin', 'HomeController@index');
    Route::group(['prefix' => '/admin'], function () {
        Route::post('/add', 'UserController@store');
        Route::put('/user', 'UserController@update');
        Route::put('/user/{id}', 'UserController@toblock');
        Route::post('/user/{id}', 'UserController@unlock');
        Route::delete('/user/{id}', 'UserController@destroy');
        Route::get('/user/{id}/checklists', 'UserChecklistsController@index');
        Route::get('/user/checklists/{id}', 'UserChecklistsController@show');
        Route::get('/showadd', 'HomeController@show');
    });
});



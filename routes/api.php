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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController');
        Route::post('logout', 'LogoutController')->middleware('auth:api');
    });
    Route::group(['middleware' => ['auth:api', 'isBanned']], function () {
        Route::get('checklists', 'ChecklistController@index');
        Route::get('checklists/{id}', 'ChecklistController@show');
        Route::post('checklists', 'ChecklistController@store');
        Route::delete('checklists/{id}', 'ChecklistController@destroy');
        Route::put('checklists/{id}', 'ChecklistController@update');

        Route::get('checklists/{list_id}/listitems/', 'ListitemController@index');
        Route::post('checklists/{list_id}/listitems/', 'ListitemController@store');
        Route::delete('checklists/{list_id}/listitems/{item_id}', 'ListitemController@destroy');
        Route::put('checklists/{list_id}/listitems/{item_id}', 'ListitemController@update');
    });

});





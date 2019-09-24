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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test','userController@index');
Route::post('/created','userController@create');
Route::get('/showed','userController@show');
Route::put('/updated/{id}','userController@update');   //put and patch are same
//Route::patch('/updated','userController@update');//single input updated
Route::delete('/deleted/{id}','userController@destroy');
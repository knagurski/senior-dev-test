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

Route::get('activities', 'ActivitiesApiController@index')->middleware('auth:api');
Route::post('activities', 'ActivitiesApiController@create')->middleware('auth:api');
Route::get('activities/{activity}', 'ActivitiesApiController@read')->middleware('auth:api');
Route::patch('activities/{activity}', 'ActivitiesApiController@update')->middleware('auth:api');
Route::delete('activities/{activity}', 'ActivitiesApiController@delete')->middleware('auth:api');

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// Personal access tokens basic CRUD
Route::get('tokens', 'TokensController@index');
Route::post('tokens', 'TokensController@create');

// activity index
Route::get('activities', 'ActivitiesController@index')->name('activities');

// Create
Route::get('activities/add', 'ActivitiesController@add')->name('addActivity');
Route::post('activities', 'ActivitiesController@create')->name('createActivity');

// Update
Route::get('activities/{activity}', 'ActivitiesController@edit')->name('editActivity');
Route::patch('activities/{activity}', 'ActivitiesController@update')->name('updateActivity');

// Delete
Route::delete('activites/{activity}', 'ActivitiesController@delete')->name('deleteActivity');
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

// token create
Route::post('token', 'TokensController@create')
    ->name('createToken')
    ->middleware('auth');

// activity index
Route::get('activities', 'ActivitiesController@index')
    ->name('activities')
    ->middleware('auth');

// Create
Route::get('activities/add', 'ActivitiesController@add')
    ->name('addActivity')
    ->middleware('auth');
Route::post('activities', 'ActivitiesController@create')
    ->name('createActivity')
    ->middleware('auth');

// Update
Route::get('activities/{activity}', 'ActivitiesController@edit')
    ->name('editActivity')
    ->middleware('auth');
Route::patch('activities/{activity}', 'ActivitiesController@update')
    ->name('updateActivity')
    ->middleware('auth');

// Delete
Route::delete('activites/{activity}', 'ActivitiesController@delete')
    ->name('deleteActivity')
    ->middleware('auth');
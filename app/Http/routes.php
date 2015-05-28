<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Home (dashboard) routes
Route::get('/', 'HomeController@index');

// hook routes
Route::get('hooks/', ['middleware' => 'auth', 'uses' => 'HooksController@index']);

// project routes
//Route::model('projects', 'Project');
Route::resource('projects', 'ProjectsController');
//Route::get('projects/', ['middleware' => 'auth', 'uses' => 'ProjectsController@index']);
//Route::get('projects/{project}', ['middleware' => 'auth', 'uses' => 'ProjectsController@edit']);
//Route::put('projects/', ['middleware' => 'auth', 'uses' => 'ProjectsController@update', 'as' => 'projects.update']);

// job routes
Route::get('jobs/', ['middleware' => 'auth', 'uses' => 'JenkinsController@showJobs']);

// api routes
Route::group(['prefix' => 'api/v1'], function ()  {
    Route::post('/jenkins/store', 'JenkinsController@store');
});
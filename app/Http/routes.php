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

//Route::get('/', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Home (dashboard) routes
Route::get('/', 'HomeController@index');

// hook routes
Route::get('hooks/', 'HooksController@index');

// project routes
Route::get('projects/', 'ProjectsController@index');

// job routes
Route::get('jobs/', 'JenkinsController@showJobs');

// api routes
Route::group(['prefix' => 'api/v1'], function ()  {
    Route::post('/jenkins/store', 'JenkinsController@store');
});
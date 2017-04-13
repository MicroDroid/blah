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

Route::group(['middleware' => 'jwt.auth'], function() {
	Route::get('/auth/check', 'AuthController@checkAuth');
	
	Route::get('/tasklists', 'TaskListController@index');
	Route::get('/tasklists/{taskList}', 'TaskListController@get');
	Route::get('/tasklists/{taskList}/tasks', 'TaskController@index');
	Route::get('/tasklists/{taskList}/tasks/{task}', 'TaskController@get');
	Route::get('/tasklists/{taskList}/tasks/{task}/subtasks', 'SubtaskController@index');
	Route::get('/tasklists/{taskList}/tasks/{task}/subtasks/{subtask}', 'SubtaskController@get');
});
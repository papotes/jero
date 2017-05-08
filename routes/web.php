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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'messages', 'middleware' => 'auth'], function () {
    Route::get('/', 		['as' => 'messages', 		'uses' => 'MessagesController@index']);
    Route::get('create', 	['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', 		['as' => 'messages.store', 	'uses' => 'MessagesController@store']);
    Route::get('{id}', 		['as' => 'messages.show', 	'uses' => 'MessagesController@show']);
    Route::put('{id}', 		['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

//Route::get('/events/create', 'EventsController@create');
Route::group(['prefix' => 'events', 'middleware' => 'auth'], function () {
    Route::get('/', 		['as' => 'events', 			'uses' => 'EventsController@index']);
    Route::get('create', 	['as' => 'events.create', 	'uses' => 'EventsController@create']);
    Route::post('/', 		['as' => 'events.store', 	'uses' => 'EventsController@store']);
    Route::get('{id}', 		['as' => 'events.show', 	'uses' => 'EventsController@show']);
	Route::get('{id}/edit', ['as' => 'events.update', 	'uses' => 'EventsController@edit']);
    Route::put('{id}', 		['as' => 'events.update', 	'uses' => 'EventsController@update']);
	Route::delete('{id}', 	['as' => 'events.delete', 	'uses' => 'EventsController@destroy']);
});

Route::group(['prefix' => 'projects', 'middleware' => 'auth'], function () {
    Route::get('/', 			['as' => 'projects', 			'uses' => 'ProjectsController@index']);
    Route::get('create', 		['as' => 'projects.create', 	'uses' => 'ProjectsController@create']);
    Route::post('/', 			['as' => 'projects.store', 		'uses' => 'ProjectsController@store']);
    Route::get('{id}', 			['as' => 'projects.show', 		'uses' => 'ProjectsController@show']);
	Route::get('{id}/edit', 	['as' => 'projects.update', 	'uses' => 'ProjectsController@edit']);
    Route::put('{id}', 			['as' => 'projects.update', 	'uses' => 'ProjectsController@update']);
	Route::delete('{id}', 		['as' => 'projects.delete', 	'uses' => 'ProjectsController@destroy']);
	Route::get('{id}/stats', 	['as' => 'projects.stats', 		'uses' => 'ProjectsController@stats']);
	Route::get('{pid}/users/{uid}', 	    ['as' => 'projects.users', 	    'uses' => 'ProjectsController@users']);
    Route::get('{id}/invite',               ['as' => 'projects.invite',     'uses' => 'InvitesController@create']);
    Route::delete('{pid}/users/{uid}',      ['as' => 'projects.detach',     'uses' => 'ProjectsController@detach']);
});

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('/', 			['as' => 'users', 			'uses' => 'UsersController@index']);
    Route::get('create', 		['as' => 'users.create', 	'uses' => 'UsersController@create']);
    Route::post('/', 			['as' => 'users.store', 	'uses' => 'UsersController@store']);
    Route::get('{id}', 			['as' => 'users.show', 		'uses' => 'UsersController@show']);
	Route::get('{id}/edit', 	['as' => 'users.update', 	'uses' => 'UsersController@edit']);
    Route::put('{id}', 			['as' => 'users.update', 	'uses' => 'UsersController@update']);
	Route::delete('{id}', 		['as' => 'users.delete', 	'uses' => 'UsersController@destroy']);
});

Route::group(['prefix' => 'invites', 'middleware' => 'auth'], function () {
    Route::get('/',         ['as' => 'invites',          'uses' => 'InvitesController@index']);
    //Route::get('create',    ['as' => 'invites.create',   'uses' => 'InvitesController@create']);
    Route::post('/',        ['as' => 'invites.store',    'uses' => 'InvitesController@store']);
    Route::get('{id}',      ['as' => 'invites.show',     'uses' => 'InvitesController@show']);
    Route::get('{id}/edit', ['as' => 'invites.update',   'uses' => 'InvitesController@edit']);
    Route::put('{id}',      ['as' => 'invites.update',   'uses' => 'InvitesController@update']);
    Route::delete('{id}',   ['as' => 'invites.delete',   'uses' => 'InvitesController@destroy']);
});
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/', 'DownloadController@download');

	Route::get('/key/', 'AuthController@displayLogin');

	Route::post("/auth/", 'AuthController@login');

	Route::get("/logout/", 'AuthController@logout');

	Route::get('/admin/', 'AdminController@admin');

	Route::get('session', function() { return Session::all(); });

    // your routes here
});

	/* ------------- API --------------- */

// Scarlet Test API
Route::get('/api/', 'APIController@index');

// ADD
Route::get('/api/user/add/{username}/{clanID}/', 'APIController@add');

// INFO
Route::get('/api/user/info/{var}/', 'APIController@info');

// SET INSTALL
Route::post('/api/user/install/{key}/', 'APIController@install');

Route::get('/api/build-badge/', 'APIController@badge');

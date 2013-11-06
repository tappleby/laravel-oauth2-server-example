<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('oauth', 'OAuthController');

Route::get('/', function()
{
	Auth::logout();

	return View::make('hello')->with('users', User::all());
});

Route::get('login/{id}', function($id)
{
	Auth::loginUsingId($id, true);

	$authUrl = URL::to('oauth/authorize?client_id=example&redirect_uri='.URL::to('authorized').'&response_type=code&state=1234');

	return Redirect::to($authUrl);
});

Route::get('/authorized', function()
{
	$code = Input::get('code', null);

	if($code) {

	}

	return View::make('window.close');
});

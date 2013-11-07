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

	$state = str_random(40);

	Session::put('oauth_state', $state);

	$authUrl = URL::to('oauth/authorize?client_id=example&redirect_uri='.URL::to('authorized').'&response_type=code&state='.$state);

	return Redirect::to($authUrl);
});

Route::get('/authorized', function()
{
	$sessionState = Session::remove('oauth_state');
	$inputState = Input::get('state', null);
	$code = Input::get('code', null);


	if($code && $sessionState && $sessionState === $inputState) {
		$request = Request::create( '/oauth/token', 'POST', array(
				'grant_type' => 'authorization_code',
				'code' => $code,
				'client_id' => 'example',
				'client_secret' => 'bin',
				'redirect_uri' => URL::to('authorized')
			)
		);

		$response = Route::dispatch($request);
		$responseMessage = $response->getContent();
	} else {
		$responseMessage = json_encode(array(
			'error' => true,
			'error_message' => 'Error authorizing user.'
		));
	}

	return View::make('window.close')->with('responseMessage', $responseMessage);
});

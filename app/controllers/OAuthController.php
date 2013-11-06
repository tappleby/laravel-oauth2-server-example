<?php


class OAuthController extends \Tappleby\OAuth2\Server\Controller {

  public function onGetAuthorized($authRequestData)
  {
    return View::make('oauth.authorize')
	    ->with('user', Auth::user())
	    ->with('authData', (object)$authRequestData);
  }

  public function onPostAuthorized()
  {
		return (bool)Input::get("authorized", false);
  }

}
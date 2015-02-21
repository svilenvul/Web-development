<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showIndex()
	{
            return View::make('index');
	}       
        
        public function showLogin(){
            $message = Session::get('message');
            return View::make('login',array('message' => $message));
        }        
        public function showRegister(){
            return View::make('register');
        }
        public function login() {
            $username = Input::get('username');
            if (Auth::attempt(['UserName' => Input::get('username'), 'password' => Input::get('password')])) {
                return Redirect::To("/user/$username");
            } else {
                return Redirect::To('/login')->with('message', 'Username or password are incorrect');
            }
        }

        public function logOut() {
            Auth::logout();
            return Redirect::To('/login')->with('message', 'You have been loggged out.');
        }
}

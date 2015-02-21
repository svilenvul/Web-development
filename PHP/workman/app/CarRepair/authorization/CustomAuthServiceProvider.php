<?php
namespace CarRepair\Authorization;
use Illuminate\Auth\AuthServiceProvider;

class CustomAuthServiceProvider extends AuthServiceProvider {
  
    public function register()
	{
		$this->app->bindShared('auth', function($app)
		{
			// Once the authentication service has actually been requested by the developer
			// we will set a variable in the application indicating such. This helps us
			// know that we need to set any queued cookies in the after event later.
			$app['auth.loaded'] = true;

			return new CustomAuthManager($app);
		});
	}
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


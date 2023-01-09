<?php

namespace App\Providers;

use App\Models\User;
use Dusterio\LumenPassport\LumenPassport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Boot the authentication services for the application.
	 *
	 * @return void
	 */
	public function boot()
	{
		// $this->app['auth']->viaRequest('api', function ($request) {
		//     if ($request->input('api_token')) {
		//         return User::where('api_token', $request->input('api_token'))->first();
		//     }
		// });
		Passport::tokensCan([
			'crud-list' => 'Can CRUD as Admin',
			'create-list' => 'Can create only',
			'validate-list' => 'Can validation ticket staff',
		]);

		Passport::setDefaultScope([
				'crud-list',
				'create-list',
				'validate-list',
		]);

		LumenPassport::routes($this->app, ['prefix' => 'v1/oauth']);
	}
}

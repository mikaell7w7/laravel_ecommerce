<?php namespace CodeCommerce\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'CodeCommerce\Services\Registrar'


		);

        // Isto ativar� o controle de chaves estrangeiras que por padr�o n�o vem habilitado. Isto far� que quando os produtos forem exclu�dos, os registros de imagens tamb�m ser�o.
        if(DB::getDefaultConnection()=='sqlite'){
            DB::statement(DB::raw('PRAGMA foreign_keys=1'));
        }



	}

}

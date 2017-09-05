<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;

class CodeProjectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            \CodeProject\Repositories\Cadastros\ClientRepository::class, 
            \CodeProject\Repositories\Cadastros\ClientRepositoryEloquent::class
        );
    }
}
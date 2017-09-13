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

        $this->app->bind(
            \CodeProject\Repositories\Cadastros\ProjectRepository::class,
            \CodeProject\Repositories\Cadastros\ProjectRepositoryEloquent::class
        );

        $this->app->bind(
            \CodeProject\Repositories\Cadastros\ProjectNoteRepository::class,
            \CodeProject\Repositories\Cadastros\ProjectNoteRepositoryEloquent::class
        );

        $this->app->bind(
            \CodeProject\Repositories\Cadastros\ProjectTaskRepository::class,
            \CodeProject\Repositories\Cadastros\ProjectTaskRepositoryEloquent::class
        );


        $this->app->bind(
            \CodeProject\Repositories\Cadastros\UserRepository::class,
            \CodeProject\Repositories\Cadastros\UserRepositoryEloquent::class
        );
    }
}

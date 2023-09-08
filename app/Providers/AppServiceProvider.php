<?php

namespace App\Providers;

use App\Repositories\{SupportRepositoryInterface};
use App\Repositories\{SupportEloquentORM};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    // public $bindings = [
    //     SupportRepositoryInterface::class => SupportEloquentORM::class,
    // ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SupportRepositoryInterface::class,
            SupportEloquentORM::class
        );

        // $this->app->bind(SupportRepositoryInterface::class, function (Application $app) {
        //     return new SupportRepositoryInterface($app->make(SupportEloquentORM::class));
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace Admin\Dashboard;

use Illuminate\Support\ServiceProvider;
use Admin\Dashboard\Http\Controllers\DashboardController;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__ . '/routes/routes.php';

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'Dashboard');
       // $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {
        $this->app->make(DashboardController::class);
    }
}

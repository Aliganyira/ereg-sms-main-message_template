<?php

namespace Admin\UI;

use Illuminate\Support\ServiceProvider;

class UIServiceProvider extends ServiceProvider
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

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'ui');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function register()
    {
        $this->app->make('Admin\UI\Http\Controllers\UIController');
    }
}

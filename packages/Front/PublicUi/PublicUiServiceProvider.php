<?php

namespace Front\PublicUi;

use Illuminate\Support\ServiceProvider;
use Front\PublicUi\Http\Controllers\PublicUiController;

class PublicUiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__ . '/routes/api.php';
        include __DIR__ . '/routes/web.php';

        $this->loadViewsFrom(__DIR__.'/resources/views', 'PublicUi');
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
    }

    public function register()
    {
        $this->app->make(PublicUiController::class);
    }
}

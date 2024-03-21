<?php

namespace Admin\SystemSettings;

use Illuminate\Support\ServiceProvider;
use Admin\SystemSettings\Http\Controllers\SystemSettingsController;

class SystemSettingsServiceProvider extends ServiceProvider
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

        $this->loadViewsFrom(__DIR__.'/resources/views', 'system-settings');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    public function register()
    {
        $this->app->make(SystemSettingsController::class);
    }
}

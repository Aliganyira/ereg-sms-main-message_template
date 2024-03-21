<?php

namespace Admin\UserManagement;

use Illuminate\Support\ServiceProvider;
use Admin\UserManagement\Http\Controllers\UserManagementController;

class UserManagementServiceProvider extends ServiceProvider
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

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'user-management');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    public function register()
    {
        $this->app->make(UserManagementController::class);
    }
}

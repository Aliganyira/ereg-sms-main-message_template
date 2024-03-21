<?php

namespace Admin\Messages;

use Illuminate\Support\ServiceProvider;
use Admin\Messages\Http\Controllers\MessagesController;

class MessagesServiceProvider extends ServiceProvider
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

        $this->loadViewsFrom(__DIR__.'/resources/views', 'Messages');
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
    }

    public function register()
    {
        $this->app->make(MessagesController::class);
    }
}

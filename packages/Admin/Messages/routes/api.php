<?php

use Admin\Messages\Http\Controllers\MessagesController;

Route::group([
    'middleware' => ['api','auth:api','admin'],
    //'prefix'     => 'api/messages'
    'prefix'     => 'api/admin'
], function() {

    Route::apiResource('messages', MessagesController::class);
});

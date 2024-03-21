<?php

use Admin\Messages\Http\Controllers\MessagesController;
Route::get ('messages/receive-sms', [MessagesController::class, 'receiveParticipantSms'])->name('messages.receive-sms');
Route::group([
    'middleware' => ['web','auth','admin'],
    'prefix'     => 'admin'
], function() {

    Route::get ('messages/assign-moderators', [MessagesController::class, 'inbox']);
    Route::get ('messages/inbox', [MessagesController::class, 'inbox'])->name('messages.inbox');
    Route::get ('messages/outbox', [MessagesController::class, 'outbox'])->name('messages.outbox');
    Route::get ('messages/templates', [MessagesController::class, 'template'])->name('messages.templates');
    Route::get ('messages/inbox-sms-ajax', [MessagesController::class, 'inboxSmsAjax'])->name('messages.inbox-sms-ajax');
    Route::post ('messages/filter', [MessagesController::class, 'inbox'])->name('messages.filter');
    Route::resource('messages', MessagesController::class);
});

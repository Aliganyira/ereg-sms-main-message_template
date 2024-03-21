<?php

use Front\PublicUi\Http\Controllers\PublicUiController;

Route::group([
    'middleware' => ['api','auth:api','admin'],
    //'prefix'     => 'api/public-ui'
    'prefix'     => 'api/front'
], function() {

    Route::apiResource('public-ui', PublicUiController::class);
	//Route::get ('/',       [PublicUiController::class, 'index' ])->name('public-ui.index');
	//Route::get ('/create', [PublicUiController::class, 'create'])->name('public-ui.create');
	//Route::post('/',       [PublicUiController::class, 'create'])->name('public-ui.store');
});

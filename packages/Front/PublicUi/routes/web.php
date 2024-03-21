<?php

use Front\PublicUi\Http\Controllers\PublicUiController;

Route::group([
    'middleware' => ['web'],
    //'prefix'     => 'public-ui'
//    'prefix'     => 'front'
], function() {

    Route::resource('public-ui', PublicUiController::class);

	//Route::get ('/create', [PublicUiController::class, 'create'])->name('public-ui.create');
	//Route::post('/',       [PublicUiController::class, 'create'])->name('public-ui.store');
});

<?php

Route::group(['middleware' => ['web', 'auth','admin'],'prefix'=>'admin'], function() {

    Route::get('/home', 'Admin\Dashboard\Http\Controllers\DashboardController@index');


});

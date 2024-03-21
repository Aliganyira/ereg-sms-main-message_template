<?php

use Admin\SystemSettings\Http\Controllers\SystemSettingsController;

Route::group(['middleware' => ['web','auth','admin'],'prefix'=>'admin'], function() {
	Route::get('settings/admin-units/{level}/{id?}', [SystemSettingsController::class,'remoteAdminUnits']);
	Route::resource('settings', SystemSettingsController::class);

	Route::get('settings/sectors/{id}/sub-sectors', [SystemSettingsController::class, 'getSubSectorsBySectorId'])->name('sectors.sub_sectors');

    Route::get('cities', [SystemSettingsController::class,'cities']);

    Route::get('select-offices', [SystemSettingsController::class,'selectOffices']);
    Route::get('select-departments', [SystemSettingsController::class,'selectDepartments']);
    Route::get('select-users', [SystemSettingsController::class,'selectUsers']);




});


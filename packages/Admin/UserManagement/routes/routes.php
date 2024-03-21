<?php

use Admin\UserManagement\Http\Controllers\PermissionController;
use Admin\UserManagement\Http\Controllers\RoleController;
use Admin\UserManagement\Http\Controllers\GroupController;
use Admin\UserManagement\Http\Controllers\UserController;


Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('users/add-signature', [UserController::class, 'addSignature']);
    Route::get('my-profile', [UserController::class, 'show']);
    Route::post('update-profile', [UserController::class, 'update_profile']);
    Route::get('profile-security', [UserController::class, 'profileSecurity']);
    Route::get('login-activity', [UserController::class, 'loginActivity']);

});

Route::group(['middleware' => ['web', 'auth', 'verified', 'admin', 'role:admin|super-admin|organisation'], 'prefix' => 'admin'], function () {

    Route::get('settings/delete/{id}/role/{role}', [UserController::class, 'deleteUserRole']);
    Route::get('users/{id}/{page?}', [UserController::class, 'show']);
//    Route::get('users',[UserController::class,'index'])->name('users.index');
    Route::resource('users', UserController::class);

});


Route::group(['middleware' => ['web', 'auth', 'admin', 'verified', 'role:admin|super-admin'], 'prefix' => 'admin'], function () {

    //Groups
    Route::get('groups/assign', [GroupController::class, 'assignCreate'])->name('groups.assign');
    Route::post('groups/assign-on-select-user', [GroupController::class, 'assignOnSelectUser'])->name('groups.assign-on-select-user');
    Route::post('groups/assign-store', [GroupController::class, 'assignStore'])->name('groups.assign-store');


    //Roles
    Route::get('roles/assign', [RoleController::class, 'assignCreate'])->name('roles.assign');
    Route::post('roles/assign-on-select-user', [RoleController::class, 'assignOnSelectUser'])->name('roles.assign-on-select-user');
    Route::post('roles/assign-store', [RoleController::class, 'assignStore'])->name('roles.assign-store');


    //Permissions
    Route::get('permissions/assign', [PermissionController::class, 'assignCreate'])->name('permissions.assign');
    Route::post('permissions/assign-on-select-user', [PermissionController::class, 'assignOnSelectUser'])->name('permissions.assign-on-select-user');
    Route::post('permissions/assign-store', [PermissionController::class, 'assignStore'])->name('permissions.assign-store');


    //Main Resources
    Route::resources([
        'groups' => GroupController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class
    ]);
});

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Backend\UsersController;

Auth::routes();



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Routes accessible only to authenticated users


    Route::get('users/changeStatus',[App\Http\Controllers\Backend\UsersController::class,'changeStatus'])->name('users.changeStatus');
    Route::post('users/restore/{id}',[App\Http\Controllers\Backend\UsersController::class,'restore'])->name('users.restore');
    Route::post('users/restore_all',[App\Http\Controllers\Backend\UsersController::class,'restore_all'])->name('users.restoreAll');
    Route::resource('users', UsersController::class)->except('create','update');

    Route::get('permissions/changeStatus',[App\Http\Controllers\Backend\PermissionsController::class,'changeStatus'])->name('permissions.changeStatus');
    Route::resource('permissions', App\Http\Controllers\Backend\PermissionsController::class)->except('create','update');

    Route::get('roles/changeStatus',[App\Http\Controllers\Backend\RolesController::class,'changeStatus'])->name('roles.changeStatus');
    Route::resource('roles', App\Http\Controllers\Backend\RolesController::class)->except('create','update');


    // Route for user profile
    // Route::get('profile/generalInfo', [App\Http\Controllers\Backend\ProfilesController::class, 'generalInfo'])->name('profile.generalInfo');
    // Route::post('profile/generalInfo/update', [App\Http\Controllers\Backend\ProfilesController::class, 'updateInfo'])->name('profile.updateInfo');
    // Route::post('profile/generalInfo/create', [App\Http\Controllers\Backend\ProfilesController::class, 'createInfo'])->name('profile.createInfo');
    // Route::get('profile/changePassword', [App\Http\Controllers\Backend\ProfilesController::class, 'changePassword'])->name('profile.changePassword');
    // Route::post('profile/changePassword', [App\Http\Controllers\Backend\ProfilesController::class, 'resetPassword'])->name('profile.reset.password');
    // Route::get('profile/changePhoto', [App\Http\Controllers\Backend\ProfilesController::class, 'changePhoto'])->name('profile.changePhoto');
    // Route::post('profile/changePhoto', [App\Http\Controllers\Backend\ProfilesController::class, 'resetPhoto'])->name('profile.reset.photo');




});
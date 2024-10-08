<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Backend\UsersController;

Auth::routes();


// -----------------------------------------------------------------------------------------------
// admin
// -----------------------------------------------------------------------------------------------
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Routes accessible only to authenticated users


    // -----------------------------------------------------------------------------------------------
    // users
    // -----------------------------------------------------------------------------------------------
    Route::get('users/changeStatus',[App\Http\Controllers\Backend\UsersController::class,'changeStatus'])->name('users.changeStatus');
    Route::post('users/restore/{id}',[App\Http\Controllers\Backend\UsersController::class,'restore'])->name('users.restore');
    Route::post('users/restore_all',[App\Http\Controllers\Backend\UsersController::class,'restore_all'])->name('users.restoreAll');
    Route::resource('users', UsersController::class)->except('create','update');

    // -----------------------------------------------------------------------------------------------
    // permissions
    // -----------------------------------------------------------------------------------------------
    Route::get('permissions/changeStatus',[App\Http\Controllers\Backend\PermissionsController::class,'changeStatus'])->name('permissions.changeStatus');
    Route::resource('permissions', App\Http\Controllers\Backend\PermissionsController::class)->except('create','update');

    // -----------------------------------------------------------------------------------------------
    // roles
    // -----------------------------------------------------------------------------------------------
    Route::get('roles/changeStatus',[App\Http\Controllers\Backend\RolesController::class,'changeStatus'])->name('roles.changeStatus');
    Route::resource('roles', App\Http\Controllers\Backend\RolesController::class)->except('create','update');


    // -----------------------------------------------------------------------------------------------
    // provinces
    // -----------------------------------------------------------------------------------------------
    Route::get('provinces/changeStatus',[App\Http\Controllers\Backend\ProvinceController::class,'changeStatus'])->name('provinces.changeStatus');
    Route::post('provinces/restore/{id}',[App\Http\Controllers\Backend\ProvinceController::class,'restore'])->name('provinces.restore');
    Route::post('provinces/restore_all',[App\Http\Controllers\Backend\ProvinceController::class,'restore_all'])->name('provinces.restoreAll');
    Route::resource('provinces', App\Http\Controllers\Backend\ProvinceController::class)->except('create','update');


    // -----------------------------------------------------------------------------------------------
    // districts
    // -----------------------------------------------------------------------------------------------
    Route::get('districts/changeStatus',[App\Http\Controllers\Backend\DistrictController::class,'changeStatus'])->name('districts.changeStatus');
    Route::post('districts/restore/{id}',[App\Http\Controllers\Backend\DistrictController::class,'restore'])->name('districts.restore');
    Route::post('districts/restore_all',[App\Http\Controllers\Backend\DistrictController::class,'restore_all'])->name('districts.restoreAll');
    Route::resource('districts', App\Http\Controllers\Backend\DistrictController::class)->except('create','update');


    // -----------------------------------------------------------------------------------------------
    // profile
    // -----------------------------------------------------------------------------------------------
    // Route::get('profile/generalInfo', [App\Http\Controllers\Backend\ProfilesController::class, 'generalInfo'])->name('profile.generalInfo');
    // Route::post('profile/generalInfo/update', [App\Http\Controllers\Backend\ProfilesController::class, 'updateInfo'])->name('profile.updateInfo');
    // Route::post('profile/generalInfo/create', [App\Http\Controllers\Backend\ProfilesController::class, 'createInfo'])->name('profile.createInfo');
    // Route::get('profile/changePassword', [App\Http\Controllers\Backend\ProfilesController::class, 'changePassword'])->name('profile.changePassword');
    // Route::post('profile/changePassword', [App\Http\Controllers\Backend\ProfilesController::class, 'resetPassword'])->name('profile.reset.password');
    // Route::get('profile/changePhoto', [App\Http\Controllers\Backend\ProfilesController::class, 'changePhoto'])->name('profile.changePhoto');
    // Route::post('profile/changePhoto', [App\Http\Controllers\Backend\ProfilesController::class, 'resetPhoto'])->name('profile.reset.photo');



    // -----------------------------------------------------------------------------------------------
    // people
    // -----------------------------------------------------------------------------------------------
    Route::resource('peoples', App\Http\Controllers\Backend\PeopleController::class)->except('create');

    Route::controller(App\Http\Controllers\Backend\PeopleController::class)->group(function () {
        Route::get('search', 'search')->name('people.search');

        // Route::get('people/add', 'add')->name('people.add');
        // Route::get('people/{person}', 'show')->name('people.show');
        // Route::get('peoples/{id}/edit', 'edit')->name('people.edit');
        Route::get('peoples/{id}/edit-contact', 'editContact')->name('people.editContact');
        Route::post('peoples/store-contact', 'storeContact')->name('people.storeContact');

        Route::get('peoples/{id}/edit-death', 'editDeath')->name('people.editDeath');
        Route::post('peoples/store-death', 'storeDeath')->name('people.storeDeath');

        Route::get('peoples/edit-photos/{id}', 'editPhotos')->name('people.editPhotos');
        Route::post('peoples/store-photos', 'storePhotos')->name('people.storePhotos');
        Route::post('peoples/set-primary-photo/{photoId}', 'setPrimaryPhoto')->name('people.setPrimaryPhoto');
        Route::post('peoples/delete-photo/{photoId}', 'deletePhoto')->name('people.deletePhoto');


        Route::get('peoples/get-existing-persons', 'getExistingPersons')->name('people.getExistingPersons');
        Route::post('peoples/store-father', 'storeFather')->name('people.storeFather');
        Route::post('peoples/select-existing-father', 'selectExistingFather')->name('people.selectExistingFather');


        // Route::get('peoples/get-existing-persons', 'getExistingPersons')->name('people.getExistingPersons');
        Route::post('peoples/store-mother', 'storeMother')->name('people.storeMother');
        Route::post('peoples/select-existing-mother', 'selectExistingMother')->name('people.selectExistingMother');

        Route::post('people/updateFamily', 'updateFamily')->name('people.updateFamily');

        Route::post('peoples/store-partner', 'storePartner')->name('people.storePartner');
        Route::post('peoples/select-existing-partner', 'selectExistingPartner')->name('people.selectExistingPartner');

        Route::post('peoples/store-child', 'storeChild')->name('people.storeChild');
        Route::post('peoples/select-existing-child', 'selectExistingChild')->name('people.selectExistingChild');

        // Route::post('peoples/{id}', 'update')->name('people.update');


        Route::get('people/{person}/ancestors', 'ancestors')->name('people.ancestors');
        Route::get('people/{person}/certificates', 'certificates')->name('people.certificates');
        Route::get('people/{person}/descendants', 'descendants')->name('people.descendants');

        Route::get('people/{id}/siblings', 'getSiblings')->name('people.getSiblings');
        Route::get('people/{id}/ancestors-descendants', 'getAncestorsDescendants')->name('people.getAncestorsDescendants');



        Route::get('people/{person}/chart', 'chart')->name('people.chart');



    });

    // -----------------------------------------------------------------------------------------------
    // teams
    // -----------------------------------------------------------------------------------------------
    Route::resource('teams', App\Http\Controllers\Backend\TeamController::class)->except('create','update');
    Route::post('teams/restore/{id}',[App\Http\Controllers\Backend\TeamController::class,'restore'])->name('teams.restore');
    Route::post('teams/restore_all',[App\Http\Controllers\Backend\TeamController::class,'restore_all'])->name('teams.restoreAll');

    Route::controller(App\Http\Controllers\Team\TeamPageController::class)->group(function () {
        // Route::get('dependencies', 'dependencies')->name('dependencies');
        // Route::get('session', 'session')->name('session');
        // Route::get('test', 'test')->name('test');

        // Route::get('people', 'people')->name('people');
        // Route::get('peoplelog', 'peoplelog')->name('peoplelog');
        Route::get('teams-setting', 'teams')->name('teams-setting');
        // Route::get('create/teams', 'add')->name('create.teams');
        // Route::get('users', 'users')->name('users');
    });



    Route::controller(App\Http\Controllers\Controller::class)->group(function () {
        Route::get('birth-certificate', 'birthCertificate')->name('people.birthCertificate');

    });

    Route::controller(App\Http\Controllers\Backend\SettingController::class)->group(function () {
        Route::get('settings', 'index')->name('setting.index');
        Route::post('settings/update', 'update')->name('setting.update');
    });


});

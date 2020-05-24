<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm')->name('index');
Route::namespace('Admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('/admin')->group(function () {

        Route::namespace('Settings')->prefix('settings')->group(function () {
            Route::post('users/search', 'UserController@search')->name('users.search');
            Route::resource('users', 'UserController');
            Route::post('roles/search', 'RoleController@search')->name('roles.search');
            Route::resource('roles', 'RoleController');
            Route::post('permissions/search', 'PermissionController@search')->name('permissions.search');
            Route::resource('permissions', 'PermissionController');
        });

        Route::namespace('Errors')->prefix('/errors')->name('errors.')->group(function () {
            Route::get('/403', 'ErrorController@error403')->name('403');
        });
    });


});


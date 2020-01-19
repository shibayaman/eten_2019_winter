<?php

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

Route::post('projects/confirm', 'ProjectController@confirm')->name('projects.confirm');
Route::get('projects/edit', 'ProjectController@edit')->name('projects.edit');
Route::post('projects/update', 'ProjectController@update')->name('projects.update');
Route::resource('projects', 'ProjectController')->only(['index', 'store', 'create', 'show']);

Auth::routes([
    'register' => false,
    'confirm' => false,
    'reset' => false
]);

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Admin\AuthLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\AuthLoginController@login');
    Route::post('logout', 'Admin\AuthLoginController@logout')->name('admin.logout');

    Route::view('/', 'admin.home', ['fields' => Config::get('const.fields')])
        ->middleware('auth:admin')->name('admin.home');
        
    Route::resource('owners', 'OwnerController');
});

Route::fallback('ProjectController@index');
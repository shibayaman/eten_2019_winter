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

Route::get('/example', function () {
    return view('example');
});

Route::resource('projects', 'ProjectController')->middleware('checkProject');
Route::post('project/confirm', 'Projectcontroller@confirm')->name('projects.confirm');
Route::get('project/edit', 'Projectcontroller@edit')->name('projects.edit');

Route::get('/', 'Auth\LoginController@showLoginForm');

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

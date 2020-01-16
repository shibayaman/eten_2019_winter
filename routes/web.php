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

Route::resource('projects', 'ProjectController');
Route::get('projects/create', 'ProjectController@create')->middleware('checkProject');
Route::get('project/edit', 'ProjectController@edit')->name('projects.edit');
Route::post('project/confirm', 'ProjectController@confirm')->name('projects.confirm');
Route::post('project/store', 'ProjectController@store')->name('projects.store');

Route::get('/', 'ProjectController@index');

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

Route::fallback(function ($route) {
    return redirect('/');
});
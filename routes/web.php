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

Route::post('projects/create', 'ProjectController@create')->name('projects.create');
Route::resource('projects', 'ProjectController')->except(['create']);

Route::resource('tokens', 'TokenController');

Route::view('/', 'login');

Auth::routes([
    'register' => false,
    'confirm' => false,
    'reset' => false
]);

Route::view('/admin', 'admin')->middleware('auth');

Route::post('', 'ProjectController@store');
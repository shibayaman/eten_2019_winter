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

Route::resource('tokens', 'TokenController');

Route::resource('projects', 'ProjectController');

Route::view('/', 'login');

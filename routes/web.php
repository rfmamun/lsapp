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

Auth::routes();


/*===================
==== Guest Rout =====
===================*/
Route::get('/', function () {
    return view('welcome');
});



/*===================
==== Users Rout =====
===================*/
Route::get('/dashboard', 'HomeController@index')->name('home');



/*===================
==== Admin Rout =====
===================*/
Route::get('/admin', function () {
    return redirect('admin/dashboard');
});

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin');
});
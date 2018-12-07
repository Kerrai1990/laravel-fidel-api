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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/dashboard', 'Admin\DashboardController', ['name' => 'dashboard']);
Route::resource('admin/users', 'Admin\UserController', ['name' => 'users']);
Route::resource('admin/programs', 'Admin\ProgramController', ['name' => 'programs']);
Route::resource('admin/brands', 'Admin\BrandController', ['name' => 'brands']);
Route::resource('admin/locations', 'Admin\LocationController', ['name' => 'locations']);
Route::resource('admin/transactions', 'Admin\TransactionController', ['name' => 'transactions']);

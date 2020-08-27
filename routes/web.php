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

Route::get('/', 'WelcomeController');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/notify/{id}/list', 'NotificationController@listAllNotifications')
    ->name('listAllNotifications');
Route::resource('posts', 'CompanyPostController');
Route::resource('products', 'CompanyProductController');
Auth::routes();

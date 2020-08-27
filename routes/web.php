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

Route::post('/notify/read', 'NotificationController@markAsRead')
    ->name('markAsRead');
Route::post('/notify/read/{id}', 'NotificationController@markAsReadById')
    ->name('markAsReadById');
Route::get('/notify/list/unread', 'NotificationController@listAllUnReadNotifications')
    ->name('listUnreadNotifications');
Route::get('/notify/list/read', 'NotificationController@listAllReadNotifications')
    ->name('listReadNotifications');
Route::post('/notify/{id}/remove', 'NotificationController@removeNotificationById');

Route::get('/notify/{id}/list', 'NotificationController@listAllNotifications')
    ->name('listAllNotifications');
Route::resource('posts', 'CompanyPostController');
Route::resource('products', 'CompanyProductController');
Auth::routes();

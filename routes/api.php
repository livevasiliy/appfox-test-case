<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('notify/read', 'NotificationController@markAsRead')
    ->name('markAsRead');
Route::post('notify/read/{id}', 'NotificationController@markAsReadById')
    ->name('markAsReadById');
Route::get('notify/list/unread', 'NotificationController@listAllUnReadNotifications')
    ->name('listUnreadNotifications');
Route::get('notify/list/read', 'NotificationController@listAllReadNotifications')
    ->name('listReadNotifications');
Route::post('notify/{id}/remove', 'NotificationController@removeNotificationById');


Route::post('subscribe/posts', 'SubscriptionController@subscribeOnPosts');
Route::post('subscribe/products', 'SubscriptionController@subscribeOnProducts');
Route::post('unsubscribe/posts', 'SubscriptionController@unSubscribeOnPosts');
Route::post('unsubscribe/products', 'SubscriptionController@unSubscribeOnProducts');

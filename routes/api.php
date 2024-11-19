<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MainController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['prefix'=>'vi','namespace'=>'Api'],function () {
    Route::post('register',[AuthController::class, 'register']);
    Route::post('login',[AuthController::class, 'login']);
    Route::get('governorates',[MainController::class, 'governorates']);
    Route::get('cities',[MainController::class, 'cities']);
    Route::post('reset-password',[AuthController::class, 'resetpassword']);
    Route::post('new-password',[AuthController::class, 'newpassword']);
    Route::get('posts',[MainController::class, 'posts']);
});

    Route::group(['prefix'=>'m1','middleware'=>'auth:api'],function() {
        Route::post('register-token',[AuthController::class, 'registerToken']);
        Route::post('contact',[MainController::class, 'contact']);
        Route::post('remove-token',[AuthController::class, 'removeToken']);
        Route::post('profile',[AuthController::class, 'profile']);
        Route::get('donation-requests',[MainController::class, 'donationRequests']);
        Route::get('post',[MainController::class, 'post']);
        Route::get('donation-request',[MainController::class, 'donationRequest']);
        Route::post('donation-request/create',[MainController::class, 'donationRequestCreate']);
        Route::post('report',[MainController::class, 'report']);
        Route::post('notification-settings',[AuthController::class, 'notificationsSettings']);
        Route::post('post-toggle-favourite',[MainController::class, 'postFavourite']);
        Route::get('my-favourites',[MainController::class, 'myFavourites']);
        Route::get('notifications-count', [MainController::class, 'notificationsCount']);
        Route::get('notifications', [MainController::class, 'notifications']);
        Route::get('settings', [MainController::class, 'settings']);
        Route::get('test-notification', [MainController::class, 'test-notification']);
    });

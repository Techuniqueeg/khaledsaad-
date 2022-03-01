<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\HomeFrontController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Dashboard\FavouriteController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

    Route::post('/logout', [UserController::class, 'logout'])->middleware('jwt.verify');
});

//home
Route::group(['middleware' => 'api'], function () {
    Route::get('/product/all', [HomeFrontController::class, 'products']);
    Route::post('/product/{id}', [HomeFrontController::class, 'productDetails']);
    Route::post('/product/category/{id}', [HomeFrontController::class, 'productByCategory']);
    Route::get('/sliders', [HomeFrontController::class, 'sliders']);
    Route::get('/services', [HomeFrontController::class, 'services']);
    Route::get('/aboutus', [HomeFrontController::class, 'aboutUs']);
    Route::get('/settings', [HomeFrontController::class, 'settings']);
    Route::get('/sliders', [HomeFrontController::class, 'sliders']);
    Route::get('/categories', [HomeFrontController::class, 'categories']);
    Route::post('/filter', [HomeFrontController::class, 'filtration']);

});

Route::group(['middleware' => 'jwt.verify'], function () {

    //verify
    Route::post('/verify/Email', [UserController::class, 'verification']);
    //inbox
    Route::post('/send/inbox', [HomeFrontController::class, 'inbox']);

    // favourite
    Route::get('allFavourite', [FavouriteController::class, 'all']);
    Route::post('addFavourite', [FavouriteController::class, 'add']);
    Route::post('deleteFavourite', [FavouriteController::class, 'delete']);


    Route::group(['middleware' => 'email.verified'], function () {
        //cart
        Route::post('cart/{type}', [CartController::class, 'cart']);
        Route::get('selectCart', [CartController::class, 'myCart']);
        Route::get('checkout', [CartController::class, 'checkout']);
        Route::post('updateQuantity', [CartController::class, 'updateQuantity']);
        Route::get('card_count', [CartController::class, 'count']);
        Route::post('cart/product/remove', [CartController::class, 'remove']);
    });
});

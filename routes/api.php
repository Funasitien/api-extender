<?php

use Azuriom\Plugin\ApiExtender\Controllers\Api\ApiController;
use Azuriom\Plugin\ApiExtender\Controllers\Api\ApiImagesController;
use Illuminate\Support\Facades\Route;
use Azuriom\Plugin\ApiExtender\Controllers\Api\ApiShopController;
use Azuriom\Extensions\Plugin\PluginManager;

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

Route::get('/', [ApiController::class, 'index']);
Route::get('/servers', [ApiController::class, 'servers']);
Route::get('/roles', [ApiController::class, 'roles']);
#Route::get('/user/{identifier}', [ApiController::class, 'user']);
Route::get('/users', [ApiController::class, 'users']);
Route::get('/money', [ApiController::class, 'money']);
Route::get('/social', [ApiController::class, 'social']);

if (app(PluginManager::class)->isEnabled('shop')) {
    Route::get('/shop/payments', [ApiShopController::class, 'payments']);
    Route::get('/shop/categories', [ApiShopController::class, 'categories']);
}

if (app(PluginManager::class)->isEnabled('skin-api')) {
    Route::get('/images/{type}/{rendertype}/{player}', [ApiImagesController::class, 'images']);
}

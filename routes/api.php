<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vips', [ApiController::class, 'updateVip'])->name("update_vip");
Route::get('/guilds', [ApiController::class, 'guilds']);
Route::get('/chars', [ApiController::class, 'chars'])->name("chars");

Route::post('/payment/success', [ApiController::class, 'paymentSuccess'])->name("paymentSuccess");

Route::get('/trades', [ApiController::class, 'trades'])->name("trades");
Route::get('/boss', [ApiController::class, 'boss'])->name("boss");
Route::get('/logins', [ApiController::class, 'logins'])->name("logins");
Route::get('/refines', [ApiController::class, 'refines'])->name("refines");
Route::get('/loggings', [ApiController::class, 'loggings'])->name("loggings");

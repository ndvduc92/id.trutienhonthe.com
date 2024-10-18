<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\RankingController;

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

Route::get('/vips', [AuthController::class, 'updateVip'])->name("update_vip");
Route::get('/guilds', [RankingController::class, 'handle']);
Route::get('/chars', [ApiController::class, 'chars'])->name("chars");

Route::post('/payment/success', [ApiController::class, 'paymentSuccess'])->name("paymentSuccess");


Route::get('/bot', [AuthController::class, 'bot'])->name("bot");
Route::get('/cache', [AuthController::class, 'cache'])->name("cache");



